
    <button  class="py-2.5 w-full px-5 me-2 mb-2 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 focus:ring-0 focus:ring-gray-200 dark:focus:ring-gray-700 bg-gray-500 bg-opacity-10 dark:hover:text-gray-900">
        Planos
    </button>

    @foreach($planos as $p)
        <div style="width:100%;" class="py-2.5 w-full px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 focus:z-10 bg-gray-500 bg-opacity-10 dark:hover:text-gray-900">
            <label class="flex justify-between items-center">
                <div class="flex w-[50%]">
                    <input id="radio_planos_{{$p->id}}" type="radio" value="{{$p->id}}" name="planos-radio" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <span for="radio_planos_{{$p->id}}" class="ms-2 text-white flex justify-between text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{$p->nome}}
                    </span>
                </div>
                <div class="flex w-[50%] justify-end">
                    <img src="{{asset($p->logo)}}" style="width:100px;padding:5px;background-color:white;max-height:44px;height:44px;border-radius:5px;">

                </div>
            </label>
        </div>
    @endforeach

