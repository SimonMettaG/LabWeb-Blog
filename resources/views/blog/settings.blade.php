@extends('layouts.main')

@section('content')
<div class="container" style="width: 50%; text-align: center">
    <form action="{{ route('settings.username') }}" method="POST">
        @csrf
        <div class="row align-items-center">
            <div class="col" style="text-align: left">
                <h4>Username: </h4>
            </div>
            <div class="col">
                <input type="text" name="username" value="{{ auth()->user()->username }}">
            </div>
            <div class="col" style="text-align: right">
                <button class="btn btn-info">Change</button>
            </div>
        </div>
    </form>
</div>
<hr style="margin-left: 25%; margin-right: 25%; height: 5px;">
<div class="container" style="width: 50%; text-align: center">
    <form action="{{ route('settings.img') }}" method="POST">
        @csrf
        <div class="row align-items-center">
            <div class="col" style="text-align: left">
                <h4>Icon: </h4>
                <img src="{{ auth()->user()->img }}" height="50" width="50" style="border: 1px black solid">
            </div>
            <div class="col">
                <input type="text" name="img" placeholder="URL">
            </div>
            <div class="col" style="text-align: right">
                <button class="btn btn-info">Change</button>
            </div>
        </div>
    </form>
</div>
<hr style="margin-left: 25%; margin-right: 25%; height: 5px;">
<div class="container" style="width: 50%; text-align: center">
    <form action="{{ route('settings.password') }}" method="POST">
        @csrf
        <div class="row align-items-center">
            <div class="col" style="text-align: left">
                <h4>Password: </h4>
            </div>
            <div class="col">
                <input type="password" name="password">
            </div>
            <div class="col"></div>
        </div>
        <div class="row align-items-center">
            <div class="col" style="text-align: left">
                <h4>Confirm: </h4>
            </div>
            <div class="col">
                <input type="password" name="password_confirmation">
            </div>
            <div class="col" style="text-align: right">
                <button class="btn btn-info">Change</button>
            </div>
        </div>
    </form>
</div>
<hr style="margin-left: 25%; margin-right: 25%; height: 5px;">
<div class="container" style="width: 50%; text-align: center">
    <form action="{{ route('settings.delete-user') }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete Account</button>
    </form>
</div>
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
</div>
@endsection
