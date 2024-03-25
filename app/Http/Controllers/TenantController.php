<?php

namespace App\Http\Controllers;

use App\Models\Operadoras;
use App\Models\TenantOperadora;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tenant;
class TenantController extends Controller
{
    public function editar(Request $request)
    {
        $campo = $request->campo;
        $tenant_id = session()->get('tenant_id');
        $tenant = Tenant::find($tenant_id);
        $tenant->$campo = $request->valor;
        $tenant->save();
    }

    public function logo(Request $request)
    {
        $file = $request->file('file');
        $filename = time().'_'.$file->getClientOriginalName();
        $location = 'storage/tenant';
        $file->move($location, $filename);
        $logo = str_replace("storage/","",$location).'/'.$filename;
        $tenant_id = session()->get('tenant_id');
        $tenant = Tenant::find($tenant_id);

        if($tenant->logo && file_exists("storage/".$tenant->logo)) {
            unlink("storage/".$tenant->logo);
        }
        $tenant->logo = $logo;
        $tenant->save();
    }

    public function operadoras(Request $request)
    {
        $tenant_id = session()->get('tenant_id');
        foreach($request->operadoras as $op) {
            $t = new TenantOperadora();
            $t->operadora_id = $op;
            $t->tenant_id = $tenant_id;
            $t->save();
        }
        $user_id = auth()->user()->id;
        $alt = User::find($user_id);
        $alt->check = true;
        $alt->save();
    }

    public function tenant_operadora()
    {
        $tenant_id = session()->get('tenant_id');

        $tenant = TenantOperadora::where("tenant_id",$tenant_id);
        if($tenant->count() == 0) {
            $t = new TenantOperadora();
            $t->tenant_id = $tenant_id;
            $t->operadora_id = request()->operadora_id;
            $t->save();
        } else {
            $tt = TenantOperadora::where("tenant_id",$tenant_id)->first();
            $tt->operadora_id = request()->operadora_id;
            $tt->save();
        }
    }

    public function tenant_listar_planos_operadoras()
    {
        $operadora_id = request()->operadora_id;
        $planos = Operadoras::find($operadora_id)->planos();

        if($planos->count() == 0) {
            return "nada";
        } else {
            return view('planos.listar',[
                'planos' => $planos->get()
            ])->render();
        }
    }





}
