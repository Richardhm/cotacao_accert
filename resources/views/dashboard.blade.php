<x-app-layout>
        <div class="w-full">
            @if ($diferencaEmDias > 0)
                <div id="countdownAlert" class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 text-center" role="alert">
                    <p class="font-bold">A assinatura gratuita encerrará em <span id="countdown">{{ $diferencaEmDias }}</span> dias.</p>
                </div>
            @endif


            <x-etapas></x-etapas>
            <!--Inicio do Grid 1º Linha-->
            <div class="flex">
                <!--DIV Operadoras-->
                <x-operadoras :operadoras="$operadoras"></x-operadoras>
                <!--Fim DIV Operadoras-->

                <!-- DIV PLANOS -->
                <div class="p-1 rounded hidden mt-2 mr-3 bg-purple-400" id="planos" style="width:22%;">
                    <x-planos :planos="$planos"></x-planos>
                </div>
                <!-- FIM DIV PLANOS -->

                <!--Formulario de Entrada de Dados-->
                <x-informacoes :cidades="$cidades"></x-informacoes>
                <!--Fim Formulario de Entrada de Dados-->

                <div class="p-1 rounded mt-2 hidden bg-purple-400" id="resultado" style="width:30%;"></div>
            </div>

        </div>
</x-app-layout>

<div id="myModal" class="modal hidden">
    <div class="modal-content bg-purple-400 p-6 rounded shadow-md">
    <span id="closeModalBtn" class="close-btn absolute top-2 right-2 cursor-pointer text-gray-600 hover:text-gray-800">
      <!-- Ícone de fechar modal -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </span>

        <div class="tabs border-b-2 border-blue-500">
            <button class="tablink active bg-purple-900 p-2 text-white" style="border-radius: 10px 10px 0 0" data-tab="cadastrar">Cadastrar Email</button>
            <button class="tablink bg-gray-200 p-2 text-gray-800" style="border-radius: 10px 10px 0 0" data-tab="listar">Listar Email</button>
        </div>
        <div id="cadastrar" class="tabcontent" style="display: block;">
            <p class="text-red-900 font-bold text-center">Importante! Senha padrão de email para convidados e: <b>{{auth()->user()->tenant()->first()->default_password}}</b></p>
            <p class="error_campo font-bold text-center text-red-900"></p>
            <div class="mb-5">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                <input type="text" id="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
            </div>
            <div>
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cadastrar_email">Cadastrar</button>
            </div>
        </div>
        <div id="listar" class="tabcontent" style="display: none;">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deletar
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @if($listConvidados != "")
                            @foreach($listConvidados as $ll)
                                <tr id="{{$ll->id}}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 py-4">{{$ll->name}}</td>
                                    <td class="px-6 py-4">{{$ll->email}}</td>
                                    <td class="px-6 py-4 remover_convidado" data-id="{{$ll->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </div>



    </div>
</div>




