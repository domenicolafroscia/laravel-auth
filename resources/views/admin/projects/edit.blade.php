@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Edit project: {{ $project->title }}</h2>

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="actions">
                <button class="btn btn-warning" type="submit">Save</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
            </div>
        </form>
    </div>
@endsection
