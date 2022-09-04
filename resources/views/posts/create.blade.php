<!-- Stored in resources/views/create.blade.php -->
@extends('layouts.app')

@section('title', 'ceate')

{{-- @section('sidebar')
 @parent
@endsection --}}

@section('content')
 
    <form style="display: inline" action="{{route('posts.store')}}" enctype="multipart/form-data" method="POST">
    @method('POST')
    @csrf
    <br><br>
    <p>title</p>  
    <input type="text" name="title">
    <br><br>
    <p>body</p>
    <textarea name="body"></textarea>
    {{-- <input type="text" > --}}
    <br><br>
    image
    <input type="file" id="image" name="image">
    {{-- password
    <input type="password" name="pass"> --}}
    <br><br>
    <input  class="btn btn-warning" type="submit" value="submit">
    </form>
    <a style="display: inline" class="btn btn-danger" href={{route('posts.index')}}>cancel</a>
@endsection
