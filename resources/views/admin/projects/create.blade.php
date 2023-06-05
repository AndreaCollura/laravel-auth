@extends('layouts.admin')


@section('content')
    <div class="container my-5">
        <form class="row g-3" action="{{-- {{ route('admin.projects.store', $project->id) }} --}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6"></div>
            <div id="titleHelp" class="form-text">Edit title here</div>
            <label for="title" class="form-label"></label>

            <input type="text" class="form-control @error('title') is-invalid
                @enderror" name="title"
                id="title" aria-describedby="titleHelp" value="{{ $project->title }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="col-6">
        <div id="gitHelp" class="form-text">Edit git url here</div>
        <label for="git" class="form-label"></label>
        <input type="text" class="form-control @error('git') is-invalid
                @enderror" name="git"
            id="git" aria-describedby="gitHelp" value="{{ $project->git }}">
        @error('git')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-2">
        <div id="dateHelp" class="form-text">Edit start date here</div>
        <label for="date" class="form-label"></label>
        <input type="text" placeholder="Ex: YYYY/MM/DD"
            class="form-control @error('date') is-invalid
                @enderror" name="date" id="date"
            aria-describedby="dateHelp" value="{{ $project->date }}">
        @error('date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
    </form>
    </div>
@endsection
