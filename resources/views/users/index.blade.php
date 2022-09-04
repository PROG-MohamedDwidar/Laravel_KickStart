<!-- Stored in resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'list')

{{-- @section('sidebar')
 @parent
@endsection --}}
@inject('user', 'App\Models\User')
@section('content')

    
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Email</th>
            <th>N.O.P</th>
            <th>Actions</th>
        </tr>
    
    @foreach ($users as $index)
        
        <tr>
        
        <td>{{$index['id']}}</td>
        <td>{{$index['name']}}</td>
        <td>{{$index['email']}}</td>
        <td>{{$index['posts_count']}}</td>
        {{-- <td>{{count($user->find($index['id'])->posts)}}</td> --}}
        <td>
            
            <a class="btn btn-primary" href={{route('users.edit',['id'=>$index['id']])}}>edit</a>
            <a class="btn btn-secondary" href={{route('users.details',['id'=>$index['id']])}}>details</a>
            <form style="display:inline;" action="{{route('users.destroy',['id'=>$index['id']])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" style="display:inline;">delete</a>
            </form>
            </td>
        </tr>
    @endforeach
    </table>
    <span>{{$users->links('pagination::bootstrap-4')}}</span>
    
@endsection
