<x-layout title="Votar">
    <div class="page-header">
        <div class="card">
            <h2>Resultado</h2>
            <table>
                <thead>
                    <tr>
                        <th>Opção</th>
                        <th>Votos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($options as $option)
                        <tr>
                            <td>
                                {{$option->name}}
                            </td>
                            <td>
                                {{$option->amount_of_votes}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-box-buttons">
                <a class="btn btn-primary" href="{{ route('surveys.index') }}">Início</a>
                <a class="btn btn-warning" href="{{ route('options.show', $survey->id) }}">Votar novamente</a>
            </div>
        </div>
    </div>

</x-layout>    