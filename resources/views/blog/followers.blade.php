@extends('layouts.main')

@section('content')
<div class="container" style="width: 80%">
    <div class="row">
        <div class="col" style="border-right: 1px black solid">
            <div class="container" style="text-align: center">
                <h3>Followers</h3>
                <br>
                <div class="row">
                    @for ($i = 0; $i < sizeof($followers); $i++)
                        <div class="col">
                            <img src="{{ $followers[$i]->img }}" height="50" width="50">
                            <h5>{{ $followers[$i]->username }}</h5>
                            <form action="{{ route('user.follow') }}" method="POST">
                                @csrf
                                @if ($followers[$i]->following)
                                    <button class="btn btn-danger" value="{{ $followers[$i]->follower }}" name="user_id">Unfollow</button>
                                @else
                                    <button class="btn btn-success" value="{{ $followers[$i]->follower }}" name="user_id">Follow</button>
                                @endif
                            </form>
                        </div>
                        @if (($i + 1) % 3 == 0)
                            </div><div class="row" style="margin-top: 20px">
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="col" style="border-left: 1px black solid">
            <div class="container" style="text-align: center">
                <h3>You Follow</h3>
                <br>
                <div class="row">
                    @for ($i = 0; $i < sizeof($youFollow); $i++)
                        <div class="col">
                            <img src="{{ $youFollow[$i]->img }}" height="50" width="50">
                            <h5>{{ $youFollow[$i]->username }}</h5>
                            <form action="{{ route('user.follow') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" value="{{ $youFollow[$i]->followed }}" name="user_id">Unfollow</button>
                            </form>
                        </div>
                        @if (($i + 1) % 3 == 0)
                            </div><div class="row" style="margin-top: 20px">
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
