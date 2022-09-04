<!-- Stored in resources/views/post.blade.php -->
@extends('layouts.app')

@section('title', 'list')

{{-- @section('sidebar')
 @parent
@endsection --}}
{{-- @inject('post', 'App\Models\post')
@inject('user', 'App\Models\User') --}}
@section('content')

    
    <table>
        <tr>
            <th>ID</th>
            <th>author</th>
            <th>title</th>
            <th>body</th>
            <th>Actions</th>
        </tr>
    
    @foreach ($posts as $post)
        
        <tr>
            {{-- <td>{{($post->find($post['id'])->user)['name']}}</td> --}}
        <td>{{$post['id']}}</td>
        {{-- @if($post->user) --}}
        <td>{{$post->user->name}}</td>
        {{-- @else
        <td>not found</td>
        @endif --}}
        <td>{{ \Illuminate\Support\Str::limit($post['title'], 30, $end='...')}}</td>
        <td>{{\Illuminate\Support\Str::limit($post['body'], 80, $end='...')}}</td>
        <td>
            <a class="btn" href={{route('posts.view',['id'=>$post['id']])}}>view</a>
            {{-- @if($post->user->id==Auth::id()) --}}
            <a class="btn btn-primary" href={{route('posts.edit',['id'=>$post['id']])}}>edit</a>
            {{-- @endif --}}
            <form style="display:inline;" action="{{route('posts.destroy',['id'=>$post['id']])}}" method="POST">
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
