@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">New project</h2>

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Save</button>
            <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>

        </form>
    </div>
@endsection
