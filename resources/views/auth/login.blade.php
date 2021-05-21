@extends('layouts.main')

@section('content')
<br>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
	@endif

    <div class="container align-middle" style="width: 35%; margin-top: 50px;">
        <div class="card border border-dark">
            <div class="card-body">
                <div class="text-center">
                    <h1>Sign In</h1>
                </div>
                <form action="{{ route('auth.do-login') }}" method="POST">
                    @csrf
                    <h5 class="card-title">Username</h5>
                    <input type="text" class="form-control" id="" name="username">
                    <br>
                    <h5 class="card-title">Password</h5>
                    <input type="password" class="form-control" id="" name="password">
                    <br>
                    <div class="text-center">
                        <input type="submit" value="Sign In" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container" style="width: 35%;">
        <div class="card  border-dark">
            <div class="card-body">
                <div class="text-center">
                    <form action="{{ route('auth.register') }}">
                        @csrf
                        <h5 class="card-title">Don't have an account? Register.</h5>
                        <input type="submit" value="Register" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
