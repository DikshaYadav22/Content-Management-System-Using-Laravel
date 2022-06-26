@extends('layouts.app')
@section('content')

<div class="card">
  <div class="d-flex justify-content-between card-header ">
       <div><h4>Categories</h4></div> 
        <div><a class="btn btn-info" href={{route('categories.create')}}>Add categories</a></div>
  </div>
  <div class="card-body">
        <table class="table  table-striped">
            <thead class="table-dark" >
                <tr>
                    <th>Name</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
  </div>

   

</div>

@endsection