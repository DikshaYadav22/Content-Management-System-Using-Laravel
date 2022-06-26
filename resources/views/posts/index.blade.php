@extends('layouts.app')
@section('content')

<div class="card">
    @if(session()->has('success'))
        <div class="alert alert-primary">
            {{ session()->get('success') }}
        </div>
    @endif
  <div class="d-flex justify-content-between card-header ">

       <div><h4>Posts</h4></div> 
        <div><a class="btn btn-info" href={{route('posts.create')}}>Add Posts</a></div>
  </div>
  <div class="card-body">
        <table class="table  table-striped">
            <thead class="table-dark" >
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Categories Count</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td><img src={{asset('storage/' .$post->image) }} alt="Post-image" width="250" height="150"></td>
                        <td>{!! $post->content !!}</td>
                        <td>{{ $post->category()->count() }}</td>
                        <td><a href={{route('posts.edit', $post->id)}} class="btn btn-primary">Edit</a></td>
                        <td>    
                            <form action={{route('posts.destroy', $post->id)}} method="POST">
                                @csrf
                                @if(isset($post))
                                    @METHOD('DELETE')
                                @endif
                                <button class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  </div>

   

</div>

@endsection