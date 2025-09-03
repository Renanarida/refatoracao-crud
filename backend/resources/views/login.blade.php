{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style/login.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/calendar.png') }}">
</head>
<body id="box-body" class="d-flex justify-content-center align-items-center vh-100">
    <div id="box-caixa" class="card p-4" style="width: 350px;">
        <h3 class="mb-3">Login</h3>

        <img class="img-login" src="{{ asset('img/Reuniao-email.png') }}" alt="Foto Reunião">

        @if(session('erro'))
            <div class="alert alert-danger">{{ session('erro') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" required class="form-control" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" required class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

        <div class="mt-3 text-center">
            Esqueceu a senha? <a id="link-senha" href="{{ route('password.email') }}">Clique aqui</a>
        </div>

        <div class="mt-3 text-center">
            Ainda não tem conta? <a id="link-cadastrar" href="{{ route('cadastrar') }}">Cadastre-se aqui</a>
        </div>
    </div>
</body>
</html>
