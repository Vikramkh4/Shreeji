@extends('dashboard')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Premium Product</h4>

                <form action="{{ route('premium.update', $premiumProduct->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="products_id">Product</label>
                        <select name="products_id" id="products_id" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ $product->id == $premiumProduct->products_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $premiumProduct->status == 1 ? 'selected' : '' }}>Premium</option>
                            <option value="0" {{ $premiumProduct->status == 0 ? 'selected' : '' }}>Not Premium
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
