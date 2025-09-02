<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/calendar.png') }}">
    <link rel="stylesheet" href="{{ asset('style/cadastrar.css') }}" />
</head>
<body id="body-box" class="d-flex justify-content-center align-items-center vh-100">
    <div id="box-cadastro" class="card p-4" style="width: 350px;">
        <h3 class="mb-3">Cadastro</h3>

        <img class="img-login" src="{{ asset('img/Reuniao-email.png') }}" alt="Foto Reunião">

        @if (isset($erro))
            <div class="alert alert-danger">{{ $erro }}</div>
        @endif

        <form method="POST" action="{{ route('cadastrar') }}" novalidate>
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" required class="form-control" value="{{ old('nome') }}" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" required class="form-control" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" required class="form-control" />
            </div>
            <div class="mb-3">
                <label for="senha_confirm" class="form-label">Confirme a Senha</label>
                <input type="password" id="senha_confirm" name="senha_confirm" required class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </form>

        <div class="mt-3 text-center">
            Já tem conta? <a id="link-login" href="{{ route('login') }}">Faça login</a>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
