<x-layout title="Votar">
    <div class="page-header">
        <div class="card">
            <h2>{{ $survey->title }}</h2>

            @foreach ($options as $option)
                <button type="submit" value="{{ $option->id }}" class="btn btn-success">
                    {{ $option->name }}
                </button>
            @endforeach

        </div>
    </div>
    <div style="margin-top: 20px" class="page-header">
        <a class="btn btn-danger" href="{{ route('surveys.index') }}">Cancelar</a>
    </div>

</x-layout>    