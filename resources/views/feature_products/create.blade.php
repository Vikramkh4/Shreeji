@extends('dashboard')
@section('content')
    <div class="container">
        <h2>Add Feature Product</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Feature Product Form -->
        <form action="{{ route('feature_products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="products_id">Select Product</label>
                <select name="products_id" id="products_id" class="form-control">
                    <option value="" disabled selected>Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('products_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status (Featured)</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Featured</option>
                    <option value="0">Not Featured</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Feature Product</button>
        </form>
    </div>
@endsection
