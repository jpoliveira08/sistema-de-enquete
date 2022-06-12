<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/surveys/index.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/surveys/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/surveys/table.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/surveys/form.css') }}" rel="stylesheet"> 
    <title>{{ $title }}</title>
</head>
<body>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
