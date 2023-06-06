@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <a href="{{ $project->git }}" class="btn btn-tertiary">See GIT!</a>
    <p>Start Date {{ $project->date }}</p>
@endsection
