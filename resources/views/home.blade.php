@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <img src={{asset('storage/' .auth()->user()->image)}} width="100" height="100" style="border-radius:50% ;" />
                    </div>

                    <div class="card-title">{{ __('Dashboard') }}</div>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Welcome {{ auth()->user()->name }}</h4>
         
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
