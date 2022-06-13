<x-layout title="Votar">
    <div class="page-header">
        <div class="card">
            <h2>{{ $survey->title }}</h2>

            @foreach ($options as $option)
                <form action="{{ route('surveys.vote', ['surveyId' => $survey->id, 'optionId' => $option->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">{{ $option->name }}</button>
                </form>
            @endforeach

        </div>
    </div>
    <div style="margin-top: 20px" class="page-header">
        <a class="btn btn-danger" href="{{ route('surveys.index') }}">Cancelar</a>
    </div>

</x-layout>    