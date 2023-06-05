@extends('layouts.admin')

@section('content')
    <h1>create project</h1>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title">title</label>
            <input type="text" id="title" name="title" class="form-controll">
        </div>
        <div class="mb-3">
            <label for="image">image url</label>
            <input type="url" id="image" name="image" class="form-controll">
        </div>
        <div class="mb-3">
            <label for="body">body</label>
            <textarea type="text" id="body" name="body" rows="10" class="form-controll"></textarea>
        </div>
        <button type="submit" class="btn btn-success">save</button>
        <button type="reset" class="btn btn-danger">reset</button>
    </form>
@endsection
