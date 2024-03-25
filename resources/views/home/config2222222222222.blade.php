<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Configurações</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        html, body {height: 100%;}
        #overlay {display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.5);z-index: 999;}
        #zoomedImage {display: none;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);max-width: 30%;max-height: 80%;z-index: 1000;}
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('build/assets/jquery.js')}}"></script>


</head>
<body class="bg-gray-100 flex flex-col">
    <div id="overlay"></div>
    <input type="hidden" name="pdf_escolhido" id="pdf_escolhido">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 w-full flex justify-between items-center h-[10%]">
        <button class="text-gray-800 text-center align-center flex self-center font-mono">
            <img src="{{asset('logo.png')}}" alt="Logo" style="width:40%;">

        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex">
                <li>
                    <a href="{{route('listar.planos')}}" class="text-white rounded-full shadow-cyan-500/50 bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium text-sm px-5 text-center py-1.5 me-2 mb-2" aria-current="page">Assinar</a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="flex flex-wrap h-[90%]">

        <div class="h-[94%]" style="width:15%;">
            <div class="h-[40%] box-border rounded-lg" style="background-color: #A78BFA;">
                <div>
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Editar</a>
                                </li>

                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Deletar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <label for="file-input" class="custom-upload" id="upload-label">
                            @if($photo)
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg text-white bg-white" id="uploaded-image" src="{{$photo}}" alt="{{auth()->user()->name}}"/>
                            @else
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg text-white bg-white" id="uploaded-image" src="{{asset('user.png')}}" alt="{{auth()->user()->name}}"/>
                            @endif
                        </label>
                        <input type="file" id="file-input" accept="image/*" style="display: none;">

                        <h5 class="mb-1 text-sm font-medium dark:text-white text-white">{{auth()->user()->name}}</h5>
                        <span class="text-sm dark:text-gray-400 text-white">{{auth()->user()->email}}</span>

                    </div>
                </div>
            </div>
            <div class="h-[59%] box-border mt-1 flex flex-wrap p-2 rounded-lg items-start" style="background-color: #A78BFA;">
                <h3 class="w-full">Escolher Operadora</h3>
                <div class="flex flex-wrap w-full items-start">
                    @foreach($operadoras as $op)

                            <label class="{{$op->id == $tenant_operadora ? 'border-4 border-purple-700' : ''}}   bg-white container_image_operadora rounded mt-3 w-[47%] mr-1" style="min-height: 40px;height: 40px;max-height:40px;box-sizing: border-box;">
                                <input {{$op->id == $tenant_operadora ? 'checked' : ''}} type="radio" name="operadoras" id="operadoras" value="{{$op->id}}"  class="hidden">
                                <img src="{{$op->logo}}" alt="Opção 1" class="image_operadora p-1" style="min-height: 40px;height: 40px;max-height:40px;box-sizing: border-box;">
                            </label>

                    @endforeach
                </div>



            </div>
        </div>

        <div class="flex ml-1 flex-col rounded-lg items-start h-[94%] bg-purple-400" style="width:84%;">

            <div class="flex justify-between w-full h-[30%]">
                <div class="w-40 border-2 rounded-lg ml-4 flex items-center justify-center">
                    <label for="file-input-logo" class="custom-upload bg-white w-full h-full" id="upload-label-logo">
                        @if($tenant->logo != null)
                            @php
                                $logo = "storage/".$tenant->logo;
                            @endphp
                            <img class="mb-3 shadow-lg text-white bg-white w-full h-full rounded-lg" id="uploaded-image-logo" src="{{$logo}}" alt="" />
                        @else
                            <img class="mb-3 shadow-lg text-white bg-white w-full h-full rounded-lg" id="uploaded-image-logo" src="{{asset('logo-aqui.jpg')}}" alt="" />
                        @endif


                    </label>
                    <input type="file" id="file-input-logo" accept="image/*" style="display: none;">
                </div>
                <div class="flex flex-col w-[33%]">
                    <div class="relative z-0 w-full mb-1 group mt-7">
                        <input type="text" value="{{$tenant->site ?? ''}}" name="site" id="site" class="campo_tenant bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site" required />

                    </div>
                    <div class="relative z-0 w-full mb-1 group">

                        <input type="text" value="{{$tenant->instagram ?? ''}}" name="instagram" id="instagram" class="campo_tenant bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Instagram" required />

                    </div>
                    <div class="relative z-0 w-full mb-1 group">

                        <input type="text" value="{{$tenant->telefone ?? ''}}" name="telefone" id="telefone" class="campo_tenant bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Telefone" required />

                    </div>
                </div>
                <div class="flex mr-1 w-[25%]">
                    <div class="border border-gray-300 rounded-lg mb-1 ml-24" style="height:100%;">
                        <img src="{{asset('pdfs/01.jpg')}}" alt="01" class="rounded-lg preview_pdf" style="height:100%;width:100%;" id="zoomTrigger">
                    </div>
                    <div id="zoomedImage">
                        <img src="{{asset('pdfs/01.jpg')}}" alt="Zoomed Image">
                    </div>
                </div>
            </div>


            <div class="flex w-full justify-between items-center flex-wrap h-[70%]">

                <div class="rounded-lg mb-1 mr-16 ml-5" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/01.jpg')}}" alt="01" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/02.jpg')}}" alt="02" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/03.jpg')}}" alt="03" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/04.jpg')}}" alt="04" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/05.jpg')}}" alt="05" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16 ml-5" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/06.jpg')}}" alt="06" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/07.jpg')}}" alt="07" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/08.jpg')}}" alt="08" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/09.jpg')}}" alt="09" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>

                <div class="rounded-lg mb-1 mr-16" style="width:12%;height:180px;">
                    <img src="{{asset('pdfs/10.jpg')}}" alt="10" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                </div>


            </div>

        </div>

        <div class="w-[99.5%] h-[5%]">
            <a href="{{route('home.coparticipacao')}}"  class="btn_confirm_etapa w-full block text-center rounded-lg justify-center py-1 text-white hover:cursor-pointer" style="background-color: #A78BFA;">
                <div class="flex justify-center items-center w-full">
                    <span class="mr-1">Tudo Pronto? Vamos para a proxima etapa</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M6.333 4.478A4 4 0 0 0 1 8.25c0 .414.336.75.75.75h3.322c.572.71 1.219 1.356 1.928 1.928v3.322c0 .414.336.75.75.75a4 4 0 0 0 3.772-5.333A10.721 10.721 0 0 0 15 1.75a.75.75 0 0 0-.75-.75c-3.133 0-5.953 1.34-7.917 3.478ZM12 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd" />
                        <path d="M3.902 10.682a.75.75 0 1 0-1.313-.725 4.764 4.764 0 0 0-.469 3.36.75.75 0 0 0 .564.563 4.76 4.76 0 0 0 3.359-.47.75.75 0 1 0-.725-1.312 3.231 3.231 0 0 1-1.81.393 3.232 3.232 0 0 1 .394-1.81Z" />
                    </svg>
                </div>
            </a>
        </div>


    </div>


    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".btn_confirm_etapa").on('click',function(){

                if(!$('input[name="operadoras"]').is(":checked")) {
                    alert("Você precisa escolher pelo menos uma operadora, para continuar");
                    return false;
                }



                return true;
            });


            $(".configurar_etapa").on('click',function(){
                let operadorasSelecionadas = $(".operadoras:checked").map(function () {
                    return this.value;
                }).get();


                $.ajax({
                    url:"{{route('tenant.operadoras')}}",
                    method:"POST",
                    data: {
                        operadoras: operadorasSelecionadas
                    },
                    success:function(res) {
                        window.location.href = "/home";
                    }
                });
            });




            $(".campo_tenant").on('change',function(){
                let campo = $(this).attr('id');
                let valor = $(this).val();
                $.ajax({
                    url:"{{route('tenant.edit')}}",
                    method:"POST",
                    data: {
                        campo,
                        valor
                    },
                    success:function(res) {
                        console.log(res);
                    }
                });
            });





            $(".imagem_pdf").on('click',function(){
                let img = $(this).attr('src');
                $(".preview_pdf").attr('src',img);
            });

            // Adiciona o evento de clique à imagem
            $('#zoomTrigger').click(function() {
                // Obtém a URL da imagem
                var imageUrl = $(this).attr('src');

                // Atualiza a fonte da imagem ampliada
                $('#zoomedImage img').attr('src', imageUrl);

                // Exibe a imagem ampliada
                $('#overlay, #zoomedImage').fadeIn();
            });

            $('#overlay').click(function() {
                $('#overlay, #zoomedImage').fadeOut();
            });

            // Fecha a imagem ampliada ao clicar nela
            $('#zoomedImage').click(function(event) {

                event.stopPropagation();
            });

            $('#upload-label').click(function (e) {
                e.preventDefault(); // Impede a ação padrão do clique no rótulo
                $('#file-input').click();
            });

            $('#file-input').change(function (e) {
                $('#uploaded-image').hide();
                $('#file-input').prop('disabled', false);
                let input = this;
                let url = URL.createObjectURL(input.files[0]);
                $('#uploaded-image').attr('src', url).show();

                let image = e.target.files;
                let fd = new FormData();
                fd.append('file',image[0]);
                $.ajax({
                    url: "{{route('perfil.photo')}}",
                    method: "POST",
                    data: fd,
                    contentType: false,
                    processData: false,
                });

            });

            $("#upload-label-logo").click(function(e){
                e.preventDefault();
                $('#file-input-logo').click();
            });

            $("#file-input-logo").on('change',function(e){
                $('#uploaded-image-logo').hide();
                $('#file-input-logo').prop('disabled', false);
                let input = this;
                let url = URL.createObjectURL(input.files[0]);
                $('#uploaded-image-logo').attr('src', url).show();

                let image = e.target.files;
                let fd = new FormData();
                fd.append('file',image[0]);
                $.ajax({
                    url: "{{route('tenant.logo')}}",
                    method: "POST",
                    data: fd,
                    contentType: false,
                    processData: false,
                });



            });


            $(".image_operadora").on('click',function(){
                $('.container_image_operadora').removeClass('border-4 border-purple-700');
                $(this).removeClass('p-1');
                $(this).closest('.container_image_operadora').addClass('border-4 border-purple-700');

                let operadora_id = $(this).closest('label').find('input[type="radio"]').val();

                $.ajax({
                   url:"{{route('tenant.basico.operadoras')}}",
                   method:"POST",
                   data:{
                       operadora_id
                   }
                });

            });





        });
    </script>













</body>




</html>
