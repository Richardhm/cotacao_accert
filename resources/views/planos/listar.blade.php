@foreach($planos as $p)
    <label class="justify-between border rounded mt-1 me-1 ml-1 flex w-[100%] items-center py-0.5">
        <div class="w-[50%] flex ml-4">
            <input type="radio" name="planos" id="planos_{{$p->id}}" value="{{$p->id}}" class="w-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 focus:ring-2 dark:focus:ring-purple-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
            <span class="text-white text-xs ml-1">{{$p->nome}}</span>
        </div>
        <div class="flex w-[50%] justify-end mr-3">
            <img src="{{asset($p->logo)}}" alt="Opção 1" class="image_plano p-1 w-full bg-white" style="width:100px;background-color:white;max-height:32px;border-radius:5px;height:32px;">
        </div>

    </label>
@endforeach
