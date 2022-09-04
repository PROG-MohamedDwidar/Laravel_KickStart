<!-- Stored in resources/views/create.blade.php -->
@extends('layouts.app')

@section('title', 'ceate')

{{-- @section('sidebar')
 @parent
@endsection --}}

@section('content')
 
    <form action="{{route('users.store')}}" method="POST">
    @method('POST')
    @csrf
    name
    <input type="text" name="name">
    email
    <input type="email" name="email">
    password
    <input type="password" name="pass">

    <input type="submit" value="submit">
    </form>
    <a style="display: inline" class="btn btn-danger" href={{route('users.index')}}>cancel</a>
@endsection
