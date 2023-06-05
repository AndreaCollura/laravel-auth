@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    <a href="{{ $project->git }}" class="btn btn-tertiary">See GIT!</a>
    <p>First commit {{ $project->date }}</p>
@endsection
