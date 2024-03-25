<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>

        body {display:flex;justify-content: center;align-items: center;min-height:100vh;}
        .box {position:relative;width:380px;height:420px;background: #8f8f8f;border-radius:8px;overflow:hidden;}
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-100">
<div class="w-full h-screen">
    <nav class="bg-purple-300 bg-opacity-20 py-1 absolute top-0 w-full flex justify-between items-center">
        <a href="{{route('home')}}" class="text-gray-800 text-4xl text-center align-center flex self-center font-mono">
            <img src="{{asset('logo.png')}}" alt="Logo" style="width:35%;">
        </a>

    </nav>
    <section class="flex w-full justify-center h-screen items-center" style="border-bottom: 50px solid #A78BFA;">
        <div class="p-10 text-white bg-purple-400" style="width:380px;height:490px;">
            <h3 class="text-2xl font-bold mb-9" style="color:#FFF;font-family: 'Nunito Sans';font-size:2em;">Olá!</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-medium text-white dark:text-white text-lg">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-purple-400 text-sm block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none rounded-lg" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 font-medium text-white dark:text-white text-lg">Senha</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-purple-400 text-sm block w-full p-2.5 focus:border-transparent focus:ring-0 focus:outline-none rounded-lg" required />
                        <button type="button" id="togglePassword" class="absolute right-2 top-2 text-purple-400 cursor-pointer">
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
                <div id="recaptcha-container" class="g-recaptcha mb-5" data-sitekey="6LetYI4pAAAAAAW5eeFUc9R2FYyZAJfqyJaFEm5h"></div>
                <button type="submit" class="bg-white hover:bg-purple-800 hover:text-white focus:outline-none focus:ring-blue-300 font-medium text-sm w-full px-5 py-2.5 text-center focus:border-transparent focus:ring-0 focus:outline-none rounded-lg text-purple-900">Avançar</button>
            </form>
        </div>









        <script>
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










        </script>












    </section>

</div>



</body>




</html>
