@extends('dashboard')
@section('content')
    <h1>Create Banner</h1>
    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Banner Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="image">Banner Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" name="link">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
