<html>

<head>
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="grey lighten-4" >
    <nav>
        <div class="nav-wrapper blue darken-4 white-text">
            <a href="#!" class="brand-logo" style="margin-left: 20px;">Projeto Cursos</a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('admin.cursos') }}">Cursos</a></li>
    </ul>