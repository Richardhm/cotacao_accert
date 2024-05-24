<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Operadoras;
use App\Models\TenantOperadora;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\View as Componentes;
use Illuminate\Validation\Rules;


class ProfileController extends Controller
{

    public function store(Request $request)
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);

        if($user->save()) {
            return "success";
        } else {
            return "error";
        }
    }





    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function cadastrar()
    {
        $operadoras = Operadoras::all();
        return view('profile.cadastrar',[
            'operadoras' => $operadoras
        ]);
    }

    public function cadastrar_intermediario()
    {
        return view('profile.intermediario');
    }

    public function cadastrar_empresarial()
    {
        return view('profile.empresarial');
    }

    public function deletar_convidado(Request $request)
    {
        $user_id = $request->id;
        $tenant_id = session()->get('tenant_id');
        $del = User::find($user_id);
        if($del->delete()) {
            $tenant = Tenant::where("id",$tenant_id)->first();
            $tenant->quantidade_email += 1;
            $tenant->save();
        }
    }



    public function cadastrarStore(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'phone' => ['required'],
            'operadora' => ['required']
        ]);

        $tenant = new Tenant();
        $tenant->name = "basico_1_".time();
        $tenant->tipo = 1;
        $tenant->quantidade_email = 1;
        $tenant->test_date_end = Carbon::now()->addDays(7);
        $tenant->save();

        $tenant_id = $tenant->id;


        $user = new User();
        $user->name = $request->name;
        $user->tenant_id = $tenant_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->admin = 1;

        $user->save();

        $cad = new TenantOperadora();
        $cad->tenant_id = $tenant_id;
        $cad->operadora_id = request()->operadora;
        $cad->save();


        event(new Registered($user));
        Auth::login($user);
        return redirect(route('home'));

    }


    public function cadastrarInterStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'phone' => ['required']
        ]);


        $tenant = new Tenant();
        $tenant->name = "intermediario_1_".time();
        $tenant->tipo = 2;
        $tenant->quantidade_email = 1;

        $tenant->test_date_end = Carbon::now()->addDays(7);
        $tenant->save();

        $tenant_id = $tenant->id;


        $user = new User();
        $user->name = $request->name;
        $user->tenant_id = $tenant_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->admin = 1;

        foreach(Operadoras::all() as $op) {
            $cad = new TenantOperadora();
            $cad->tenant_id = $tenant_id;
            $cad->operadora_id = $op->id;
            $cad->save();
        }




        $user->save();
        event(new Registered($user));
        Auth::login($user);
        return redirect(route('home'));
    }

    private function generateRandomPassword()
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()-_+=';
        $allChars = $uppercase . $lowercase . $numbers . $specialChars;
        $password = '';
        $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
        $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
        $password .= $specialChars[rand(0, strlen($specialChars) - 1)];
        for ($i = 0; $i < 5; $i++) {
            $password .= $allChars[rand(0, strlen($allChars) - 1)];
        }
        return str_shuffle($password);
    }





    public function cadastrarEmpreStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'phone' => ['required']
        ]);




        $tenant = new Tenant();
        $tenant->name = "empresarial_1_".time();
        $tenant->tipo = 3;
        $tenant->quantidade_email = 3;
        $tenant->default_password = $this->generateRandomPassword();
        $tenant->test_date_end = Carbon::now()->addDays(7);
        $tenant->save();

        $tenant_id = $tenant->id;


        $user = new User();
        $user->name = $request->name;
        $user->tenant_id = $tenant_id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->admin = 1;

        foreach(Operadoras::all() as $op) {
            $cad = new TenantOperadora();
            $cad->tenant_id = $tenant_id;
            $cad->operadora_id = $op->id;
            $cad->save();
        }




        $user->save();
        event(new Registered($user));
        Auth::login($user);
        return redirect(route('home'));
    }





    public function cadastrarConvidado(Request $request)
    {
        $tenant_id = session()->get('tenant_id');
        $tenant = Tenant::find($tenant_id);
        if($tenant->quantidade_email > 0) {
            $nome = $request->nome;
            $email = $request->email;
            $user = new User();
            $user->tenant_id = $tenant_id;
            $user->name = $nome;
            $user->email = $email;
            $user->check = 1;
            $user->admin = 0;
            $user->password = auth()->user()->tenant()->first()->default_password;
            if($user->save()) {
                $users = User::where("tenant_id",$tenant_id)->where("admin","!=",1)->get();
                $tenant->quantidade_email -= 1;
                $tenant->save();
                return Componentes::make('components.listar-convidados',['users' => $users])->render();
            } else {
                return "error_cadastro";
            }

        } else {
            return "end";
        }

    }



}
