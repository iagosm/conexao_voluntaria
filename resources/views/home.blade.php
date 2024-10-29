<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Conexão Voluntária</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 4px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        header p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #d4edda; /* Cor mais clara ao passar o mouse */
        }
        main {
            padding: 20px;
            text-align: center;
            flex: 1;
        }
        .opportunities {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .opportunity-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 15px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .opportunity-card:hover {
            transform: scale(1.05);
        }
        .opportunity-card img {
            width: 100%;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #28a745;
            color: white;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Conexão Voluntária</h1>
        <p>Junte-se a nós na construção de um futuro melhor através do voluntariado!</p>
        <nav>
            <ul>
                <li><a href="{{ route('opportunities.index') }}">Oportunidades</a></li>
                <li><a href="{{ route('applications.index') }}">Inscrições</a></li>
                @if(Auth::check())
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Cadastro</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <main>
        <p>Verifique as ONGs disponíveis precisando de voluntários.</p>

        <div class="opportunities">
            @foreach($opportunities as $opportunity)
                <div class="opportunity-card">
                    <img src="{{ asset('images/' . $opportunity->cover_image) }}" alt="{{ $opportunity->title }}">
                    <h3>{{ $opportunity->title }}</h3>
                    <p>{{ Str::limit($opportunity->description, 100) }}</p>
                    <a href="{{ route('applications.create', ['opportunity_id' => $opportunity->id]) }}" class="btn btn-success">Inscrever-se</a>
                </div>
            @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Conexão Voluntária</p>
    </footer>
</body>
</html>
