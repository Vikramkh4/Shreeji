@extends('dashboard')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Featured Product</h4>

                <form action="{{ route('feature_products.update', $featuredProduct->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="products_id">Product</label>
                        <select name="products_id" id="products_id" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ $product->id == $featuredProduct->products_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $featuredProduct->status == 1 ? 'selected' : '' }}>Featured</option>
                            <option value="0" {{ $featuredProduct->status == 0 ? 'selected' : '' }}>Not Featured
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
