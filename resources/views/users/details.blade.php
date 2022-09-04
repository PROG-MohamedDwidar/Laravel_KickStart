<!-- Stored in resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'details')

{{-- @section('sidebar')
 @parent
@endsection --}}
{{-- @inject('user', 'App\Models\User') --}}
@section('content')
    <p>name: {{$user['name']}}</p>
    <p>email: {{$user['email']}}</p>
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
        {{-- <td>{{count($user->find($index['id'])->posts)}}</td> --}}
        <td>
            
            <a class="btn btn-primary" href={{route('posts.edit',['id'=>$index['id']])}}>edit</a>
            {{-- <a class="btn btn-secondary" href={{route('users.details',['id'=>$index['id']])}}>details</a> --}}
            <form style="display:inline;" action="{{route('posts.destroy',['id'=>$index['id']])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" style="display:inline;">delete</a>
            </form>
            </td>
        </tr>
    @endforeach
    </table>
    <span>{{$posts->links('pagination::bootstrap-4')}}</span>
    
@endsection
