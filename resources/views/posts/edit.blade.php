<!-- Stored in resources/views/update.blade.php -->
@extends('layouts.app')

@section('title', 'ceate')

{{-- @section('sidebar')
 @parent
@endsection --}}

@section('content')
{{-- /posts/{{$id}} --}}
 <form action="{{route('posts.update',['id'=>$post['id']])}}" method="POST" style="display: inline">
    @method('PUT')
    @csrf
    title
    <input name="title" type="text" value="{{$post['title']}}">
    email
    {{-- <input name="email" type="email" value="{{$post['body']}}"> --}}
    <textarea rows="4" cols="50"  name="body">{{$post['body']}}</textarea>
    <input class="btn btn-primary" style="display: inline" type="submit" value="save">
</form>
<a style="display: inline" class="btn btn-danger" href={{route('posts.index')}}>cancel</a>
@endsection
