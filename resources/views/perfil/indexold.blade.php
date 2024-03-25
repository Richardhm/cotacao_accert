<x-app-layout>
{{--    @if(auth()->user()->admin == 1 && session('tenant_id') == auth()->user()->tenant_id)--}}
        <div class="w-full h-screen">
            <div class="container mx-auto mt-8">
                <div class="flex items-center justify-center">
                    <div class="w-4/5 rounded-lg shadow h-4/5 min-h-full bg-purple-400">
                        <div class="flex">
                            <button id="tabPerfilAdmin" class="w-1/3 py-2 text-center rounded-tl-lg bg-white bg-opacity-50 text-white font-bold">Perfil</button>
                            <button id="tabPDFAdmin" class="w-1/3 py-2 text-center rounded-tr-lg font-bold text-white">Monte seu PDF</button>
                            <button id="tabEmailAdmin" class="w-1/3 py-2 text-center rounded-tr-lg font-bold text-white">Email</button>
                        </div>


                        <div id="contentPerfilAdmin" class="p-4">
                            <!-- Adicione o conteúdo da aba Perfil aqui -->
                            <form name="editar_usaurio" class="w-full" method="POST">
                                @csrf
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="email" value="{{auth()->user()->email}}" disabled name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:dark:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                </div>


                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" value="{{auth()->user()->name ?? ''}}" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-gray-300 peer" placeholder=" " required />
                                    <label for="name" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nome</label>
                                </div>


                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="tel" name="phone" id="phone" value="{{auth()->user()->phone ?? ''}}" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-gray-300 peer" placeholder=" " required />
                                        <label for="phone" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefone</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="text" name="company" id="company" value="{{auth()->user()->company ?? ''}}" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-gray-300 peer" placeholder=" " required />
                                        <label for="company" class="peer-focus:font-medium absolute text-sm text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Empresa</label>
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-5">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Foto</label>
                                    <input name="photo" class="block w-full mb-5 text-xs text-gray-900 border-0 border-b-2 border-white rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:text-white dark:text-white dark:text-white" id="photo" type="file">
                                </div>
                                <fieldset class="border-gray-300 border-white rounded-lg border-2 p-3 mb-5">
                                    <legend class="text-white mx-auto">Quer trocar de senha?</legend>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-gray-300 peer" placeholder=" " />
                                        <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-800 dark:text-gray-800 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-gray-700 peer-focus:dark:text-gray-700 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Senha</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="password" name="repeat_password" id="repeat_password" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none focus:ring-0 focus:border-gray-300 peer" placeholder=" " />
                                        <label for="repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-800 dark:text-gray-800 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-gray-700 peer-focus:dark:text-gray-700 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar Senha</label>
                                    </div>
                                </fieldset>


                                <div class="relative z-0 w-full mb-5">
                                    <button type="submit" class="py-2.5 w-full px-5 me-2 mb-2 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 bg-gray-500 bg-opacity-10 dark:hover:text-gray-900">Salvar</button>
                                </div>

                            </form>
                        </div>
                        <div id="contentPDFAdmin" class="hidden py-10 w-full">

                            <div style="flex-basis: 50%;" class="py-10">
                                <form method="post" name="perfil_edit_pdf" class="flex flex-col bg-gray-700">
                                    @csrf
                                    <h3 class="mb-4 font-semibold text-gray-900 text-xl text-white">1. Cabeçalhos</h3>
                                    <ul class="items-center w-full text-sm font-medium bg-white border border-gray-200 rounded-lg flex">
                                        @foreach($cabecalho as $c)
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                <div class="flex items-center ps-3">
                                                    <input id="cabecalho_{{$c->id}}"
                                                           type="radio"
                                                           value="{{$c->id}}"
                                                           {{!empty($perfil->cabecalho_id) && $perfil->cabecalho_id == $c->id ? 'checked' : ''}}
                                                           name="cabecalho_id"
                                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300
                                                           focus:ring-blue-500 dark:focus:ring-blue-600
                                                           dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="cabecalho_{{$c->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        <img src="{{$c->nome ?? ''}}" style="width:90%;">
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div>
                                        <h3 class="mb-4 font-semibold text-white text-xl">2. Cor de Fundo</h3>
                                        <div>
                                            <input type="color" id="cor_fundo" name="cor_fundo" value="{{$perfil->cor_fundo ?? '#FFFFFF'}}" />
                                        </div>
                                    </div>

                                    <div>
                                        <h3 class="mb-4 font-semibold text-white text-xl">3. Cor do Rodape</h3>
                                        <div>
                                            <input type="color" id="cor_rodape" name="cor_rodape" value="{{$perfil->cor_fonte ?? '#FFFFFF'}}" />
                                        </div>
                                    </div>


                                </form>
                            </div>

                            <div id="previewImage" style="flex-basis: 50%;" class="py-10">
                                <div id="previewImageMostrar">
                                    <div style="height:100%;width:100%;poisition:relative;overflow: hidden;">
                                        @if(!empty($perfil->cabecalho) && $perfil->cabecalho->nome)
                                            <img src="{{$perfil->cabecalho->nome}}" style="width:100%;height:100px;position:relative;top:0;left:0;">
                                        @endif
                                        <div class="body" style="background-color:{{$perfil->cor_fundo ?? ''}};width:100%;height:calc(100% - 140px);"></div>
                                        <div style="width:100%; height:40px; position:relative; bottom:0; left:0; background-color:{{$perfil->cor_fonte ?? ''}}"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="contentEmailAdmin" class="hidden p4">
                            <div class="w-full flex items-center justify-between border-b-2 border-white mb-5">
                                <h3 class="w-[3%] text-gray-700 bg-white flex justify-center">
                                    <button data-modal-target="cadastrar-modal" data-modal-toggle="cadastrar-modal" class="estilo_btn_plus flex justify-center w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </h3>
                                <div>
                                    <p class="text-sm">Cadastrado 0/20 emails</p>
                                </div>
                            </div>

                            <div id="cadastrar-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden
                            fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <form action="" class="flex flex-col w-2/4 bg-white bg-opacity-20 p-4 rounded-lg">
                                        <div class="flex-col w-full mb-3">
                                            <label for="nome" class="text-white">Nome:</label>
                                            <input type="text" name="convidado_nome" id="convidade_nome" class="rounded-lg w-full" placeholder="Nome">
                                        </div>
                                        <div class="flex-col w-full mb-3">
                                            <label for="email" class="text-white">Email:</label>
                                            <input type="text" name="convidado_email" id="convidade_email" class="rounded-lg w-full" placeholder="Email">
                                        </div>
                                        <div class="flex-col w-full mb-3">
                                            <label for="email" class="text-white">Telefone:</label>
                                            <input type="text" name="convidado_telefone" id="convidade_telefone" class="rounded-lg w-full" placeholder="(XX) X XXXX-XXXX">
                                        </div>
                                    <button class="w-full bg-orange-200 p-2 rounded-lg cadastrar_email">Cadastrar</button>
                                </form>
                            </div>


                            <div class="w-full py-2" id="container-listar-convidados">

                                <x-listar-convidados :users="$users"></x-listar-convidados>

                            </div>







                        </div>





                    </div>
                </div>
            </div>
        </div>

