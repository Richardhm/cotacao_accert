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
        .upload-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            margin-bottom: 40px; /* ajuste fino para posicionar o ícone no lugar certo */
            margin-right: -20px;
        }

        #linha01 {width:100%;height: 60px;resize: none;white-space: pre-wrap;font-size: 0.8em;}
        #linha02 {width:100%;height: 60px;resize: none;white-space: pre-wrap;font-size: 0.8em;}
        #linha03 {width:100%;height: 60px;resize: none;white-space: pre-wrap;font-size: 0.8em;}
        .coparticipacao_titulo {
            font-size:0.6em;
        }
        .coparticipacao_valor {
            font-size:0.6em;
        }

        html, body {height: 100%;}
        #overlay {display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.5);z-index: 999;}
        #zoomedImage {display: none;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);max-width: 30%;max-height: 80%;z-index: 1000;}
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('build/assets/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>

</head>
<body class="bg-gray-100 flex flex-col">
<div id="overlay"></div>
<input type="hidden" name="pdf_escolhido" id="pdf_escolhido">
<nav class="bg-purple-300 bg-opacity-20 py-1 absolute top-0 w-full flex justify-between items-center">
    <a href="{{route('home')}}" class="text-gray-800 text-4xl text-center align-center flex self-center font-mono">
        <img src="{{asset('logo.png')}}" alt="Logo" style="width:35%;">
    </a>

</nav>

<div class="flex flex-wrap h-[92%]" style="margin-top: 65px;">
    <input type="hidden" id="plano_selecionado">
    <div class="h-[100%] mr-2 ml-2" style="width:23%;">
        <div class="h-[40%] box-border rounded-lg" style="background-color: #A78BFA;">
            <div class="flex flex-col items-center">
                <label for="file-input" class="custom-upload mt-2" id="upload-label">
                    @if($photo)
                        <img class="w-36 h-36 rounded-full shadow-lg text-white bg-white" id="uploaded-image" src="{{$photo}}" alt="{{auth()->user()->name}}"/>
                    @else
                        <div class="flex items-center justify-center w-36 h-36 mb-3 bg-white rounded-full relative inline-block p-5 text-white border-0 cursor-pointer upload-button">
                            <img src="{{asset('avatar-user.png')}}" alt="Avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray" class="w-12 h-12 upload-icon text-white">
                                <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                                <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>

                        </div>
                    @endif
                </label>
                <input type="file" id="file-input" accept="image/*" style="display: none;">
            </div>


            <div class="flex flex-col justify-center">
                <input type="text" readonly  value="{{auth()->user()->name}}" class="w-[90%] bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg block p-1 mx-auto focus:border-transparent focus:ring-0 focus:outline-none">
                <input type="text" readonly  value="{{auth()->user()->email}}" class="w-[90%] my-0.5 bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg block p-1 mx-auto focus:border-transparent focus:ring-0 focus:outline-none">
                <input type="text" id="phone"  value="{{auth()->user()->phone}}" class="telefone_change w-[90%] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-1 mx-auto focus:border-transparent focus:ring-0 focus:outline-none">
            </div>


        </div>

        <div class="h-[59%] mt-1 flex flex-col p-1 rounded-lg items-start bg-purple-400">

            <button class="py-1.5 w-full px-5 me-2 mb-2 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 bg-gray-500 bg-opacity-10">
                Operadoras
            </button>


            <div class="flex flex-wrap w-full items-start justify-between">
                @foreach($operadoras as $op)
                    <label class="bg-white w-full container_image_operadora flex flex-wrap justify-between py-0.5 mb-1 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 focus:z-10 bg-gray-500 bg-opacity-10 dark:hover:text-gray-900">

                        <div class="flex justify-between items-center w-full">
                            <div class="w-[50%] flex ml-4 items-center">
                                <input type="radio" name="operadoras" id="operadoras_{{$op->id}}" value="{{$op->id}}" class="w-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <span class="ml-1">{{$op->nome}}</span>
                            </div>
                            <div class="flex w-[50%] justify-end mr-2">
                                <img src="{{$op->logo}}" alt="Opção 1" class="image_operadora p-1 w-full bg-white" style="width:100px;background-color:white;max-height:32px;border-radius:5px;height:32px;">
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>



        </div>


    </div>

    <div class="flex flex-wrap rounded-lg h-[100%] mr-2" style="width:23%;">
        {{-- Bloco dos Planos--}}
        <div class="h-[40%] box-border rounded-lg w-full" style="background-color: #A78BFA;">
             <div for="planos" class="block mb-2 text-sm font-medium text-gray-900 container_planos dark:text-white listar_planos text-white text-center hidden">
                 <button class="py-1.5 w-[99%] px-5 mb-2 mt-1 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 bg-gray-500 bg-opacity-10">
                     Planos
                 </button>
                <div class="flex flex-wrap w-full items-start justify-between listar_planos_container">

                </div>
            </div>

        </div>
        {{-- Bloco dos Planos--}}

        {{-- Editar Coparticipação--}}

        <div class="h-[59%] flex flex-col p-1 rounded-lg items-start bg-purple-400" style="width:100%;overflow: auto">
            <div class="hidden container_observacoes w-full">
                <h5 class="text-xs dark:text-white text-white mb-0.5">1º Observações <small>(No máximo 3 linhas)</small> </h5>

                <div class="w-full mb-0.5">


                    <textarea name="linha01" id="linha01" placeholder="Digite aqui" class="observacao bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-1 placeholder:text-gray-400"></textarea>



                </div>
                <div class="w-full mb-0.5">

                    <textarea name="linha02" id="linha02" placeholder="Digite aqui" class="observacao bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-1 placeholder:text-gray-400"></textarea>


                </div>
                <div class="w-full mb-0.5">

                    <textarea name="linha03" id="linha03" placeholder="Digite aqui" class="observacao bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-1 placeholder:text-gray-400"></textarea>
                </div>
            </div>
            <div class="hidden container_coparticipacao w-full">
                <h5 class="text-xs dark:text-white text-white mb-1">2º Valores de Coparticipação<small>(No máximo 5 valores)</small></h5>


                <div class="flex mb-0.5">
                    <div class="w-[80%]">
                        <input type="text" name="copartipacao_titulo_01" value="" style="font-size: 0.8em;" id="coparticipacao_titulo_01" class="coparticipacao_titulo bg-gray-50 border
                        border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Titulo" />
                    </div>
                    <div class="w-[18%] ml-1 relative">
                        <div style="position: relative;" class="w-full">
                            <span style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%); color: #718096;font-size: 0.8em;">R$</span>
                            <input type="text" name="copartipacao_valor_01" value="" style="font-size: 0.8em;text-align:right;" id="coparticipacao_valor_01" class="coparticipacao_valor bg-gray-50 border
                            border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Valor" />
                        </div>
                    </div>
                </div>

                <div class="flex mb-0.5">
                    <div class="w-[80%]">
                        <input type="text" name="copartipacao_titulo_02" value="" style="font-size: 0.8em;" id="coparticipacao_titulo_02" class="coparticipacao_titulo bg-gray-50 border
                        border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Titulo" />

                    </div>
                    <div class="w-[18%] ml-1 relative">
                        <span style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%); color: #718096;font-size: 0.8em;">R$</span>
                        <input type="text" name="copartipacao_valor_02" value="" style="font-size: 0.8em;text-align:right;" id="coparticipacao_valor_02" class="coparticipacao_valor bg-gray-50 border
                        border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Valor" />
                    </div>
                </div>

                <div class="flex mb-0.5">
                    <div class="w-[80%]">

                        <input type="text" name="copartipacao_titulo_03" value="" style="font-size: 0.8em;" id="coparticipacao_titulo_03" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Titulo" />

                    </div>
                    <div class="w-[18%] ml-1 relative">
                        <span style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%); color: #718096;font-size: 0.8em;">R$</span>
                        <input type="text" name="copartipacao_valor_03" value="" style="font-size: 0.8em;text-align:right;" id="coparticipacao_valor_03" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Valor" />

                    </div>
                </div>

                <div class="flex mb-0.5">
                    <div class="w-[80%]">

                        <input type="text" name="copartipacao_titulo_04" value="" style="font-size: 0.8em;" id="coparticipacao_titulo_04" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Titulo" />

                    </div>
                    <div class="w-[18%] ml-1 relative">
                        <span style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%); color: #718096;font-size: 0.8em;">R$</span>
                        <input type="text" name="copartipacao_valor_04" value="" style="font-size: 0.8em;text-align:right;" id="coparticipacao_valor_04" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Valor" />

                    </div>
                </div>

                <div class="flex mb-0.5">
                    <div class="w-[80%]">

                        <input type="text" name="copartipacao_titulo_05" value="" style="font-size: 0.8em;" id="coparticipacao_titulo_05" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Titulo" />
                    </div>
                    <div class="w-[18%] ml-1 relative">
                        <span style="position: absolute; left: 5px; top: 50%; transform: translateY(-50%); color: #718096;font-size: 0.8em;">R$</span>
                        <input type="text" name="copartipacao_valor_05" value="" style="font-size: 0.8em;text-align:right;" id="coparticipacao_valor_05" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:border-transparent focus:ring-0 block w-full p-0.5 placeholder:text-gray-400" placeholder="Valor" />
                    </div>
                </div>

            </div>

            {{-- Editar Coparticipação--}}


        </div>
    </div>

    <div class="flex flex-wrap rounded-lg h-[100%]" style="width:52%;">

        {{-- Bloco PDF--}}
        <div class="flex w-full justify-around items-center flex-wrap h-[48%]" style="overflow: auto">
            <div class="bg-purple-400 w-full flex flex-wrap h-full rounded-lg items-center justify-center">
                <div class="flex flex-wrap justify-around container_pdf_all hidden">


                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/01.jpg')}}" alt="01" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/02.jpg')}}" alt="02" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/03.jpg')}}" alt="03" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/04.jpg')}}" alt="04" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/05.jpg')}}" alt="05" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/06.jpg')}}" alt="06" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/07.jpg')}}" alt="07" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/08.jpg')}}" alt="08" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/09.jpg')}}" alt="09" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>

                    <div class="rounded-lg mb-0.5 mr-0.5" style="width:19%;height:160px;">
                        <img src="{{asset('pdfs/10.jpg')}}" alt="10" class="rounded-lg imagem_pdf" style="height:100%;width:100%;">
                    </div>
                </div>
            </div>
        </div>
        {{-- Bloco PDF--}}

        {{-- Bloco das Informações--}}
        <div class="flex justify-between w-full h-[44.5%] bg-purple-400 rounded-lg">
            <div class="w-40 rounded-lg flex items-center justify-center w-[15%] hidden container_logo">
                <label for="file-input-logo" class="custom-upload w-full h-[70%] mt-20" id="upload-label-logo">
                    @if($tenant->logo != null)
                        @php
                            $logo = "storage/".$tenant->logo;
                        @endphp
                        <img class="mb-3 shadow-lg w-full rounded-lg" id="uploaded-image-logo" src="{{$logo}}" alt="" />
                    @else
                        <img class="mb-3 shadow-lg w-full rounded-lg" id="uploaded-image-logo" src="{{asset('logo-aqui.jpg')}}" alt="" />
                    @endif


                </label>
                <input type="file" id="file-input-logo" accept="image/*" style="display: none;">
            </div>
            <div class="w-[48%] items-center my-auto hidden container_redes">
                <div class="flex flex-col items-center my-auto h-full">
                    <div class="w-[90%]">
                        <input placeholder="Site" type="text" value="" name="site" id="site"
                               class="campo_tenant bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>
                    <div class="w-[90%] my-0.5">

                        <input placeholder="Instagram" type="text" value="" name="instagram" id="instagram"
                               class="campo_tenant bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>
                    <div class="w-[90%]">

                        <input placeholder="Celular" type="text" value="" name="celular" id="celular"
                               class="campo_tenant bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>
                </div>

            </div>
            <div class="flex mr-1 w-[35%] flex items-center hidden container_zoom_pdf">
                <div class="border border-gray-300 rounded-lg mb-1 ml-24 w-[60%]" style="height:80%;">
                    <img src="{{asset('pdfs/01.jpg')}}" alt="01" class="rounded-lg preview_pdf" style="height:100%;width:100%;" id="zoomTrigger">
                </div>
                <div id="zoomedImage">
                    <img src="{{asset('pdfs/01.jpg')}}" alt="Zoomed Image">
                </div>
            </div>
        </div>
        {{-- Bloco das Informações--}}

        <div class="w-full h-[5%] bg-purple-400 flex items-center justify-center rounded-lg hover:cursor-pointer">
            <form action="{{route('configurar.finalizar')}}" method="POST">
                @csrf
                <button type="submit" class="w-full block text-center py-1 text-white">
                    <div class="flex justify-center items-center w-full">
                        <span class="mr-1">Tudo Pronto? Clique aqui vamos para a Pagina Inicial</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M6.333 4.478A4 4 0 0 0 1 8.25c0 .414.336.75.75.75h3.322c.572.71 1.219 1.356 1.928 1.928v3.322c0 .414.336.75.75.75a4 4 0 0 0 3.772-5.333A10.721 10.721 0 0 0 15 1.75a.75.75 0 0 0-.75-.75c-3.133 0-5.953 1.34-7.917 3.478ZM12 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd" />
                            <path d="M3.902 10.682a.75.75 0 1 0-1.313-.725 4.764 4.764 0 0 0-.469 3.36.75.75 0 0 0 .564.563 4.76 4.76 0 0 0 3.359-.47.75.75 0 1 0-.725-1.312 3.231 3.231 0 0 1-1.81.393 3.232 3.232 0 0 1 .394-1.81Z" />
                        </svg>
                    </div>
                </button>
            </form>
        </div>




    </div>




