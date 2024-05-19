<?php

namespace App\Http\Controllers;

use App\Models\Configuracoes;
use App\Models\ConfiguracoesDefault;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cabecalho;
use App\Models\PdfPerfil;
use App\Models\Tabelas;
use App\Models\TabelaOrigens;
use Barryvdh\Snappy\Facades\SnappyImage;


class PerfilController extends Controller
{
    public function index()
    {
        $cabecalho = Cabecalho::all();
        $perfil = auth()->user()->pdfPerfil()->with('cabecalho');
        $tenant_id = session()->get('tenant_id');
        $users = User::where("tenant_id",$tenant_id)->where("admin","!=",1)->get();
        $photo = auth()->user()->photo;
        return view('perfil.index',[
            'cabecalho' => $cabecalho,
            'perfil'  => $perfil->count() == 1 ? $perfil->first() : "",
            'users' => $users,
            'photo' => $photo
        ]);
    }

    public function mudarDados()
    {
        $campo = request()->campo;
        $valor = request()->valor;

        $user = User::find(auth()->user()->id);
        $user->$campo = $valor;
        $user->save();

    }



    public function editar(Request $request)
    {
        $cabecalho_id = $request->cabecalho;
        $fundo = $request->fundo;
        $rodape = $request->rodape;
        $cabecalho = Cabecalho::find($cabecalho_id);
        $res = auth()->user()->storeCabecalho($cabecalho,$fundo,$rodape);
        if($res->id) {
            return "success";
        } else {
            return "error";
        }
    }

    public function criarImagem()
    {
        $sql = "";
        $chaves = [];
        foreach(request()->faixas[0] as $k => $v) {
            if($v != null AND $v != 0) {
                $sql .= " WHEN tabelas.faixa_etaria_id = {$k} THEN ${v} ";
                $chaves[] = $k;
            }
        }

        $pdf_perfil = PdfPerfil::where('user_id',auth()->user()->id)->with('cabecalho')->first();


        $keys = implode(",",$chaves);
        $cidade = request()->tabela_origem;
        $cliente = request()->cliente;
        $nome_cidade = TabelaOrigens::find($cidade)->nome;
        $plano = request()->plano;
        $operadora = request()->operadora;
        $odonto = request()->odonto;
        $dados = Tabelas::select('tabelas.*')
            ->selectRaw("CASE $sql END AS quantidade")
            ->join('faixa_etarias', 'faixa_etarias.id', '=', 'tabelas.faixa_etaria_id')
            ->where('tabelas.tabela_origens_id', $cidade)
            ->where('tabelas.plano_id', $plano)
            ->where('tabelas.operadora_id', $operadora)
            ->where("tabelas.odonto",$odonto)
            ->where("acomodacao_id","!=",3)
            ->whereIn('tabelas.faixa_etaria_id', explode(',', $keys))
            ->get();


        $image = auth()->user()->photo;
        $telefone = auth()->user()->phone;
        $nome = auth()->user()->name;
        $tenant_id = session()->get('tenant_id');
        $obs = Configuracoes::where('tenant_id',$tenant_id)->where('plano_id',$plano);
        if($obs->count() == 0) {
            $observacoes = ConfiguracoesDefault::where('plano_id',$plano)->first();
        } else {
            $observacoes = Configuracoes::where('tenant_id',$tenant_id)->where('plano_id',$plano)->first();
        }

        $site_tenant = auth()->user()->tenant()->first()->site;
        $instagram_tenant = auth()->user()->tenant()->first()->instagram;
        $telefone_tenant = auth()->user()->tenant()->first()->telefone;


        $html = view('pdf.imagem',[
            "body" => $pdf_perfil->cor_fundo ?? "rgb(33,86,162)",
            "header" => $pdf_perfil->cabecalho->header ?? "",
            "footer" => $pdf_perfil->cabecalho->footer ?? "",
            "dados" => $dados,
            "odonto" => $odonto,
            "cliente" => $cliente,
            "image" => $image,
            "nome" => $nome,
            "telefone_user" => $telefone,
            "observacoes" => $observacoes,
            "nome_cidade" => "Orçamento - ".$nome_cidade,
            "site_tenant" => $site_tenant,
            "instagram_tenant" => $instagram_tenant,
            "telefone_tenant" => $telefone_tenant

        ])->render();
        $snappy = SnappyImage::html($html)->setOption('width', 2480)->setOption('height', 3508);
        $image = $snappy->output();
        $nameImage = \Str::random(5) . '.png';
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="' . $nameImage . '"');
        echo $image;
        exit;
    }

    public function photo(Request $request)
    {
        $file = $request->file('file');
        $logo = "data:image/jpeg;base64,".base64_encode(file_get_contents($file->getPathname()));
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->photo = $logo;
        $user->save();
    }




}
