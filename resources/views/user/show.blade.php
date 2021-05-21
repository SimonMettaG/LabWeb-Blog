@extends('layouts.main')

@section('content')
<div class="container" style="text-align: center; width: 40%">
    <div class="row align-items-center">
        <div class="col">
            <img src="{{ $user->img }}" height="100", width="100">
            <h3>{{ $user->username }}</h3>
        </div>
        @if ($user->username != auth()->user()->username)
            <div class="col">
                <form action="{{ route('user.follow') }}" method="POST">
                    @csrf
                    @if ($following)
                        <button class="btn btn-danger" value="{{ $user->id }}" name="user_id">Unfollow</button>
                    @else
                        <button class="btn btn-success" value="{{ $user->id }}" name="user_id">Follow</button>
                    @endif
                </form>
            </div>
        @endif
    </div>
</div>
<hr style="height: 5px; margin-left: 50px; margin-right: 50px; color: darkblue">
<div class="container">
    @foreach ($blogs as $blog)
        <div class="row align-items-center">
            <div class="col" style="text-align: left; border-right: 1px solid grey">
                <p>{{ $blog->entry }}</p>
            </div>
            <div class="col-1" style="text-align: right">
                <p>{{ $blog->time }}</p>
            </div>
        </div>
        <hr style="height: 5px; margin-left: 25%; margin-right: 25%">
    @endforeach
</div>
@endsection
