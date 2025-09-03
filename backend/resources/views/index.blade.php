<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('style/index.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/calendar.png') }}">
    <title>Site de Reuniões</title>
</head>

<body>

    <h1 id="titulo-1">Bem vindo ao site de Reuniões</h1>

    <div class="box-texto">
        <h2>Este site tem como intuito, administrar suas reuniões de forma prática e fácil.</h2>
    </div>

    <h1 class="titulo-paragrafo">O que vamos encontrar dentro deste site?</h1>
    
    <div class="conteudo-ameacas">
        <div class="conteudo-box">
            <img src="{{ asset('img/partners.png') }}" alt="Imagem de organização das reuniões" height="40" width="40">
            <p>Pratica organização das reuniões</p>
        </div>
        <div class="conteudo-box">
            <img src="{{ asset('img/video-conference.png') }}" alt="imagem de participante em uma reunião" height="40" width="40">
            <p>Listagem de dos participantes com seus dados empresariais </p>
        </div>
        <div class="conteudo-box">
            <img src="{{ asset('img/send.png') }}" alt="imagem de envio" height="40" width="40">
            <p>Envio de reuniões via whatsapp</p>
        </div>
    </div>

    <div class="box-links">
        <a id="botao-cadastrar" href="{{ url('/cadastrar') }}">Cadastre-se</a>
        <a id="botao-login" href="{{ url('/login') }}">Login</a>
        <form action="{{ url('visitante') }}" method="post">
            @csrf
            <button id="botao-visitante" type="submit">Entrar como visitante</button>
        </form>
        <form action="{{ url('participante_sem_login') }}" method="post">
            @csrf
            <button id="botao-visitante" type="submit">Participante</button>
        </form>
    </div>

</body>

</html>
