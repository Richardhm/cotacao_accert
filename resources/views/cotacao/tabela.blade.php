<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead>
        <tr>
            <th>Faixa Etária</th>
            <th>Apartamento</th>
            <th>Enfermaria</th>
            <th>Ambulatorial</th>
        </tr>
    </thead>
    <tbody>
        @php
            $dadosAgrupados = [];
        @endphp

        @foreach ($dados as $dado)
            @php
                $faixaEtaria = $dado['faixa_etaria_id'];
                $acomodacao = $dado['acomodacao_id'];
                $valor = $dado['valor'];

                if (!isset($dadosAgrupados[$faixaEtaria])) {
                    $dadosAgrupados[$faixaEtaria] = [
                        'faixa_etaria_id' => $faixaEtaria,
                        'apartamento' => null,
                        'enfermaria' => null,
                        'ambulatorial' => null,
                    ];
                }

                $dadosAgrupados[$faixaEtaria][$acomodacao] = $valor;
            @endphp
        @endforeach

        @foreach ($dadosAgrupados as $linha)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">{{ $linha['faixa_etaria_id'] }}</td>
                <td class="px-6 py-4">{{ $linha[1] ?? '' }}</td>
                <td class="px-6 py-4">{{ $linha[2] ?? '' }}</td>
                <td class="px-6 py-4">{{ $linha[3] ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