<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });





        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(".tablink").click(function() {
            var tabName = $(this).data("tab");
            $(".tabcontent").hide();
            $("#" + tabName).show();
            $(".tablink").removeClass("active");
            $(this).addClass("active");
        });

        function closeModal() {
            $("#myModal").fadeOut();
        }

        $('.cadastrar_email').on('click',function(){
            let nome = $("#nome").val();
            let email = $("#email").val();
            if (nome.trim() === '' || email.trim() === '') {
                $(".error_campo").text("Por favor, preencha todos os campos obrigatórios.");
                return false; // Impede o envio do formulário
            }
            $(".error_campo").text("");
            $.ajax({
                url:"{{route('profile.convidado.cadastrar')}}",
                method:"POST",
                data: {
                    nome,email
                },
                success:function(res) {
                    if(res != "error_cadastro" && res != "end") {
                        closeModal();
                        $("#listar").html(res);
                        toastr["success"](`O convidado ${nome} foi cadastrado com sucesso`);
                        $("#nome").val('');
                        $("#email").val('');
                    }
                }
            })
            return false;
        });

        $("body").on('click','.remover_convidado',function(){
           let id = $(this).attr('data-id');
           let self = $(this);
           $.ajax({
              url:"{{route('deletar.convidado')}}",
              method:"POST",
              data: {
                  id
              },
              success:function(res) {
                  self.closest('tr').fadeOut('fast');

              }
           });
        });


        $("#closeModalBtn").on('click',function(){
            $("#myModal").fadeOut();
        });

        $("body").on('click','.config_email',function(){
            $("#myModal").fadeIn();
            $("#myModal").on('click', function(event) {
                if ($(event.target).attr('id') === 'myModal') {
                    closeModal();
                }
            });
        });

        $("input[name='operadoras']").on('change', function() {
            $("#planos").removeClass("hidden");
            $("#planos").addClass("opacity-100 transition-opacity duration-500 ease-in");
            $("#etapa_01").removeClass("after:border-purple-400 dark:after:border-purple-400");
            $("#etapa_01").addClass("after:border-green-500 dark:after:border-green-500");
            $("#etapa_01_radius").removeClass("bg-purple-400 dark:bg-purple-400");
            $("#etapa_01_radius").addClass("bg-green-500 dark:bg-green-500");

            if($("#container_informacoes").is(":visible")) {
                $('#faixa_etarias input[type="text"]').each(function() {
                    if ($(this).val() !== "0") {
                        $(this).val("0");
                    }
                });
                $("#container_informacoes").addClass("hidden");
                $("#cidade").val('');

                if($("#etapa_03").is(":visible")) {
                    $("#etapa_03").addClass("hidden");
                }

                if($("#etapa_03").hasClass("after:border-green-500 dark:after:border-green-500")) {
                    $("#etapa_03").addClass("after:border-purple-400 dark:after:border-purple-400");
                }

                if($("#etapa_03_radius").hasClass("bg-green-500 dark:bg-green-500")) {
                    $("#etapa_03_radius").addClass("bg-purple-400 dark:bg-purple-400");
                }
            }

            if($("#resultado").is(":visible")) {
                $("#resultado").html('');
                $("#resultado").addClass("hidden");

                if($("#etapa_04").is(":visible")) {
                    $("#etapa_04").addClass("hidden");
                }

                if($("#etapa_04").hasClass("after:border-green-500 dark:after:border-green-500")) {
                    $("#etapa_04").addClass("after:border-purple-400 dark:after:border-purple-400");
                }

                if($("#etapa_04_radius").hasClass("bg-green-500 dark:bg-green-500")) {
                    $("#etapa_04_radius").addClass("bg-purple-400 dark:bg-purple-400");
                }
            }

            let operadora_id = $(this).val();
            $.ajax({
                url:"{{route('home.operadora.plano')}}",
                method:"POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    operadora_id

                },
                success:function(res) {
                    if(res == "nada") {
                        $('#planos').html('<button class="py-2.5 w-full px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 bg-gray-500 bg-opacity-10 dark:hover:text-gray-900">Sem Planos</button>');
                    } else {
                        $('#planos').html(res);
                    }
                }
            });

            $("#etapa_02").removeClass("hidden");

            //$(".container_image_operadora").removeClass("border-2 rounded-lg border-green-300");


            //$(this).parent().closest('.container_image_operadora').addClass("border-2 rounded-lg border-green-300");


            // if (interacaoContador >= 2) {
            //     atualizarResultado();
            // }
            // return false;
        });

        $("body").on('change',"input[name='planos-radio']",function(e){
            $("#container_informacoes").removeClass("hidden");
            $("#container_informacoes").addClass("opacity-100 transition-opacity duration-500 ease-in");
            $("#etapa_02").removeClass("after:border-purple-400 dark:after:border-purple-400");
            $("#etapa_02").addClass("after:border-green-500 dark:after:border-green-500");
            $("#etapa_02_radius").removeClass("bg-purple-400 dark:bg-purple-400");
            $("#etapa_02_radius").addClass("bg-green-500 dark:bg-green-500");
            $("#etapa_03").removeClass("hidden");
            if($("#faixa_etarias").is(":visible") && $("#resultado").is(":visible")) {
                setTimeout(updateOperadorasVisibility, 0);
            }
            return false;
        });





      $("body").on('click',".downloadLink",function(e){
        e.preventDefault();
        let linkUrl = $(this).attr("href");

        let cidade = "";
        let plano = "";
        let operadora = "";
        let faixas = [];
        let odonto = "";
        let cliente = "";


        cidade = $("#cidade").val();
        plano = $("input[name='planos-radio']:checked").val();
        operadora = $("input[name='operadoras']:checked").val();
        odonto = $(this).attr('data-odonto');
        cliente = $("#nome").val() == "" ? "" : $("#nome").val()

        faixas = [{
          '1' : $("body").find("#input_0_18").val(),
          '2' : $("body").find('#input_19_23').val(),
          '3' : $("body").find('#input_24_28').val(),
          '4' : $("body").find('#input_29_33').val(),
          '5' : $("body").find('#input_34_38').val(),
          '6' : $("body").find('#input_39_43').val(),
          '7' : $("body").find('#input_44_48').val(),
          '8' : $("body").find('#input_49_53').val(),
          '9' : $("body").find('#input_54_58').val(),
          '10' : $("body").find('#input_59').val()
        }];
        $.ajax({
            url: "{{route('gerar.imagem')}}",
            method: "POST",
            data: {
              "tabela_origem": cidade,
              "plano": plano,
              "operadora": operadora,
              "faixas": faixas,
              "odonto" : odonto,
              "cliente" : cliente,
              "_token": "{{ csrf_token() }}"
            },
            xhrFields: {
                    responseType: 'blob'
            },
            success:function(blob,status,xhr,ppp) {
                    if(blob.size && blob.size != undefined) {
                        $("#etapa_04").removeClass("after:border-purple-400 dark:after:border-purple-400");
                        $("#etapa_04").addClass("after:border-green-500 dark:after:border-green-500");


                        $("#etapa_04_radius").removeClass("bg-purple-400 dark:bg-purple-400");
                        $("#etapa_04_radius").addClass("bg-green-500 dark:bg-green-500");
                        var filename = "";
                        var disposition = xhr.getResponseHeader('Content-Disposition');
                        if (disposition && disposition.indexOf('attachment') !== -1) {
                            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                            var matches = filenameRegex.exec(disposition);
                            if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                        }
                        if (typeof window.navigator.msSaveBlob !== 'undefined') {
                            window.navigator.msSaveBlob(blob, filename);
                        } else {
                            var URL = window.URL || window.webkitURL;
                            var downloadUrl = URL.createObjectURL(blob);
                            if (filename) {
                                var a = document.createElement("a");
                                if (typeof a.download === 'undefined') {
                                    //window.location.href = downloadUrl;
                                } else {
                                    a.href = downloadUrl;
                                    a.download = filename;
                                    document.body.appendChild(a);
                                    a.click();
                                    return false;
                                }
                            } else {
                                //window.location.href = downloadUrl;
                                return false;
                            }
                            setTimeout(function () {
                                URL.revokeObjectURL(downloadUrl);
                            },100);
                            return false;
                        }

                    }
                }
            });
            return false;
        });



      function atualizarResultado() {

          setTimeout(()=>{
            let cidade = "";
            let plano = "";
            let operadora = "";
            let faixas = [];

            cidade = $("#cidade").val();
            plano = $("input[name='planos-radio']:checked").val();
            operadora = $("input[name='operadoras']:checked").val();

            faixas = [{

              '1' : $("body").find("#input_0_18").val(),
              '2' : $("body").find('#input_19_23').val(),
              '3' : $("body").find('#input_24_28').val(),
              '4' : $("body").find('#input_29_33').val(),
              '5' : $("body").find('#input_34_38').val(),
              '6' : $("body").find('#input_39_43').val(),
              '7' : $("body").find('#input_44_48').val(),
              '8' : $("body").find('#input_49_53').val(),
              '9' : $("body").find('#input_54_58').val(),
              '10' : $("body").find('#input_59').val()

            }];

            $.ajax({
              url: "{{ route('orcamento.montarOrcamento') }}",
              method: "POST",
              data: {
                  "tabela_origem": cidade,
                  "plano": plano,
                  "operadora": operadora,
                  "faixas": faixas,
                  "_token": "{{ csrf_token() }}",
              },
              success: function(res) {
                  $("#resultado").removeClass('hidden').slideDown('slow').html(res);
                  //interacaoContador++;
                  return false;
              }
            });


          },0.1);


        return false;

      }


        // Adicione um listener de eventos para cada input com a classe plus e minus
        $(".minus").on('click', function() {
            setTimeout(updateOperadorasVisibility, 0);
        });

        // Adicione um listener de eventos para o select da cidade
        $("#cidade").on('change', function() {
            setTimeout(updateOperadorasVisibility, 0);
        });

        // Adicione um listener de eventos para os eventos input nos inputs
        $("#faixa_etarias input[type='text']").on('input', function() {
            setTimeout(updateOperadorasVisibility, 0);
        });

        // Função para atualizar a visibilidade da div #operadoras
        function updateOperadorasVisibility() {
            // Verifique se todos os inputs têm valor zero
            let anyInputHasValue = $("#faixa_etarias input[type='text']").filter(function() {
                return parseInt($(this).val()) !== 0;
            }).length > 0;

            let cidadeHasValue = $("#cidade").val() !== "";
            if (anyInputHasValue && cidadeHasValue) {
                atualizarResultado();

                $("#etapa_03").removeClass("after:border-purple-400 dark:after:border-purple-400");
                $("#etapa_03").addClass("after:border-green-500 dark:after:border-green-500");


                $("#etapa_03_radius").removeClass("bg-purple-400 dark:bg-purple-400");
                $("#etapa_03_radius").addClass("bg-green-500 dark:bg-green-500");

                $("#etapa_04").removeClass("hidden");


                //$("#operadoras").removeClass("hidden");
                //$("#operadoras").addClass("opacity-100 transition-opacity duration-500 ease-in");
            } else {
                // Caso contrário, oculte a div #operadoras com efeito de transição
                // $("#operadoras").removeClass("opacity-100");
                // $("#operadoras").addClass("opacity-0 transition-opacity duration-500 ease-out");
                // // Adicione a classe hidden após o término da animação para garantir que a div não seja interativa enquanto estiver oculta
                // setTimeout(function() {
                //     $("#operadoras").addClass("hidden");
                // }, 500);
            }
        }



        let counterInput = $("input[type='text']");
        let incrementButton = $("button:contains('+')");
        let decrementButton = $("button:contains('-')");

        // Adiciona evento de clique para incremento
        incrementButton.click(function() {
            let currentValue = parseInt($(this).siblings("input[type='text']").val()) || 0;
            if (getTotal() < 8) {
                $(this).siblings("input[type='text']").val(currentValue + 1);
            }
        });

        // Adiciona evento de clique para decremento
        decrementButton.click(function() {
            let currentValue = parseInt($(this).siblings("input[type='text']").val()) || 0;
            if (currentValue > 0) {
                $(this).siblings("input[type='text']").val(currentValue - 1);
            }
        });

        function getTotal() {
            let total = 0;
            $("input[type='text']").each(function() {
                total += parseInt($(this).val()) || 0;
            });
            return total;
        }
    });


</script>
