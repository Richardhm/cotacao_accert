<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
    <style>
        body {display:flex;justify-content: center;align-items: center;min-height:100vh;}
        .box {position:relative;width:380px;height:420px;background: #8f8f8f;border-radius:8px;overflow:hidden;}
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('build/assets/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
</head>
<body class="font-sans bg-gray-100">
<div class="w-full h-screen">
    <nav class="bg-purple-300 bg-opacity-20 py-1 absolute top-0 w-full flex justify-between items-center">
        <a href="{{route('welcome')}}" class="text-gray-800 text-4xl text-center align-center flex self-center font-mono">
            <img src="{{asset('logo.png')}}" alt="Logo" style="width:35%;">
        </a>
    </nav>

    <section class="flex w-full h-screen justify-center py-4 bg-gray-100" style="border-bottom: 50px solid #A78BFA;">

        <div class="flex flex-col" style="height:200px;width:380px;margin-top: 100px;">

            <div class="p-2 w-full bg-purple-400 text-lg font-bold text-center">
                <span class="text-white">Já tenho uma conta</span>
                <a href="{{route('login')}}" class="text-white rounded-full bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium text-sm px-5 text-center py-1.5 me-2 mb-2" aria-current="page">Login</a>
            </div>

            <div class="p-2 text-sm font-bold w-full bg-purple-400 text-red-600 text-center">
                Não precisa cadastrar cartão de credito, para testar!
            </div>

            <form method="POST" action="{{ route('perfil.cadastrar.store') }}" class="p-2 bg-purple-400" style="width:380px;">
                @csrf

                <div class="mb-0.5">
                    <label for="name" class="block mb-1 font-medium text-white dark:text-white text-sm">Nome</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" class="border border-gray-300 text-lg rounded-lg text-purple-400 block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-0.5">
                    <label for="email" class="block mb-1 font-medium text-white dark:text-white text-sm">Email</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="border border-gray-300 text-lg rounded-lg text-purple-400 block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-0.5">
                    <label for="password" class="block mb-1 font-medium text-white dark:text-white text-sm">Senha</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="border border-gray-300 text-lg rounded-lg text-purple-400 block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none" />
                        <button type="button" id="togglePassword" class="absolute right-2 top-3 text-purple-400 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" id="showIcon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden" id="hideIcon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-0.5">
                    <label for="password_confirmation" class="block mb-1 font-medium text-white dark:text-white text-sm">Confirmar Senha</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 text-lg rounded-lg text-purple-400 block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none" />
                        <button type="button" id="togglePasswordConfirm" class="absolute right-2 top-3 text-purple-400 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" id="showIconConfirm">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden" id="hideIconConfirm">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
                </div>
                <div class="mb-0.5">
                    <label for="phone" class="block mb-1 font-medium text-white dark:text-white text-sm">Telefone</label>
                    <input type="tel" name="phone" value="{{old('phone')}}" id="phone" class="border border-gray-300 text-lg rounded-lg text-purple-400 block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none" placeholder=" " />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="mb-0.5">
                    <label for="phone" class="block mb-1 font-medium text-white dark:text-white text-sm">Operadora</label>
                    <select name="operadora" id="operadora" class="w-full rounded text-center">
                        <option value="">--Escolher a operadora--</option>
                        @foreach($operadoras as $op)
                            <option value="{{$op->id}}">{{$op->nome}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('operadora')" class="mt-2" />
                </div>



                <div class="w-full mt-4">
                    <button type="submit" class="text-purple-900 w-full bg-white focus:outline-none font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center">Salvar</button>
                </div>

            </form>


        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
        $('#phone').mask('(00) 0 0000-0000');
    });

    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');
    const showIcon = document.getElementById('showIcon');
    const hideIcon = document.getElementById('hideIcon');

    toggleButton.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showIcon.style.display = 'none';
            hideIcon.style.display = 'block';
        } else {
            passwordInput.type = 'password';
            showIcon.style.display = 'block';
            hideIcon.style.display = 'none';
        }
    });

    const passwordInputConfirm = document.getElementById('password_confirmation');
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const showIconConfirm = document.getElementById('showIconConfirm');
    const hideIconConfirm = document.getElementById('hideIconConfirm');

    togglePasswordConfirm.addEventListener('click', () => {
        if(passwordInputConfirm.type === 'password') {
            passwordInputConfirm.type = 'text';
            showIconConfirm.style.display = 'none';
            hideIconConfirm.style.display = 'block';
        }else{
            passwordInputConfirm.type = 'password';
            showIconConfirm.style.display = 'block';
            hideIconConfirm.style.display = 'none';
        }
    });



</script>






</body>




</html>
