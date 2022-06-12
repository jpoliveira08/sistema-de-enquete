<x-layout title="Nova Enquete">
    <div class="page-header">
        <h1>Nova enquete</h1>
    </div>
    
    <form action="{{ route('surveys.store') }}" method="POST">
        @csrf
        <div class="form-box">
            <label for="title">Título</label>
            <input type="text" name="header[title]" placeholder="Título da enquete"
                @if ($errors->has('header.title'))
                    class="error-input-border"
                @endif>
        </div>
        @error('header.title')
            <div class="form-box error-message">
                {{ $message }}
            </div>
        @enderror

        <div class="form-box">
            <label for="begins_in">Inicia em</label>
            <input type="date" name="header[begins_in]" placeholder="Data de início"
                @if ($errors->has('header.begins_in'))
                    class="error-input-border"
                @endif>
        </div>
        @error('header.begins_in')
            <div class="form-box error-message">
                {{ $message }}
            </div>
        @enderror

        <div class="form-box">
            <label for="expires_in">Termina em</label>
            <input type="date" name="header[expires_in]" placeholder="Data final"
                @if ($errors->has('header.expires_in'))
                    class="error-input-border"
                @endif>
        </div>
        @error('header.expires_in')
            <div class="form-box error-message">
                {{ $message }}
            </div>
        @enderror

        <div id="form-box-options">
            <div class="form-box">
                <label for="options[][name]">Opção 1</label>
                <input type="text" name="options[][name]" placeholder="Opção 1">
            </div>
            
            <div class="form-box">
                <label for="options[][name]">Opção 2</label>
                <input type="text" name="options[][name]" placeholder="Opção 2">
            </div>
            
            <div class="form-box">
                <label for="options[][name]">Opção 3</label>
                <input type="text" name="options[][name]" placeholder="Opção 3">
            </div>
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
<script src="{{ asset('js/surveys/create.js')}}"></script>