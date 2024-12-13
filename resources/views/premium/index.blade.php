@extends('dashboard')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Premium Products</h4>
                <a href="{{ route('premium.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> + Add Products
                </a>

                <p class="card-description"> List of all featured products </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($premiumProducts as $featuredProduct)
                            <tr>
                                <td>{{ $featuredProduct->product->id }}</td>
                                <td>{{ $featuredProduct->product->name }}</td>
                                <td>{{ $featuredProduct->description }}</td>
                                <td>{{ $featuredProduct->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('premium.edit', $featuredProduct->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('premium.destroy', $featuredProduct->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
