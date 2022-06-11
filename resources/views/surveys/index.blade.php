<x-layout title="Enquetes">

    <div class="container center">
        <h1>Enquetes</h1>
    </div>

    <div class="container space-around">
        <a href="" class="btn btn-primary">Nova enquete</a>

        <a href="" class="btn btn-info">Filtrar</a>
    </div>
    
    <div class="container column">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Inicia em</th>
                    <th>Expira em</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surveys as $survey)
                <tr>
                    <td class="column-title">{{ $survey->title }}</td>
                    <td>{{ $survey->begins_in }}</td>
                    <td>{{ $survey->expires_in }}</td>
                    <td>
                        <a class="btn btn-warning" href="">Editar</a>
                        <a class="btn btn-danger" href="">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>