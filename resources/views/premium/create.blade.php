@extends('dashboard')
@section('content')

    <div class="container">
        <h2>Add Premium Product</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Feature Product Form -->
        <form action="{{ route('premium.store') }}" method="POST">
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
                    <label for="status">Status (Premium)</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Premium</option>
                    <option value="0">Not Premium</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Premium Product</button>
        </form>
    </div>



  



    <script>
        jQuery(document).ready(function() {
            // Initialize Select2 on the product dropdown
            jQuery('#products_id').select2({
                placeholder: "Select a product",
                allowClear: true
            });
        });
    </script>



@endsection
