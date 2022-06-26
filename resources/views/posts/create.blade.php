@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{isset($post)? 'Update Posts' : 'Add Posts'}}</h1>
        </div>
        <div class="card-body">
        <form action={{isset($post)?route('posts.update', $post->id):route('posts.store')}} 
        METHOD="POST" enctype="multipart/form-data" >
        @csrf
        @if(isset($post))
            @METHOD('PUT')
        @endif
    <div class="mb-3">
        <label for="name" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title"
            value="{{isset($post)? $post->title : ''}}"
        />
        @if(isset($post))
            <img src="{{asset('storage/'.$post->image)}}"  width="200" height="100"/>
        @endif
    
        <label for="image" class="form-label">Upload an Image</label>
        <input type="file" name="image" class="form-control" id="image"
        />

        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" id="description"
            value="{{isset($post)? $post->description : ''}}"
        />

        <label for="content" class="form-label">Content</label>
        <input type="hidden" id="content" name="content" value="{{isset($post)? $post->content : ''}}" />
        <trix-editor input="content"></trix-editor>

        <label for="category_id" class="form-label">Category</label>
        <select name="category_id" id="category_id" class="form-label">
            @foreach($categories as $category)
                <option value={{$category->id}} class="form-label">{{ $category->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="published" class="form-label">Published_At</label>
        <input type="date" name="published_At" class="form-control" id="published"
        />

    </div>
    
    <button type="submit" class="btn btn-primary">{{ isset($post)?'Update':'Add' }}</button>
    </form>
        </div>
    </div>
    
  

@endsection