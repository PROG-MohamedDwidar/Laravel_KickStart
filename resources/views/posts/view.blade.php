<!-- Stored in resources/views/create.blade.php -->

@extends('layouts.app')

@section('title', 'ceate')

{{-- @section('sidebar')
 @parent
@endsection --}}

@section('content')
    
    <img src="{{Storage::disk("public")->url($post->image)}}" alt="post has no image" width="200" height="300">
    <p>title: {{$post->title}}</p>
    <p>body: {{$post->body}}</p>
@endsection
