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
    @if($users != "")
        @foreach($users as $ll)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
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
