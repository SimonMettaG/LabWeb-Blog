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
                    <h1>Register Here</h1>
                </div>
                <form action="{{ route('auth.do-register') }}" method="POST">
                    @csrf
                    <h5 class="card-title">Username</h5>
                    <input type="text" class="form-control" id="" name="username">
                    <br>
                    <h5 class="card-title">Profile Picture (URL)</h5>
                    <input type="text" class="form-control" id="" name="img">
                    <br>
                    <h5 class="card-title">Password</h5>
                    <input type="password" class="form-control" id="" name="password">
                    <br>
                    <h5 class="card-title">Confirm Password</h5>
                    <input type="password" class="form-control" id="" name="password_confirmation">
                    <br>
                    <div class="text-center">
                        <input type="submit" value="Register" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
