<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <header>
      <div class="logo">
        KOLIG
      </div>
      <div class="title">
        Défendez votre clan!
      </div>
      <div class="description">
        Créer un nouveau groupe d'amis et commencer des maintenant à parier!
      </div>
    </header>
    @yield('content')
  </body>
</html>
