@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <div class="btn-group">
                        @can('update', $user->profile)
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
                        <a href="{{route('profile.edit', ['user' => $user])}}" class="btn btn-warning">Edit Profile</a>
                        @endcan
                    </div>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                    <div class="pr-5"><strong>23k</strong> followers</div>
                    <div class="pr-5"><strong>212</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div>
                    <a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/post/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" alt="{{$post->caption}}" class="w-100"/>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
