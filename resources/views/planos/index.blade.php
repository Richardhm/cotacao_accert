<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Planos</title>
    <!-- Scripts -->
    <script src="build/assets/jquery.js"></script>

    <style>
        /* Estilo para a modal */
        .modal {display:none;position:fixed;z-index:1;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgba(0, 0, 0, 0.7);}
        .modal-content {background-color: #fefefe;margin: 0% auto;padding: 20px;border: 1px solid #888;width: 40%;display:flex;flex-direction: column;}
        .close {color: #aaa;float: right;font-size: 28px;font-weight: bold;}
        .close:hover,
        .close:focus {color: black;text-decoration: none;cursor: pointer;}
    </style>



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



        <div class="h-2/4 w-1/4 p-4 flex flex-col justify-between text-white" style="background-color: #A78BFA;width:380px;height:490px;">

            <div class="flex justify-between mb-4">
                <h2 class="font-extrabold font-bold">Basico</h2>
                <div class="font-bold">
                    <span>R$ 35,00</span>
                    <p>POR Mês</p>
                </div>
            </div>
            <div class="mb-4">
                <ul>
                    <li class="font-bold border-b-2 border-t-2 text-center">Direito a 1 email</li>
                    <li class="font-bold border-b-2 text-center">Cancelar a qualquer momento</li>
                    <li class="font-bold border-b-2 text-center">Direito a 1 tabela</li>
                </ul>
            </div>
            <div class="w-full">
                <a href="{{route('perfil.cadastrar.basico')}}" type="button" class="text-purple-900 w-full bg-white font-medium rounded-full px-5 py-2.5 text-center mb-2" style="color:#8907BB;">Assinar</a>
            </div>

        </div>

        <div class="h-2/4 w-1/4 p-4 flex flex-col justify-between text-white" style="background-color: #A78BFA;margin:0 80px;width:380px;height:490px;">

            <div class="flex justify-between">
                <h2 class="font-bold">Intermediario</h2>
                <div class="font-bold">
                    <span>R$ 55,00</span>
                    <p>POR Mês</p>
                </div>
            </div>

            <div>
                <ul>
                    <li class="font-bold border-b-2 border-t-2 text-center">Direito a 1 email</li>
                    <li class="font-bold border-b-2 border-t-2 text-center">Cancelar a qualquer momento</li>
                    <li class="font-bold border-b-2 border-t-2 text-center">Direito a todas as tabelas</li>
                </ul>
            </div>

            <div class="w-full">
                <a href="{{route('perfil.cadastrar.intermediario')}}" type="button" class="text-purple-900 w-full bg-white font-medium rounded-full px-5 py-2.5 text-center mb-2" style="color:#8907BB;">Assinar</a>
            </div>

        </div>

        <div class="h-2/4 w-1/4 p-4 flex flex-col justify-between text-white" style="background-color: #A78BFA;width:380px;height:490px;">

            <div class="flex justify-between">
                <h2 class="font-bold">Empresarial</h2>
                <div>
                    <span class="font-bold">R$ 130,00</span>
                    <p class="font-bold">POR Mês</p>
                </div>
            </div>
            <div>
                <ul>
                    <li class="font-bold border-b-2 border-t-2 text-center">Direito a 3 email's</li>
                    <li class="font-bold border-b-2 border-t-2 text-center">Apartir de 4 adicionar 30,00 a cada assinatura</li>
                    <li class="font-bold border-b-2 border-t-2 text-center">Cancelar a qualquer momento</li>
                    <li class="font-bold border-b-2 border-t-2 text-center">Direito todas as tabelas</li>
                </ul>
            </div>
            <div class="w-full">
                <a href="{{route('perfil.cadastrar.empresarial')}}" type="button" class="text-purple-900 w-full bg-white font-medium rounded-full px-5 py-2.5 text-center mb-2" style="color:#8907BB;">Assinar</a>
            </div>

        </div>

    </section>






</div>




</body>
</html>
