<!-- Stored in resources/views/update.blade.php -->
@extends('layouts.app')

@section('title', 'ceate')

{{-- @section('sidebar')
 @parent
@endsection --}}

@section('content')
{{-- /users/{{$id}} --}}
 <form action="{{route('users.update',['id'=>$id])}}" method="POST" style="display: inline">
    @method('PUT')
    @csrf
    name
    <input name="name" type="text" value="{{$name}}">
    email
    <input name="email" type="email" value="{{$email}}">
    <input class="btn btn-primary" style="display: inline" type="submit" value="save">
</form>
<a style="display: inline" class="btn btn-danger" href={{route('users.index')}}>cancel</a>
@endsection