</x-app-layout>

<script src="{{asset('build/assets/toastr/toastr.min.js')}}"></script>
<script>
	$(document).ready(function() {

        $("#convidade_telefone").mask('(00) 0 0000-0000');



        function updatePreview() {
            // Obter valores selecionados pelo usuário
            let selectedCabecalhoId = $('input[name="cabecalho_id"]:checked').parent().find('img').attr("src");
            let selectedCorFundo = $('#cor_fundo').val();
            let corRodape = $('#cor_rodape').val();


            let semCorRodape = !corRodape || corRodape == '#ffffff';

            // Calcular a altura da body com base na presença da cor do rodapé
            let alturaBody = semCorRodape ? '100%' : 'calc(100% - 140px)';

            // Montar o HTML do preview com base nas seleções
            let previewHtml = `
                    <div style="height:100%;width:100%;poisition:relative;overflow: hidden;">
                        <img src="${selectedCabecalhoId}" style="width:100%;height:100px;position:relative;top:0;left:0;">
                        <div class="body" style="background-color: ${selectedCorFundo};width:100%;height:${alturaBody};"></div>
                        ${!semCorRodape ? `<div style="width:100%; height:40px; position:relative; bottom:0; left:0; background-color:${corRodape}"></div>` : ''}
                    </div>`;


            // // Atualizar o conteúdo do previewImageMostrar
            $('#previewImageMostrar').html(previewHtml);
        }

        // Chamar a função de atualização quando houver mudanças nas seleções do usuário
        $('input[name="cabecalho_id"], #cor_fundo, #cor_rodape').change(function() {
            updatePreview();
            $.ajax({
                url:"{{route('perfil.edit')}}",
                method:"POST",
                data: {
                    cabecalho: $("input[name='cabecalho_id']").val(),
                    fundo: $("#cor_fundo").val(),
                    rodape: $("#cor_rodape").val()
                }
            });
        });

        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            showDuration: '300',
            hideDuration: '1000',
            timeOut: '5000',
            extendedTimeOut: '1000',
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            tapToDismiss: false,
            toastClass: 'custom-toast', // Adicione uma classe personalizada
            preventDuplicates: true,
        };

        // Adicione um método para sobrescrever as opções conforme necessário
        toastr.options.onShown = function () {
            $(".custom-toast").css("width", "600px"); // Ajuste conforme necessário
        };

            $('#phone').mask('(00) 0 0000-0000');
            // Trocar para a aba Perfil ao carregar a página
            $("#tabPerfil").click(function() {
                $("#tabPerfil").addClass("bg-white bg-opacity-50");
                $("#tabPDF").removeClass("bg-white bg-opacity-50");
                $("#contentPerfil").show();
                $("#contentPDF").hide();
            });

            $("#tabPerfilAdmin").click(function() {
                $("#tabPerfilAdmin").addClass("bg-white bg-opacity-50");
                $("#tabPDFAdmin").removeClass("bg-white bg-opacity-50");
                $("#tabEmailAdmin").removeClass("bg-white bg-opacity-50");
                $("#contentPerfilAdmin").show();
                $("#contentPDFAdmin").hide().removeClass("flex")
                $("#contentEmailAdmin").hide();
            });

            $("#tabPDFAdmin").click(function() {
                $("#tabPerfilAdmin").removeClass("bg-white bg-opacity-50");
                $("#tabPDFAdmin").addClass("bg-white bg-opacity-50");
                $("#tabEmailAdmin").removeClass("bg-white bg-opacity-50");
                $("#contentPerfilAdmin").hide();
                $("#contentPDFAdmin").addClass("flex").removeClass("hidden").show();
                $("#contentEmailAdmin").hide();
            });

            $("#tabEmailAdmin").click(function() {
                $("#tabPerfilAdmin").removeClass("bg-white bg-opacity-50");
                $("#tabPDFAdmin").removeClass("bg-white bg-opacity-50");
                $("#tabEmailAdmin").addClass("bg-white bg-opacity-50");
                $("#contentPerfilAdmin").hide();
                $("#contentPDFAdmin").hide().removeClass("flex");
                $("#contentEmailAdmin").show();
            });

            // Trocar para a aba PDF ao clicar na aba PDF
            $("#tabPDF").click(function() {
                $("#tabPDF").addClass("bg-white bg-opacity-50");
                $("#tabPerfil").removeClass("bg-white bg-opacity-50");
                $("#contentPDF").show();
                $("#contentPerfil").hide();
            });


        let image_edit = "";
        $("body").on('change','#photo',function(e) {
            image_edit = e.target.files;
            let newImage = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function (e) {
                // Atualiza o atributo src com a nova imagem
                $("body").find("#imagem_usuario").attr('src',e.target.result);
            };
            reader.readAsDataURL(newImage);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("form[name='editar_usaurio']").on('submit',function(e){
                e.preventDefault();
                let password = $("#password").val();
                let repeatPassword = $("#repeat_password").val();
                let fd = new FormData();
                fd.append('file',image_edit[0]);
                fd.append('name',$("#name").val());
                fd.append('last_name',$("#last_name").val());
                fd.append('phone',$("#phone").val());
                fd.append('company',$("#company").val());
                if (password !== repeatPassword) {
                    toastr.error('As senhas não coincidem. Por favor, revise e continue.');
                    return;
                }
                if(password && password != "") {
                    fd.append('password',$("#password").val());
                }
                $.ajax({
                   url:"{{route('profile.store')}}",
                   method:"POST",
                   processData: false,
                   contentType: false,
                   data:fd,
                    success:function(res) {

                       if(res == "success") {
                           toastr.success("Dados cadastrados com sucesso");
                        } else {
                           toastr.error("Erro ao cadastrar os dados");
                        }
                    }
                });
               return false;
            });



            $("form[name='perfil_edit_pdf']").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url:"{{route('perfil.edit')}}",
                    method:"POST",
                    data:$(this).serialize(),
                    success:function(res) {
                        if(res == "success") {
                            toastr.success("Dados cadastrados com sucesso");
                        } else {
                            toastr.error("Erro ao cadastrar os dados");
                        }
                    }
                });
                return false;
            });

            $(".cadastrar_email").on('click',function(){
                 let nome = $("#convidade_nome").val();
                 let email = $("#convidade_email").val();
                 let telefone = $("#convidade_telefone").val();
                 $.ajax({
                    url:"{{route('profile.convidado.cadastrar')}}",
                    method:"POST",
                    data: {
                        nome,email,telefone
                    },
                    success:function(res) {
                        if(res != "end") {
                            // Remover a modal do DOM após ocultá-la
                            $("#cadastrar-modal").removeClass('overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex ');
                            //
                            $("#cadastrar-modal").addClass('hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full');
                            $("body").removeClass('overflow-hidden');
                            $("div[modal-backdrop]").addClass('hidden');

                            $("#convidade_nome").val('');
                            $("#convidade_email").val('');
                            $("#convidade_telefone").val('');



                            $("#container-listar-convidados").html(res);
                        } else {
                            alert("Chegou ao Limite de cadastro de email")
                        }

                    }
                 });
                 return false;
            });





        });

</script>

<style>
    #previewImage {
        background-color:#FFF;
        display:flex;
        justify-content: center;
    }
    #previewImageMostrar {
        border:2px solid black;
        width:80%;
    }
</style>


