<x-layout title="Enquetes">
    <div class="page-header">
        <h1>Enquetes</h1>
    </div>

    <div class="action-buttons">
        <a href="{{ route('surveys.create') }}" class="btn btn-primary">Nova enquete</a>
    </div>

    <div class="surveys-table">
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
                        <a class="btn btn-primary" href="{{ route('options.show', $survey->id) }}">Votar</a>
                        <a class="btn btn-warning" href="{{ route('surveys.edit', $survey->id) }}">Editar</a>
                        <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

<script src="{{ asset('js/surveys/index.js')}}"></script>