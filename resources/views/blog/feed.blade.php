@extends('layouts.main')

@section('content')
<div class="container" >
    <div style="text-align: center">
        <h3>Post something</h3>
    </div>
    <br>
    <form action="{{ route('blog.post-blog') }}" method="POST">
        @csrf
        <div class="row align-items-center">
            <div class="col-1">
                <img src="{{ auth()->user()->img }}" style="border: 5px black solid; border-radius: 5px" height="75" width="75">
            </div>
            <div class="col-2" style="text-align: left">
                <h5>{{ auth()->user()->username }}</h5>
            </div>
            <div class="col" style="text-align: left">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="entry"></textarea>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group" style="text-align: center">
                <button class="btn btn-success" type="submit">Post :)</button>
            </div>
        </div>
    </form>
</div>
<hr style="height: 5px; margin-left: 50px; margin-right: 50px; color: darkblue">
<div class="container">
    @foreach ($blogs as $blog)
        <div class="row align-items-center">
            <div class="col-1">
                <a href="../user/{{ $blog->username }}">
                    <img src="{{ $blog->img }}" style="border: 5px black solid; border-radius: 5px" height="75" width="75">
                </a>
            </div>
            <div class="col-2" style="text-align: left">
                <h5>{{ $blog->username }}</h5>
            </div>
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
