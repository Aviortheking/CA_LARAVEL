@extends('layout')
@section('title')
  <title>Blog</title>
@endsection
@section('content')


<h1 style="color:black"> Nos articles : </h1>
@foreach ($posts as $post)
    <div style="color:black; background-color: white; width:300px; height:40px;margin:auto">
    <h2>{{ $post->title }}</h2>
    <!-- <p>sdq</p> -->
</div>

@endforeach


@endsection
