<?php

namespace App\Http\Controllers;

use App\Models\Cabecalho;
use App\Models\Configuracoes;
use App\Models\ConfiguracoesDefault;
use App\Models\PdfPerfil;
use App\Models\Subscriptions;
use App\Models\Tenant;
use App\Models\TenantOperadora;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TabelaOrigens;
use App\Models\Planos;
use App\Models\Operadoras;
use App\Models\Tabelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function config()
    {
        $user = User::find(auth()->user()->id)
            ->with('pdfPerfil','pdfPerfil.cabecalho','tenant')
            ->first();






        $tenant = Tenant::find(session()->get('tenant_id'));








        $tenantId = session()->get('tenant_id');
        $planos = Planos::all();

        if ($tenant->tipo == 1 && TenantOperadora::where('tenant_id',$tenantId)->count() == 1) {
            $operadora_id = TenantOperadora::where('tenant_id',$tenantId)->first()->operadora_id;
            $operadoras = Operadoras::where('id',$operadora_id)->get();
        } else {
            $operadoras = Operadoras::all();
        }

        if(TenantOperadora::where('tenant_id',$tenantId)->count() == 1) {
            $tenant_operadora = TenantOperadora::where('tenant_id',$tenantId)->first()->operadora_id;
        } else {
            $tenant_operadora = '';
        }

        return view('home.config',[
            'operadoras' => $operadoras,
            'photo' => $user->photo ?? '',
            'tenant_operadora' => $tenant_operadora,
            'tenant' => $tenant,
            'planos' => $planos,
            'user' => $user
        ]);
    }

    public function configuracao()
    {
        $user = User::find(auth()->user()->id);
        $operadoras = Operadoras::all();
        $tenant = Tenant::find(session()->get('tenant_id'));

        //        $planos = Planos::whereNotExists(function ($query) use ($tenantId) {
//            $query->select(DB::raw(1))
//                ->from('configuracoes')
//                ->whereRaw('configuracoes.plano_id = planos.id')
//                ->where('configuracoes.tenant_id', $tenantId);
//        })->get();


        //$tenant_operadora = TenantOperadora::where('tenant_id',$tenant)->first();
        if(TenantOperadora::where('tenant_id',$tenant)->count() == 1) {
            $tenant_operadora = TenantOperadora::where('tenant_id',$tenant)->first()->operadora_id;
        } else {
            $tenant_operadora = '';
        }

        $tenantId = session()->get('tenant_id');
//        $planos = Planos::whereNotExists(function ($query) use ($tenantId) {
//            $query->select(DB::raw(1))
//                ->from('configuracoes')
//                ->whereRaw('configuracoes.plano_id = planos.id')
//                ->where('configuracoes.tenant_id', $tenantId);
//        })->get();
        $planos = Planos::all();

        return view('home.configuracao',[
            'operadoras' => $operadoras,
            'photo' => $user->photo ?? '',
            'tenant_operadora' => $tenant_operadora,
            'tenant' => $tenant,
            'planos' => $planos
        ]);
    }





    public function configurar_finalizar()
    {
        $tenant_id = session()->get('tenant_id');
        $tipo = Tenant::find($tenant_id)->tipo;
        if($tipo == 1) {

            if(!empty(request()->cabecalho_id_finalizar) && isset(request()->cabecalho_id_finalizar)) {
                auth()->user()->pdfPerfil()->updateOrCreate([
                    'user_id' => auth()->user()->id
                ],[
                    'cabecalho_id' => request()->cabecalho_id_finalizar
                ]);

            }


        }



        $user = User::where('tenant_id',$tenant_id)->first();
        $user->check = true;
        $user->save();

        return redirect(route('home'));
    }





    public function index()
    {

        $listConvidados = "";
        if(auth()->user()->tenant()->first()->tipo == 3 && auth()->user()->admin == 1) {
            $listConvidados = User::where("tenant_id",auth()->user()->tenant()->first()->id)->where("admin",0)->get();
        }

        $tenant_id = session()->get('tenant_id');

        $operadoras = Tenant::find($tenant_id)->operadoras;
        $cidades = TabelaOrigens::all();

        $planos = Planos::all();

        $diferencaEmDias = 0;
        if (auth()->user()->tenant()->first()->test_date_end) {
            $testDateEnd = new \DateTime(auth()->user()->tenant()->first()->test_date_end);
            $dataAtual = new \DateTime();
            // Ignorar a parte do tempo (apenas comparar as datas)
            $testDateEnd->setTime(0, 0, 0);
            $dataAtual->setTime(0, 0, 0);
            // Calculando a diferença entre as duas datas
            $diferenca = $testDateEnd->diff($dataAtual);
            // Obtendo a diferença em dias
            $diferencaEmDias = $diferenca->days;
            if($diferencaEmDias == 1) {
                return redirect(route('listar.planos'));
            }
        }

        return view('dashboard',[
            "cidades" => $cidades,
            "operadoras" => $operadoras,
            "planos" => $planos,
            "diferencaEmDias" => $diferencaEmDias,
            "listConvidados" => $listConvidados
        ]);
    }

    public function orcamento()
    {
        $dados = request()->all();

        $sql = "";
        $chaves = [];
        foreach(request()->faixas[0] as $k => $v) {
            if($v != null AND $v != 0) {
                $sql .= " WHEN tabelas.faixa_etaria_id = {$k} THEN ${v} ";
                $chaves[] = $k;
            }
        }
        $keys = implode(",",$chaves);
        $cidade = request()->tabela_origem;
        $plano = request()->plano;
        $operadora = request()->operadora;

        $imagem_operadora = Operadoras::find($operadora)->logo;
        $plano_nome = Planos::find($plano)->nome;
        $imagem_plano = Planos::find($plano)->logo;
        $cidade_nome = TabelaOrigens::find($cidade)->nome;

        $dados = Tabelas::select('tabelas.*')
            ->selectRaw("CASE $sql END AS quantidade")
            ->join('faixa_etarias', 'faixa_etarias.id', '=', 'tabelas.faixa_etaria_id')
            ->where('tabelas.tabela_origens_id', $cidade)
            ->where('tabelas.plano_id', $plano)
            ->where('tabelas.operadora_id', $operadora)
            //->where('acomodacao_id',"!=",3)
            ->whereIn('tabelas.faixa_etaria_id', explode(',', $keys))
            ->get();
        return view("cotacao.cotacao2",[
            "dados" => $dados,
            "operadora" => $imagem_operadora,
            "plano_nome" => $plano_nome,
            "cidade_nome" => $cidade_nome,
            "imagem_plano" => $imagem_plano
        ]);
    }

    public function operadoraPlanos()
    {
        $operadora_id = request()->operadora_id;
        $planos = Operadoras::find($operadora_id)->planos;
        if($planos->count() == 0) {
            return "nada";
        } else {
            return View::make('components.planos', ['planos' => $planos])->render();
        }
    }

    public function coparticipacao()
    {
        $tenantId = session()->get('tenant_id');
        $planos = Planos::whereNotExists(function ($query) use ($tenantId) {
            $query->select(DB::raw(1))
                ->from('configuracoes')
                ->whereRaw('configuracoes.plano_id = planos.id')
                ->where('configuracoes.tenant_id', $tenantId);
        })->get();
        $planosCad = Configuracoes::with('planos')->get();

        return view("home.coparticipacao",[
            "planos" => $planos,
            "planoCad" => $planosCad
        ]);
    }

    public function cabecalhoHeaderFooter(Request $request)
    {
        $id = $request->id;
//        auth()->user()->createOrUpdate([
//            'cabecalho_id' => $id
//        ]);

        auth()->user()->pdfPerfil()->updateOrCreate([

            'user_id' => auth()->user()->id
        ],[
            'cabecalho_id' => $id
        ]);




        $cab = Cabecalho::find($id);
        return $cab;
    }



    public function observacao(Request $request)
    {
        $campo = $request->campo;
        $plano = $request->plano_id;
        $tenant_id = session()->get('tenant_id');
        $conf = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano);
        if($conf->count() == 1) {
            $alt = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano)->first();
            $alt->$campo = $request->valor;
            $alt->save();
        } else {
            $conf = new Configuracoes();
            $conf->plano_id = $plano;
            $conf->$campo = $request->valor;
            $conf->save();
        }
    }

    public function configurar_coparticipacao(Request $request)
    {
        $campo = $request->campo;
        $plano = $request->plano_id;
        $tenant_id = session()->get('tenant_id');
        $conf = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano);
        if($conf->count() == 1) {
            $alt = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano)->first();
            $alt->$campo = $request->valor;
            $alt->save();
        } else {
            $conf = new Configuracoes();
            $conf->plano_id = $plano;
            $conf->$campo = $request->valor;
            $conf->save();
        }
    }

    public function configurar_coparticipacao_valores(Request $request)
    {
        $valor = str_replace([".", ","],["", "."],$request->valor);
        $campo = $request->campo;
        $plano = $request->plano_id;
        $tenant_id = session()->get('tenant_id');
        $conf = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano);
        if($conf->count() == 1) {
            $alt = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano)->first();
            $alt->$campo = $valor;
            $alt->save();
        } else {
            $conf = new Configuracoes();
            $conf->plano_id = $plano;
            $conf->$campo = $valor;
            $conf->save();
        }
    }

    public function configurar_verificar_valores(Request $request)
    {
        $plano_id = $request->plano_id;
        $tenant_id = session()->get('tenant_id');
        $plano = Configuracoes::where('plano_id',$plano_id)->where('tenant_id',$tenant_id);
        if($plano->count() == 0) {
            $plano = ConfiguracoesDefault::where('plano_id',$plano_id);
        }
        return $plano->first();
    }

    public function configurar_change_telefone(Request $request)
    {
        $telefone = $request->telefone;
        $user_id = auth()->user()->id;
        $user = User::where("id",$user_id)->first();
        $user->phone = $telefone;
        $user->save();
    }

    public function configurar_observacoes_coparticipacao(Request $request)
    {
        $tenant_id = session()->get('tenant_id');
        $plano_id = $request->plano_id;

        $para = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano_id);
        if($para->count() == 0) {
            $cad = new Configuracoes();
            $cad->tenant_id = $tenant_id;
            $cad->plano_id = $plano_id;
            $cad->observacao01 = $request->observacao01;
            $cad->observacao02 = $request->observacao02;
            $cad->observacao03 = $request->observacao03;

            $cad->coparticipacao_titulo_01 = $request->coparticipacao_titulo_01;
            $cad->coparticipacao_valor_01 = $request->coparticipacao_valor_01 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_01) : "";

            $cad->coparticipacao_titulo_02 = $request->coparticipacao_titulo_02;
            $cad->coparticipacao_valor_02 = $request->coparticipacao_valor_02 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_02) : "";

            $cad->coparticipacao_titulo_03 = $request->coparticipacao_titulo_03;
            $cad->coparticipacao_valor_03 = $request->coparticipacao_valor_03 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_03) : "";

            $cad->coparticipacao_titulo_04 = $request->coparticipacao_titulo_04;
            $cad->coparticipacao_valor_04 = $request->coparticipacao_valor_04 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_04) : "";

            $cad->coparticipacao_titulo_05 = $request->coparticipacao_titulo_05;
            $cad->coparticipacao_valor_05 = $request->coparticipacao_valor_05 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_05) : "";

            $cad->save();

        } else {

            $alt = Configuracoes::where("tenant_id",$tenant_id)->where('plano_id',$plano_id)->first();

            $alt->observacao01 = $request->observacao01;
            $alt->observacao02 = $request->observacao02;
            $alt->observacao03 = $request->observacao03;

            $alt->coparticipacao_titulo_01 = $request->coparticipacao_titulo_01;
            $alt->coparticipacao_valor_01 = $request->coparticipacao_valor_01 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_01) : "";

            $alt->coparticipacao_titulo_02 = $request->coparticipacao_titulo_02;
            $alt->coparticipacao_valor_02 = $request->coparticipacao_valor_02 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_02) : "";

            $alt->coparticipacao_titulo_03 = $request->coparticipacao_titulo_03;
            $alt->coparticipacao_valor_03 = $request->coparticipacao_valor_03 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_03) : "";

            $alt->coparticipacao_titulo_04 = $request->coparticipacao_titulo_04;
            $alt->coparticipacao_valor_04 = $request->coparticipacao_valor_04 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_04) : "";

            $alt->coparticipacao_titulo_05 = $request->coparticipacao_titulo_05;
            $alt->coparticipacao_valor_05 = $request->coparticipacao_valor_05 != "" ? str_replace([".", ","],["", "."],$request->coparticipacao_valor_05) : "";

            $alt->save();
        }

    }

}
