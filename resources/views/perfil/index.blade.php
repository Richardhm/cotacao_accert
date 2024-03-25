<x-app-layout>
    {{--    @if(auth()->user()->admin == 1 && session('tenant_id') == auth()->user()->tenant_id)--}}
    <div class="w-full h-screen">
        <div class="container mx-auto mt-8">
            <div class="flex items-center justify-center">
                <div class="w-4/5 rounded-lg shadow h-4/5 min-h-full bg-purple-400">
                    <div class="flex">
                        <button id="tabPerfilAdmin" class="w-1/3 py-2 text-center rounded-tl-lg bg-white bg-opacity-50 text-white font-bold">Perfil</button>
                    </div>
                    <div id="contentPerfilAdmin" class="p-4">
                        <form name="editar_usaurio" class="w-full" method="POST">
                            @csrf

                            <div class="w-full flex">
                                <div class="w-[80%]">
                                    <div class="w-full mb-5">
                                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                                        <input type="email" disabled value="{{auth()->user()->email}}" id="email" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                    </div>
                                    <div class="w-full mb-5">
                                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nome</label>
                                        <input type="text" value="{{auth()->user()->name}}" id="name" name="name" class="mudar_dados bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                    </div>
                                    <div class="w-full mb-5">
                                        <label for="phone" class="block mb-2 text-sm font-medium text-white">Telefone</label>
                                        <input type="text" value="{{auth()->user()->phone}}" id="phone" name="phone" class="mudar_dados bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                    </div>
                                </div>

                                <div class="w-[20%] flex justify-center items-center">

                                    <label for="file-input" class="custom-upload" id="upload-label">
                                        @if($photo)
                                            <img class="w-48 h-48 mb-3 rounded-full shadow-lg text-white bg-white" id="uploaded-image" src="{{$photo}}" alt="{{auth()->user()->name}}"/>
                                        @else
                                            <img class="w-48 h-48 mb-3 rounded-full shadow-lg text-white bg-white" id="uploaded-image" src="{{asset('user.png')}}" alt="{{auth()->user()->name}}"/>
                                        @endif
                                    </label>

                                    <input type="file" id="file-input" accept="image/*" style="display: none;">

                                </div>

                            </div>


                            <fieldset class="border-gray-300 border-white rounded-lg border-2 p-3 mb-5">
                                <legend class="text-white mx-auto">Quer trocar de senha?</legend>
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="password" class="block mb-2 text-sm font-medium text-white">Senha</label>
                                    <input type="password" value="" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="repeat_password" class="block mb-2 text-sm font-medium text-white">Confirmar Senha</label>
                                    <input type="password" value="" id="repeat_password" name="repeat_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                                </div>
                                <div class="relative z-0 w-full mb-5">
                                    <button type="submit" class="py-2.5 w-full px-5 me-2 mb-2 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 bg-gray-500 bg-opacity-10 dark:hover:text-gray-900">Salvar Senha</button>
                                </div>
                            </fieldset>




                        </form>
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
                data:fd
            });
            return false;
        });

        $(".mudar_dados").on('change',function(){
            let campo = $(this).attr("id");
            let valor = $(this).val();
            $.ajax({
                url:"{{route('mudar.dados')}}",
                method:"POST",
                data: {
                    campo,
                    valor
                }

            });
        });


    });

</script>
