@extends('dashboard')
@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

    <h1>Edit Banner</h1>
    <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Banner Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $banner->title }}" required>
        </div>

        <div class="form-group">
            <label for="image">Banner Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}" width="100">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $banner->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" name="link" value="{{ $banner->link }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
    
@endsection
