<x-layout title="Editando enquete">
    <div class="page-header">
        <h1>Editando enquete {{ $survey->id }}</h1>
    </div>

    <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-box">
            <label for="title">Título</label>
            <input type="text" name="header[title]" placeholder="Título da enquete"
                value="{{ old('header[title]', $survey->title) }}"
                @if ($errors->has('header.title'))
                    class="error-input-border"
                @endif>
        </div>
        @error('header.title')
            <div class="form-box error-message">
                {{ $message }}
            </div>
        @enderror

        <input type="hidden" name="header[begins_in]" placeholder="Data de início"
        value="{{ old('header[begins_in]', $survey->begins_in) }}"
            @if ($errors->has('header.begins_in'))
                class="error-input-border"
            @endif>
        @error('header.begins_in')
            <div class="form-box error-message">
                {{ $message }}
            </div>
        @enderror

        <input type="hidden" name="header[expires_in]" placeholder="Data final"
        value="{{ old('header[expires_in]', $survey->expires_in) }}"
            @if ($errors->has('header.expires_in'))
                class="error-input-border"
            @endif>
        @error('header.expires_in')
            <div class="form-box error-message">
                {{ $message }}
            </div>
        @enderror

        <div id="form-box-options">
            @for ($i = 0; $i < count($options); $i++)
                <div class="form-box">
                    <label for="options[][name]">Opção {{ $i + 1 }}</label>
                    <input type="text" name="options[][name]" placeholder="Opção {{ $i + 1 }}"
                        value="{{ old('options[][name]', $options[$i]->name) }}">
                </div>
            @endfor
        </div>
        @error('options.*')
            <div class="form-box error-message">
                {{ $message }}
                <br />
                A enquete deve possuir no mínimo 3 opções.
            </div>
        @enderror

        <div class="form-box-buttons">
            <button class="btn btn-primary" onclick="addNewOptionToTheSurvey()" type="button">Nova opção</button>
            <div>
                <a href="{{ route('surveys.index') }}" class="btn btn-danger">Cancelar</a>
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>
        </div>
    </form>
</x-layout>
<script src="{{ asset('js/surveys/form.js')}}"></script>