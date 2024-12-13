@extends('dashboard')
@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <!-- Form to edit the category -->
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
            </div>

            <!-- Image upload field -->
            <div class="form-group">
                <label for="image">Category Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <!-- Preview the current image if it exists -->
            @if ($category->image)
                <div class="form-group">
                    <img src="{{ asset('public/categories/' . $category->image) }}" alt="{{ $category->name }}"
                        width="200">
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
