@extends('layouts.main')

@section('content')
    <div class="container" style="width: 50%">
        @foreach ($users as $user)
            <div class="row align-items-center">
                <div class="col-1">
                    <a href="../user/{{ $user->username }}">
                        <img src="{{ $user->img }}" style="border: 5px black solid; border-radius: 5px" height="50" width="50">
                    </a>
                </div>
                <div class="col" style="text-align: left">
                    <h5>{{ $user->username }}</h5>
                </div>
                <div class="col"></div>
                <div class="col-1" style="text-align: right">
                    <form action="{{ route('user.show') }}" method="GET">
                        @csrf
                        <button class="btn btn-primary" name="user" value="{{ $user->username }}" type="submit">View</button>
                    </form>
                </div>
                <div class="col-1" style="text-align: right">
                    <form action="{{ route('user.follow') }}" method="POST">
                        @csrf
                        @if ($user->following)
                            <button class="btn btn-danger" value="{{ $user->id }}" name="user_id">Unfollow</button>
                        @else
                            <button class="btn btn-success" value="{{ $user->id }}" name="user_id">Follow</button>
                        @endif
                    </form>
                </div>
            </div>
            <hr style="border: 2px grey solid; margin-left: 10%; margin-right: 10%">
        @endforeach
    </div>
@endsection
