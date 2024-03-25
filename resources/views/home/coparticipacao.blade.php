<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Configurar Coparticipação & Observações</title>
    <style>
        html, body {height: 100%;}
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{asset('build/assets/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <style>
        #overlay {display: none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.5);z-index: 999;}
        #zoomedImage {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 30%;
            max-height: 80%;
            z-index: 1000;
        }
        table {width:95%;margin:0 auto;color:#FFFFFF;}

        table thead tr {border-bottom:1px solid white;}
        tbody td {background-color:#FFF;color:black;text-align: center;font-size:0.8em;color:rgb(5,53,95);padding:5px;}
        tfoot td {background: rgb(185,185,185);color:rgb(5,53,95);text-align: center;font-size:0.8em;padding:5px;font-weight:bold;}

        .header_fundo_azul {text-align:center;font-size:0.8em;color:#FFF;background-color:rgb(5,53,95);}
        .header_fundo_laranja {text-align:center;font-size:0.8em;color:#FFF;background-color:rgb(255,89,33);}

        .head_com_coparticipacao {
            text-align:center;font-size:0.6em;color:#FFF;background-color:rgb(5,53,95);
        }
        .head_coparticipacao_parcial {
            text-align:center;font-size:0.6em;color:#FFF;background-color:rgb(255,89,33);
        }

        .valores-carencias {width:50%;height:220px;margin-left: 2.6%;margin-top: 5px;}
        .valores-carencias-col1 {width:29%;float:left;margin-left: 2%;}
        .valores-carencias-col1 h3 {margin:10px 0 10px 10px;color: rgb(251,183,25);font-size:1.1em;}
        .valores-carencias-col1-cards {width:100%;display:block;height:40px;}
        .valores-carencias-col1-param-1 {width:65%;float:left;padding:5px 5px;margin:0 0 0 0;background-color:#FFF;font-size:0.875em;font-weight: 400;}
        .valores-carencias-col1-param-2 {width:33%;float:right;background-color:#FFF;padding:5px 5px;text-align:center;font-size:0.875em;font-weight: 400;}






    </style>

</head>
<body class="font-sans bg-gray-100 flex flex-col h-full m-0 box-border">
<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 w-full flex justify-between py-1 items-center">
    <button class="text-gray-800 text-4xl text-center align-center flex self-center font-mono">
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
<input type="hidden" id="plano_selecionado">
<div class="flex h-full flex-wrap">

    <div class="" style="width:15%;">
        <div class="h-[25%] box-border rounded-lg" style="background-color: #A78BFA;">
            <label for="planos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-white text-center">Escolher plano para configurar</label>
            <select id="planos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[80%] mx-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500  dark:focus:border-blue-500">
                <option value="" class="text-center">Escolher o Plano</option>
                @foreach($planos as $pp)
                    <option value="{{$pp->id}}">{{$pp->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="h-[73.7%] box-border mt-1 flex p-2 rounded-lg" style="background-color: #A78BFA;">
            @if(count($planoCad) >= 1)
                <ul class="w-full mb-5">
                    @foreach($planoCad as $pc)
                        <li data-id="{{$pc->planos->id}}" class="text-center w-full text-white bg-white bg-opacity-20 py-2 hover:cursor-pointer rounded-lg planos_cad">{{$pc->planos->nome}}</li>
                    @endforeach
                </ul>

            @endif



        </div>
    </div>

    <div class="flex flex-wrap ml-2.5 mr-2.5 p-1 rounded-lg" style="width:48%;height:94%;background-color: #A78BFA;">
        <div class="" style="width:100%">
            <div>
                <h5 class="text-lg font-extrabold dark:text-white text-white mb-2">1º Observações <small>(No máximo 3 linhas)</small> </h5>
                <div class="relative z-0 w-full mb-2 group">

                    <input type="text" value="" name="linha01" maxlength="114" id="linha01" class="observacao bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="1º Linha (No maximo 114 caracteres)" required />

                </div>
                <div class="relative z-0 w-full mb-2 group">

                    <input type="text" value="" name="linha02" maxlength="114" id="linha02" class="observacao bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="2º Linha (No maximo 114 caracteres)" required />

                </div>
                <div class="relative z-0 w-full mb-2 group">
                    <input type="text" value="" name="linha03" maxlength="114" id="linha03" class="observacao bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="3º Linha (No maximo 114 caracteres)" required />

                </div>
            </div>
            <div>
                <h5 class="text-lg font-extrabold dark:text-white text-white mb-3">2º Valores de Coparticipação<small>(No máximo 5 valores)</small></h5>


                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-2 group">

                        <input type="text" name="copartipacao_titulo_01" value="" id="coparticipacao_titulo_01" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Titulo" />
                    </div>
                    <div class="relative z-0 w-full mb-2 group">

                        <input type="text" name="copartipacao_valor_01" value="" id="coparticipacao_valor_01" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Valor" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-2 group">
                        <input type="text" name="copartipacao_titulo_02" value="" id="coparticipacao_titulo_02" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Titulo" />

                    </div>
                    <div class="relative z-0 w-full mb-2 group">
                        <input type="text" name="copartipacao_valor_02" value="" id="coparticipacao_valor_02" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Valor" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-2 group">

                        <input type="text" name="copartipacao_titulo_03" value="" id="coparticipacao_titulo_03" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Titulo" />

                    </div>
                    <div class="relative z-0 w-full mb-2 group">

                        <input type="text" name="copartipacao_valor_03" value="" id="coparticipacao_valor_03" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Valor" />

                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-2 group">

                        <input type="text" name="copartipacao_titulo_04" value="" id="coparticipacao_titulo_04" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Titulo" />

                    </div>
                    <div class="relative z-0 w-full mb-2 group">

                        <input type="text" name="copartipacao_valor_04" value="" id="coparticipacao_valor_04" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Valor" />

                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-2 group">
                        <input type="text" name="copartipacao_titulo_05" value="" id="coparticipacao_titulo_05" class="coparticipacao_titulo bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Titulo" />
                    </div>
                    <div class="relative z-0 w-full mb-2 group">
                        <input type="text" name="copartipacao_valor_05" value="" id="coparticipacao_valor_05" class="coparticipacao_valor bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-transparent focus:ring-0 block w-full p-2 placeholder:text-gray-400" placeholder="Valor" />
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div style="width:35%">

        <div class="" style="width:100%;height:99.5%;position:relative;top:0;">


            <div style="height:100%;width:100%;poisition:relative;overflow: hidden;">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABd0AAAFlCAYAAAAefUH0AAAAAXNSR0IArs4c6QAAAARzQklUCAgICHwIZIgAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAR9aVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pgo8eDp4bXBtZXRhIHhtbG5zOng9J2Fkb2JlOm5zOm1ldGEvJz4KPHJkZjpSREYgeG1sbnM6cmRmPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjJz4KCiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0nJwogIHhtbG5zOkF0dHJpYj0naHR0cDovL25zLmF0dHJpYnV0aW9uLmNvbS9hZHMvMS4wLyc+CiAgPEF0dHJpYjpBZHM+CiAgIDxyZGY6U2VxPgogICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSdSZXNvdXJjZSc+CiAgICAgPEF0dHJpYjpDcmVhdGVkPjIwMjMtMDUtMjU8L0F0dHJpYjpDcmVhdGVkPgogICAgIDxBdHRyaWI6RXh0SWQ+N2RlYTJjYTUtOTExZi00M2FhLTgwYWMtNTFkNTU0MTY1ZTgxPC9BdHRyaWI6RXh0SWQ+CiAgICAgPEF0dHJpYjpGYklkPjUyNTI2NTkxNDE3OTU4MDwvQXR0cmliOkZiSWQ+CiAgICAgPEF0dHJpYjpUb3VjaFR5cGU+MjwvQXR0cmliOlRvdWNoVHlwZT4KICAgIDwvcmRmOmxpPgogICA8L3JkZjpTZXE+CiAgPC9BdHRyaWI6QWRzPgogPC9yZGY6RGVzY3JpcHRpb24+CgogPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpkYz0naHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8nPgogIDxkYzp0aXRsZT4KICAgPHJkZjpBbHQ+CiAgICA8cmRmOmxpIHhtbDpsYW5nPSd4LWRlZmF1bHQnPlBMQU5PIE9ET05UTyBJTkNMVVNPIC0gMTwvcmRmOmxpPgogICA8L3JkZjpBbHQ+CiAgPC9kYzp0aXRsZT4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6cGRmPSdodHRwOi8vbnMuYWRvYmUuY29tL3BkZi8xLjMvJz4KICA8cGRmOkF1dGhvcj5LYXJvbGluZSBBbGJlcm5hejwvcGRmOkF1dGhvcj4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6eG1wPSdodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvJz4KICA8eG1wOkNyZWF0b3JUb29sPkNhbnZhPC94bXA6Q3JlYXRvclRvb2w+CiA8L3JkZjpEZXNjcmlwdGlvbj4KPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0ncic/PspbSyEAACAASURBVHic7N13fJRluv/xz/3MTDot9N6LIiiIKKCiYkGPbZVV99jP7vFs/207u2ctZz3retTVs+qurrr2tQuKIihdEBCkCaGGEkpCEhLS+5Tn/v0xSSBkApOQEMr3/XqxspmZe64ZksnM97me6zbWWouIiIiIiIiItJglKZm8PWcb81ant3YpIiIi0sK8rV2AiIiIiIiIyKmouMzPtEU7+eecrezdX9ra5YiIiMhxotBdREREREREpBlt2pXPW3NT+XTJLqoCodYuR0RERI4zhe4iIiIiIiIizeCTJWm8PXcba7fltnYpIiIi0ooUuouIiIiIiIg00b7cMt6dv433F2ynoKSqtcsRERGRE4BCdxEREREREZFG+mp9Jm/P3cZ8bYwqIiIih1HoLiIiIiIiIhKFojI/077cwVtzU7UxqoiIiDRIobuIiIiIiIjIEWzclc9bc1KZsVQbo4qIiMjRKXQXERERERERiWD6V+GNUb/dro1RRUREJHoK3UVERERERESqZeSW8u687by/YDuFpdoYVURERBpPobuIiIiIiIic9havy+TtuaksWJPR2qWIiIjISU6hu4iIiIiIiJyWCkurmLZoJ29rY1QRERFpRgrdRURERERE5LSyK6uYf8zYzCdL0rQxqoiIiDQ7he4iIiIiIiJyWliSkslrs7aweF1ma5ciIiIipzCF7iIiIiIiInJKm/rlDl6ZuZntGUWtXYqIiIicBhS6i4iIiIiIyCknr6iSt+el8tacbeQXV7Z2OSIiInIaUeguIiIiIiIip4zt6YW89vlWPli4vbVLERERkdOUQncRERERERE56Wleu4iIiJwoFLqLiIiIiIjISakqEOLTJbv4x2ebSMssbu1yRERERACF7iIiIiIiInKSqZnX/s/ZqRSUVLV2OSIiIiJ1KHQXERERERGRk8L29EJe/XwLHy7c0dqliIiIiDRIobuIiIiIiIic0L5aH57X/tV6zWsXERGRE59CdxERERERETnhaF67iIiInKwUuouIiIiIiMgJI6+okrfnbuOfc7ZqXruIiIiclBS6i4iIiIiISKvbll7Ia5rXLiIiIqcAhe4iIiIiIiLSapZtyOLlzzZrXruIiIicMhS6i4iIiIiIyHH3yZI0XvhkI9szilq7FBEREZFmpdBdREREREREjouyigDvLdjOqzO3sL+gvLXLEREREWkRCt1FRERERESkRWXnl/PmF1t5Z942SisCrV2OiIi0svZJMfz7dcO58aIBtEnwsWVPAa/O3MySlCwqqoKtXZ7IMTPWWtvaRYiIiIiIiMipJ3VvAa/M3MJHi3e2dikiInKC6JacwCM/OJ9LRvUELMYYrAVj4B8zNvHcRxsoV/AuJzl1uouIiIiIiEiz+npjeHPUxeu0OaqIiBzk9RjuuHIIF53dA8cYwGAM1HQE3z15GPsLKnjzi62tWabIMVPoLiIiIiIiIs1ixtJdvPDpJlL3FrR2KSIicgK6cGQP/mV8P7weA4S722v+ay3Exni4YUJ/Fq7JID2ntBUrFTk2Ct1FRERERESkycoqAnywcAevzNpMdp42RxURkchifA5jz+hCz05JmOoO90MZA1jDsL7tmXLJQJ7+cH2r1CnSHBS6i4iIiIiISKPtLyjnzS9SeXtuqjZHFRGRozr/zG7cetlgHOfI14vxeTj/zG4M67OHrXsLj09xIs1MobuIiIiIiIhEbXt6IS/P3My0RdocVUREohMf62XCWd1olxQTscu9Rk23+5hhnZk4qidpmcX4g+5xrVWkOSh0FxERERERkaNavimblz/bzKJv97V2KSIicpLp370Nt185tFG3ufGiAcxduZddWSUtVJVIy1HoLiIiIiIiIg367Ovd/H36Rm2OKiIiTfbLW84hPtZzxC73GjXd7oN6tuM7Fw3kLx+uOy41ijQnhe4i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" style="width:100%;height:140px;position:relative;top:0;left:0;">
                <div class="body" style="background-color:rgb(33,86,162);width:100%;height:calc(100% - 140px);">
                    <table>
                        <thead>
                        <tr>
                            <th colspan="5" style="text-align: center;"></th>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;text-align:center;font-size:0.7em;color:#FFF;">Hapvida</td>
                            <td colspan="2" class="head_com_coparticipacao">Com Coparticipação</td>
                            <td colspan="2" class="head_coparticipacao_parcial">Coparticipação Parcial</td>
                        </tr>
                        <tr>
                            <td style="font-size:0.7em;">Faixa Etaria</td>
                            <td class="header_fundo_azul">APART</td>
                            <td class="header_fundo_azul">ENFER</td>
                            <td class="header_fundo_laranja">APART</td>
                            <td class="header_fundo_laranja">ENFER</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>0 a 18</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>0</td>
                            <td>0</td>
                            <td style="color:rgb(255,89,33);">0</td>
                            <td style="color:rgb(255,89,33);">0</td>
                        </tr>
                        </tfoot>
                    </table>


                    <div>
                        <div class="linha01" style="font-size:0.7em;color:#FFF;width:95%;margin:0 auto;">Linha 01</div>
                        <div class="linha02" style="font-size:0.7em;color:#FFF;width:95%;margin:10px auto;">Linha 02</div>
                        <div class="linha03" style="font-size:0.7em;color:#FFF;width:95%;margin:0 auto;">Linha 03</div>
                    </div>


                    <div class="valores-carencias">


                        <h3 style="color: rgb(251,183,25);">Valores de Coparticipação:</h3>

                        <div class="valores-carencias-col1-cards">
                            <p class="valores-carencias-col1-param-1 copartipacao_titulo_01_resultado">-</p>
                            <p class="valores-carencias-col1-param-2 copartipacao_valor_01_resultado">-</p>
                        </div>

                        <div class="valores-carencias-col1-cards">
                            <p class="valores-carencias-col1-param-1 copartipacao_titulo_02_resultado">-</p>
                            <p class="valores-carencias-col1-param-2 copartipacao_valor_02_resultado">-</p>
                        </div>

                        <div class="valores-carencias-col1-cards">
                            <p class="valores-carencias-col1-param-1 copartipacao_titulo_03_resultado">-</p>
                            <p class="valores-carencias-col1-param-2 copartipacao_valor_03_resultado">-</p>
                        </div>

                        <div class="valores-carencias-col1-cards">
                            <p class="valores-carencias-col1-param-1 copartipacao_titulo_04_resultado">-</p>
                            <p class="valores-carencias-col1-param-2 copartipacao_valor_04_resultado">-</p>
                        </div>

                        <div class="valores-carencias-col1-cards">
                            <p class="valores-carencias-col1-param-1 copartipacao_titulo_05_resultado">-</p>
                            <p class="valores-carencias-col1-param-2 copartipacao_valor_05_resultado">-</p>
                        </div>



                    </div>


                </div>
            </div>
        </div>




    </div>

    <div class="w-[99.5%] h-[5%]">

        <form action="{{route('configurar.finalizar')}}" method="POST">
            @csrf
            <button type="submit" class="w-full block text-center rounded-lg justify-center py-1 text-white hover:cursor-pointer" style="background-color: #A78BFA;">
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


<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".planos_cad").on('click',function(){
            let plano_id = $(this).attr('data-id');
            $("#planos").val('');

            $("#plano_selecionado").val(plano_id);
            $.ajax({
                url:"{{route('configuracao.veriricar.valores')}}",
                method:"POST",
                data: {
                    plano_id
                },
                success:function(res) {
                    if(res != "nada") {
                        $("#linha01").val(res.observacao01);
                        $(".linha01").text(res.observacao01);

                        $("#linha02").val(res.observacao02);
                        $(".linha02").text(res.observacao02);

                        $("#linha03").val(res.observacao03);
                        $(".linha03").text(res.observacao03);

                        $("#coparticipacao_titulo_01").val(res.coparticipacao_titulo_01);
                        $("#coparticipacao_titulo_02").val(res.coparticipacao_titulo_02);
                        $("#coparticipacao_titulo_03").val(res.coparticipacao_titulo_03);
                        $("#coparticipacao_titulo_04").val(res.coparticipacao_titulo_04);
                        $("#coparticipacao_titulo_05").val(res.coparticipacao_titulo_05);
                        $("#coparticipacao_valor_01").val(res.coparticipacao_valor_01);
                        $("#coparticipacao_valor_02").val(res.coparticipacao_valor_02);
                        $("#coparticipacao_valor_03").val(res.coparticipacao_valor_03);
                        $("#coparticipacao_valor_04").val(res.coparticipacao_valor_04);
                        $("#coparticipacao_valor_05").val(res.coparticipacao_valor_05);
                        $(".copartipacao_titulo_01_resultado").text(res.coparticipacao_titulo_01);
                        $(".copartipacao_valor_01_resultado").html("R$ "+res.coparticipacao_valor_01);

                        $(".copartipacao_titulo_02_resultado").text(res.coparticipacao_titulo_02);
                        $(".copartipacao_valor_02_resultado").html("R$ "+res.coparticipacao_valor_02);

                        $(".copartipacao_titulo_03_resultado").text(res.coparticipacao_titulo_03);
                        $(".copartipacao_valor_03_resultado").html("R$ "+res.coparticipacao_valor_03);

                        $(".copartipacao_titulo_04_resultado").text(res.coparticipacao_titulo_04);
                        $(".copartipacao_valor_04_resultado").html("R$ "+res.coparticipacao_valor_04);


                        $(".copartipacao_titulo_05_resultado").text(res.coparticipacao_titulo_05);
                        $(".copartipacao_valor_05_resultado").html("R$ "+res.coparticipacao_valor_05);



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

        $("#planos").on('change',function(){
            let plano_id = $(this).val();
            $("#plano_selecionado").val(plano_id);
           $.ajax({
              url:"{{route('configuracao.veriricar.valores')}}",
              method:"POST",
              data: {
                  plano_id
              },
              success:function(res) {
                if(res != "nada") {
                    $("#linha01").val(res.observacao01);
                    $(".linha01").text(res.observacao01);

                    $("#linha02").val(res.observacao02);
                    $(".linha02").text(res.observacao02);

                    $("#linha03").val(res.observacao03);
                    $(".linha03").text(res.observacao03);

                    $("#coparticipacao_titulo_01").val(res.coparticipacao_titulo_01);
                    $("#coparticipacao_titulo_02").val(res.coparticipacao_titulo_02);
                    $("#coparticipacao_titulo_03").val(res.coparticipacao_titulo_03);
                    $("#coparticipacao_titulo_04").val(res.coparticipacao_titulo_04);
                    $("#coparticipacao_titulo_05").val(res.coparticipacao_titulo_05);
                    $("#coparticipacao_valor_01").val(res.coparticipacao_valor_01);
                    $("#coparticipacao_valor_02").val(res.coparticipacao_valor_02);
                    $("#coparticipacao_valor_03").val(res.coparticipacao_valor_03);
                    $("#coparticipacao_valor_04").val(res.coparticipacao_valor_04);
                    $("#coparticipacao_valor_05").val(res.coparticipacao_valor_05);
                    $(".copartipacao_titulo_01_resultado").text(res.coparticipacao_titulo_01);
                    $(".copartipacao_valor_01_resultado").html("R$ "+res.coparticipacao_valor_01);

                    $(".copartipacao_titulo_02_resultado").text(res.coparticipacao_titulo_02);
                    $(".copartipacao_valor_02_resultado").html("R$ "+res.coparticipacao_valor_02);

                    $(".copartipacao_titulo_03_resultado").text(res.coparticipacao_titulo_03);
                    $(".copartipacao_valor_03_resultado").html("R$ "+res.coparticipacao_valor_03);

                    $(".copartipacao_titulo_04_resultado").text(res.coparticipacao_titulo_04);
                    $(".copartipacao_valor_04_resultado").html("R$ "+res.coparticipacao_valor_04);


                    $(".copartipacao_titulo_05_resultado").text(res.coparticipacao_titulo_05);
                    $(".copartipacao_valor_05_resultado").html("R$ "+res.coparticipacao_valor_05);



                } else {

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


        $(".observacao").on('change',function(){
            if(verificar_plano() == false) {
                alert("Escolher um plano");
            }
            let campo = $(this).attr("id");
            let plano_id = verificar_plano();
            let valor = $(this).val();
            campo = campo == 'linha01' ? 'observacao01' : campo == 'linha02' ? 'observacao02' : 'observacao03';

            $.ajax({
               url:"{{route('configuracao.observacao')}}",
               method:"POST",
               data:{
                   campo,
                   plano_id,
                   valor
               }
            });
        });

        $(".coparticipacao_titulo").on('change',function(){
            if(verificar_plano() == false) {
                alert("Escolher um plano");
            }
            let campo = $(this).attr("id");
            let plano_id = verificar_plano();
            let valor = $(this).val();

            $.ajax({
                url:"{{route('configuracao.coparticipacao')}}",
                method:"POST",
                data:{
                    campo,
                    plano_id,
                    valor
                }
            });
        });

        $(".coparticipacao_valor").on('change',function(){
            if(verificar_plano() == false) {
                alert("Escolher um plano");
            }

            let campo = $(this).attr("id");
            let plano_id = verificar_plano();
            let valor = $(this).val();

            $.ajax({
                url:"{{route('configuracao.coparticipacao.valores')}}",
                method:"POST",
                data:{
                    campo,
                    plano_id,
                    valor
                }
            });

        });





        $('#coparticipacao_valor_01').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_02').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_03').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_04').mask('#.##0,00', {reverse: true});
        $('#coparticipacao_valor_05').mask('#.##0,00', {reverse: true});

        $("#linha01").keyup(function(){
           let valor = $(this).val();
           $(".linha01").text(valor);
        });

        $("#linha02").keyup(function(){
            let valor = $(this).val();
            $(".linha02").text(valor);
        });

        $("#linha03").keyup(function(){
            let valor = $(this).val();
            $(".linha03").text(valor);
        });

        $("#coparticipacao_titulo_01").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_titulo_01_resultado").text(valor);
        });


        $("#coparticipacao_valor_01").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_valor_01_resultado").text(valor);
        });

        $("#coparticipacao_titulo_02").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_titulo_02_resultado").text(valor);
        });

        $("#coparticipacao_valor_02").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_valor_02_resultado").text(valor);
        });

        $("#coparticipacao_titulo_03").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_titulo_03_resultado").text(valor);
        });

        $("#coparticipacao_valor_03").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_valor_03_resultado").text(valor);
        });

        $("#coparticipacao_titulo_04").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_titulo_04_resultado").text(valor);
        });

        $("#coparticipacao_valor_04").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_valor_04_resultado").text(valor);
        });

        $("#coparticipacao_titulo_05").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_titulo_05_resultado").text(valor);
        });

        $("#coparticipacao_valor_05").keyup(function(){
            let valor = $(this).val();
            $(".copartipacao_valor_05_resultado").text(valor);
        });

    });
</script>




</body>




</html>
