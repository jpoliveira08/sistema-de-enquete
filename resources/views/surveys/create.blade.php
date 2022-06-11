<x-layout title="Nova Enquete">
    <div class="page-header">
        <h1>Nova enquete</h1>
    </div>
    <form action="" method="POST">
        <div class="form-box">
            <label for="">Teste</label>
            <input type="text">
        </div>
        <div class="form-box">
            <label for="">Teste</label>
            <input type="text">
        </div>
        <div class="form-box-buttons">
            <a href="{{ route('surveys.index') }}" class="btn btn-danger">Cancelar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
        </div>
    </form>
</x-layout>
<script src="{{ asset('js/surveys/create.js')}}"></script>