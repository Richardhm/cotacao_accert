<div class="mt-2 hidden rounded p-1 mr-3 bg-purple-400" style="width:22%;" id="container_informacoes">
    <button class="py-1.5 w-full px-1 me-2 mb-2 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 bg-gray-500 bg-opacity-10">
        Operadoras
    </button>
    <form>
        <div class="w-full flex">
            <div class="w-2/5">
                <select name="estados" id="estados" class="py-1 bg-gray-50 bg-opacity-10 text-xs w-full px-1 me-2 mb-2 text-sm font-medium text-white rounded-lg border border-gray-200 bg-opacity-20">
                    <option value="1" class="">Goias</option>
                </select>
            </div>

            <div class="ml-1 w-7/12">
                <select id="cidade" class="py-1 hover:bg-purple-900 bg-gray-50 bg-opacity-10 w-full text-xs px-1 me-2 mb-2 text-sm font-medium text-white rounded-lg border border-gray-200">
                    <option value="" class="text-center text-lg">Tabela de Origem</option>
                    @foreach($cidades as $cc)
                        <option value="{{$cc->id}}" class="">{{$cc->nome}}</option>
                    @endforeach
                </select>
            </div>

        </div>

    </form>
    <div class="flex flex-wrap justify-around" id="faixa_etarias">
        <div class="flex flex-col w-[33%]">
            <div class="mb-2 w-full">

                <span class="text-white text-sm">0 - 18</span>

                <div class="flex items-center align-center text-center">

                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input name="input_0_18" style="width:33%;" id="input_0_18" type="text" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow plus_0_18">+</button>
                    </div>
                </div>


            </div>

            <div class="mb-2">
                <span class="text-white text-sm">24 - 28</span>

                <div class="flex items-center align-center text-center">

                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input name="input_24_28" style="width:33%;" id="input_24_28" type="text" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">34 - 38</span>
                <div class="flex items-center">
                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" name="input_34_38" style="width:33%;" id="input_34_38" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">44 - 48</span>
                <div class="flex items-center">
                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" style="width:33%;" name="input_44_48" id="input_44_48" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">54 - 58</span>
                <div class="flex items-center">
                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" style="width:33%;" name="input_54_58" id="input_54_58" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col w-[33%]">

            <div class="mb-2">
                <span class="text-white text-sm">19 - 23</span>
                <div class="flex items-center">

                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" style="width:33%;" name="input_19_23" id="input_19_23" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">29 - 33</span>
                <div class="flex items-center">

                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" name="input_29_33" style="width:33%;" id="input_29_33" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">39 - 43</span>
                <div class="flex items-center">
                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" style="width:33%;" name="input_39_43" id="input_39_43" value="0" class="flex w-28 text-xs text-center flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">49 - 53</span>
                <div class="flex items-center">
                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" name="input_49_53" id="input_49_53" value="0" class="flex w-28 text-center text-xs flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input" style="width:33%;">
                        <button style="width:33%;" class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-white text-sm">Acima 59+</span>
                <div class="flex items-center w-full">
                    <div class="flex rounded overflow-hidden border border-gray-200 align-center text-center mx-auto faixa-etaria-buttons h-8">
                        <button class="bg-red-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">-</button>
                        <input type="text" name="input_59" id="input_59" value="0" class="flex w-28 text-center text-xs flex-grow border-none bg-opacity-20 bg-gray-300 text-white faixa-etaria-input" style="width:33%;">
                        <button class="bg-green-400 text-gray-500 minus w-10 text-white flex-grow" style="width:33%;">+</button>
                    </div>
                </div>
            </div>


        </div>




    </div>

</div>
