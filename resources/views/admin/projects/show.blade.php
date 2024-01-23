@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <h2>{{ $project->title }}</h2>

        <div class="mt-4">
            Data: {{ $project->created_at }}
        </div>

        <div class="mt-4">
            Slug: {{ $project->slug }}
        </div>

        <p class="mt-4">
            {{ $project->content }}
        </p>
    </div>
@endsection
