@extends('layout')
@section('title')
  <title>Home</title>
@endsection
@section('content')
    <img src="img/app.png" weight=700px height=400px alt="">
    <br>
    <a href="{{ url('/blog') }}">Blog</a>
    <a href="{{ url('/contact-us') }}">Contactez-nous!</a>
    <a href="{{ url('/login') }}">Se connecter</a>
@endsection
