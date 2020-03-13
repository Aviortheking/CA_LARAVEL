@extends('layout')
@section('title')
  <title>{{$post->title}}</title>
@endsection
@section('content')
<h2 style="color:black; margin-top:100px">{{$post->title}}</h2>
<p style="color:black; width:80%; margin:auto; font-size:20px;">{{$post->content}} </p>
<a href="{{ url('/blog') }}">Liste des articles</a>
@endsection