</div>


<script>

    function formatNumber(value) {
        let numericValue = parseFloat(value);
        if (!isNaN(numericValue)) {
            return numericValue.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }).replace('R$', '').trim();
        } else {
            return '';
        }
    }




    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".telefone_change").on('change',function(){
           let telefone = $(this).val();
           $.ajax({
              url:"{{route('configurar.change.telefone')}}",
              method:"POST",
              data: {
                  telefone
              },
              success:function(res) {

              }
           });
        });






        $('#text-area').on('input', function(){
            let maxLength = 144; // Defina o número máximo de caracteres
            let text = $(this).val();
            console.log(text.length);
            if (text.length >= maxLength) {
                // Truncate o texto para o comprimento máximo
                text = text.slice(0, maxLength);
            }
            $(this).val(text);
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
                }
            });
        });

        $(".imagem_pdf").on('click',function(){
            let img = $(this).attr('src');
            $(".preview_pdf").attr('src',img);
            $(".container_logo").removeClass('hidden');
            $(".container_redes").removeClass('hidden');
            $(".container_zoom_pdf").removeClass('hidden');
        });

        // Adiciona o evento de clique à imagem
        $('#zoomTrigger').click(function() {
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
            $('.upload-button').html('').removeClass('flex items-center bg-white justify-center w-40 h-40 rounded-full relative inline-block p-5 bg-green-600 text-white border-0 rounded-full cursor-pointer');

            $('#file-input').prop('disabled', false);
            let input = this;
            let url = URL.createObjectURL(input.files[0]);

            let imgElement = $('<img>');
            imgElement.addClass('w-36 h-36 rounded-full shadow-lg text-white bg-white mb-3')
            imgElement.attr('src',url);

            $('.upload-button').html(imgElement);
            //$('#uploaded-image').attr('src', url).show();

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

        $("input[name='operadoras']").on('change',function(){
           let operadora_id = $(this).val();
            $.ajax({
                url:"{{route('tenant.listar.planos.operadoras')}}",
                method:"POST",
                data:{
                    operadora_id
                },
                success:function(res) {
                    if($(".container_observacoes").is(":visible")) {
                        $(".container_observacoes").addClass('hidden');
                    }

                    if($(".container_coparticipacao").is(":visible")) {
                        $(".container_coparticipacao").addClass('hidden');
                    }

                    if($(".container_pdf_all").is(":visible")) {
                        $(".container_pdf_all").addClass("hidden");
                    }

                    if($(".container_logo").is(":visible")) {
                        $(".container_logo").addClass("hidden");
                    }

                    if($(".container_redes").is(":visible")) {
                        $(".container_redes").addClass("hidden");
                    }

                    if($(".container_zoom_pdf").is(":visible")) {
                        $(".container_zoom_pdf").addClass("hidden");
                    }


                    if(res != "nada") {
                        $(".listar_planos").removeClass('hidden');
                        $(".listar_planos_container").html(res);
                    } else {
                        $(".listar_planos").addClass('hidden');
                        $(".listar_planos_container").html('');
                    }
                }
            });



        });
        $(".image_operadora").on('click',function(){

            $('.container_image_operadora').removeClass('border-4 border-purple-700');
            $(this).removeClass('p-1');
            $(this).closest('.container_image_operadora').addClass('border-4 border-purple-700');
            let operadora_id = $(this).closest('label').find('input[type="radio"]').val();
            $.ajax({
                url:"{{route('tenant.listar.planos.operadoras')}}",
                method:"POST",
                data:{
                    operadora_id
                },
                success:function(res) {
                    if($(".container_observacoes").is(":visible")) {
                        $(".container_observacoes").addClass('hidden');
                    }

                    if($(".container_coparticipacao").is(":visible")) {
                        $(".container_coparticipacao").addClass('hidden');
                    }

                    if($(".container_pdf_all").is(":visible")) {
                        $(".container_pdf_all").addClass("hidden");
                    }

                    if($(".container_logo").is(":visible")) {
                        $(".container_logo").addClass("hidden");
                    }

                    if($(".container_redes").is(":visible")) {
                        $(".container_redes").addClass("hidden");
                    }

                    if($(".container_zoom_pdf").is(":visible")) {
                        $(".container_zoom_pdf").addClass("hidden");
                    }


                    if(res != "nada") {
                        $(".listar_planos").removeClass('hidden');
                        $(".listar_planos_container").html(res);
                    } else {
                        $(".listar_planos").addClass('hidden');
                        $(".listar_planos_container").html('');
                    }
                }
            });
        });

        function verificar_plano() {
            if($("#plano_selecionado").val() == "") {
                return false;
            }
            return $("#plano_selecionado").val();
        }

        $(".observacao").on('change',function(){
            let plano_id = verificar_plano();
            let observacao01 = $("#linha01").val();
            let observacao02 = $("#linha02").val();
            let observacao03 = $("#linha03").val();
            let coparticipacao_titulo_01 = $("#coparticipacao_titulo_01").val();
            let coparticipacao_titulo_02 = $("#coparticipacao_titulo_02").val();
            let coparticipacao_titulo_03 = $("#coparticipacao_titulo_03").val();
            let coparticipacao_titulo_04 = $("#coparticipacao_titulo_04").val();
            let coparticipacao_titulo_05 = $("#coparticipacao_titulo_05").val();
            let coparticipacao_valor_01 = $("#coparticipacao_valor_01").val();
            let coparticipacao_valor_02 = $("#coparticipacao_valor_02").val();
            let coparticipacao_valor_03 = $("#coparticipacao_valor_03").val();
            let coparticipacao_valor_04 = $("#coparticipacao_valor_04").val();
            let coparticipacao_valor_05 = $("#coparticipacao_valor_05").val();

            $.ajax({
               url:"{{route('configurar.observacoes.coparticipacao')}}",
               method:"POST",
               data: {
                   observacao01,
                   observacao02,
                   observacao03,
                   coparticipacao_titulo_01,
                   coparticipacao_titulo_02,
                   coparticipacao_titulo_03,
                   coparticipacao_titulo_04,
                   coparticipacao_titulo_05,
                   coparticipacao_valor_01,
                   coparticipacao_valor_02,
                   coparticipacao_valor_03,
                   coparticipacao_valor_04,
                   coparticipacao_valor_05,
                   plano_id
               },
               success:function(res) {
                   console.log(res);
               }
            });

            {{--if(verificar_plano() == false) {--}}
            {{--    alert("Escolher um plano");--}}
            {{--}--}}
            {{--$(".container_pdf_all").removeClass('hidden');--}}
            {{--let campo = $(this).attr("id");--}}
            {{--let plano_id = verificar_plano();--}}
            {{--let valor = $(this).val();--}}
            {{--campo = campo == 'linha01' ? 'observacao01' : campo == 'linha02' ? 'observacao02' : 'observacao03';--}}

            {{--$.ajax({--}}
            {{--    url:"{{route('configuracao.observacao')}}",--}}
            {{--    method:"POST",--}}
            {{--    data:{--}}
            {{--        campo,--}}
            {{--        plano_id,--}}
            {{--        valor--}}
            {{--    }--}}
            {{--});--}}
        });

        $(".coparticipacao_titulo").on('change',function(){
            {{--if(verificar_plano() == false) {--}}
            {{--    alert("Escolher um plano");--}}
            {{--}--}}

            {{--if (!$(".container_pdf_all").is(":visible")) {--}}
            {{--    $(".container_pdf_all").removeClass("hidden");--}}
            {{--}--}}


            {{--let campo = $(this).attr("id");--}}
            {{--let plano_id = verificar_plano();--}}
            {{--let valor = $(this).val();--}}

            {{--$.ajax({--}}
            {{--    url:"{{route('configuracao.coparticipacao')}}",--}}
            {{--    method:"POST",--}}
            {{--    data:{--}}
            {{--        campo,--}}
            {{--        plano_id,--}}
            {{--        valor--}}
            {{--    }--}}
            {{--});--}}
        });

        $(".coparticipacao_valor").on('change',function(){

            {{--if(verificar_plano() == false) {--}}
            {{--    alert("Escolher um plano");--}}
            {{--}--}}

            {{--let campo = $(this).attr("id");--}}
            {{--let plano_id = verificar_plano();--}}
            {{--let valor = $(this).val();--}}

            {{--$.ajax({--}}
            {{--    url:"{{route('configuracao.coparticipacao.valores')}}",--}}
            {{--    method:"POST",--}}
            {{--    data:{--}}
            {{--        campo,--}}
            {{--        plano_id,--}}
            {{--        valor--}}
            {{--    }--}}
            {{--});--}}

        });









        $("body").on('change',"input[name='planos']",function(){
            let plano_id = $(this).val();

            $(".container_observacoes").removeClass('hidden');
            $(".container_coparticipacao").removeClass('hidden');
            $("#plano_selecionado").val(plano_id);

            $.ajax({
                url:"{{route('configuracao.veriricar.valores')}}",
                method:"POST",
                data: {
                    plano_id
                },
                success:function(res) {

                    if(res != "nada") {

                        if (!$(".container_pdf_all").is(":visible")) {
                            $(".container_pdf_all").removeClass("hidden");
                        }

                        if (!$(".container_logo").is(":visible")) {
                            $(".container_logo").removeClass("hidden");
                        }

                        if (!$(".container_redes").is(":visible")) {
                            $(".container_redes").removeClass("hidden");
                        }

                        if (!$(".container_zoom_pdf").is(":visible")) {
                            $(".container_zoom_pdf").removeClass("hidden");
                        }


                        $("#linha01").val(res.observacao01);
                        //$(".linha01").text(res.observacao01);

                        $("#linha02").val(res.observacao02);
                        //$(".linha02").text(res.observacao02);

                        $("#linha03").val(res.observacao03);
                        //$(".linha03").text(res.observacao03);

                        $("#coparticipacao_titulo_01").val(res.coparticipacao_titulo_01);
                        $("#coparticipacao_titulo_02").val(res.coparticipacao_titulo_02);
                        $("#coparticipacao_titulo_03").val(res.coparticipacao_titulo_03);
                        $("#coparticipacao_titulo_04").val(res.coparticipacao_titulo_04);
                        $("#coparticipacao_titulo_05").val(res.coparticipacao_titulo_05);
                        $("#coparticipacao_valor_01").val(formatNumber(res.coparticipacao_valor_01));
                        $("#coparticipacao_valor_02").val(formatNumber(res.coparticipacao_valor_02));
                        $("#coparticipacao_valor_03").val(formatNumber(res.coparticipacao_valor_03));
                        $("#coparticipacao_valor_04").val(formatNumber(res.coparticipacao_valor_04));
                        $("#coparticipacao_valor_05").val(formatNumber(res.coparticipacao_valor_05));



                    } else {

                        if ($(".container_pdf_all").is(":visible")) {
                            $(".container_pdf_all").addClass("hidden");
                        }

                        if ($(".container_logo").is(":visible")) {
                            $(".container_logo").addClass("hidden");
                        }

                        if ($(".container_redes").is(":visible")) {
                            $(".container_redes").addClass("hidden");
                        }

                        if ($(".container_zoom_pdf").is(":visible")) {
                            $(".container_zoom_pdf").addClass("hidden");
                        }

                        $("#linha01").val('');
                        $(".linha01").text('Linha 01');

                        $("#linha02").val('');
                        $(".linha02").text('Linha 02');

                        $("#linha03").val('');
                        $(".linha03").text('Linha 03');

                        $("#coparticipacao_titulo_01").val('');
                        $("#coparticipacao_titulo_02").val('');
                        $("#coparticipacao_titulo_03").val('');
                        $("#coparticipacao_titulo_04").val('');
                        $("#coparticipacao_titulo_05").val('');
                        $("#coparticipacao_valor_01").val('');
                        $("#coparticipacao_valor_02").val('');
                        $("#coparticipacao_valor_03").val('');
                        $("#coparticipacao_valor_04").val('');
                        $("#coparticipacao_valor_05").val('');
                        $(".copartipacao_titulo_01_resultado").text('-');
                        $(".copartipacao_valor_01_resultado").html('-');

                        $(".copartipacao_titulo_02_resultado").text('-');
                        $(".copartipacao_valor_02_resultado").html('-');

                        $(".copartipacao_titulo_03_resultado").text('-');
                        $(".copartipacao_valor_03_resultado").html('-');

                        $(".copartipacao_titulo_04_resultado").text('-');
                        $(".copartipacao_valor_04_resultado").html('-');

                        $(".copartipacao_titulo_05_resultado").text('-');
                        $(".copartipacao_valor_05_resultado").html('-');

                    }
                }

            });
        });










        $('#coparticipacao_valor_01').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_02').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_03').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_04').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_05').mask('#.##0,00', {reverse: true});

        $('#phone').mask('(00) 0 0000-0000');



    });
</script>













</body>




</html>
