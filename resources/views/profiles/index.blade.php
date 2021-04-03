@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div>
                    <a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
