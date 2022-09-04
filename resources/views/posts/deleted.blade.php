<!-- Stored in resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'list')

{{-- @section('sidebar')
 @parent
@endsection --}}

@section('content')

    
    <table>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>body</th>
            <th>Actions</th>
        </tr>
    
    @foreach ($posts as $index)
        
        <tr>
        
        <td>{{$index['id']}}</td>
        <td>{{ \Illuminate\Support\Str::limit($index['title'], 30, $end='...')}}</td>
        <td>{{\Illuminate\Support\Str::limit($index['body'], 80, $end='...')}}</td>
        <td>
            
            {{-- <a class="btn btn-primary" href={{route('posts.restore4real',['id'=>$index['id']])}}>restore</a> --}}
            
            <form style="display:inline;" action="{{route('posts.restore4real',['id'=>$index['id']])}}" method="POST">
            @method('PUT')
            @csrf
            {{-- <input hidden type="text" name="title" value="{{$index['title']}}">
            <input hidden type="text" name="body" value="{{$index['body']}}"> --}}
            <button type="submit" class="btn btn-warning" style="display:inline;">restore</a>
            </form>
            </td>
        </tr>
    @endforeach
    </table>
    <span>{{$posts->links('pagination::bootstrap-4')}}</span>
    
@endsection
