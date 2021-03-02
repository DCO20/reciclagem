<html>
    <head>
        <title> Relatório Reciclagem</title>
    </head>
<body>
    <table style="width: 100%"; border="1">
        <thead>
            <tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>Material</th>
                <th>Quantidade (kilos)</th>
                <th>Total de pontos</th>
                <th>Total a receber</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($entry->created_at))}}</td>
                    <td>{{ $entry->client->name }}</td>
                    <td>{{ $entry->material->name }}</td>
                    <td>{{ $entry->qntd}}</td>
                    <td>{{ $entry->total_points}}</td>
                    <td>R$ {{ number_format($entry->total_receive, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>