@extends('dashboard')
@section('content')
    <style>
        /* In your CSS file or in a <style> tag */
        .product-list-item {
            margin-bottom: 10px;
        }
    </style>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Inquiries</h4>
                <p class="card-description">List of product inquiries</p>

                <!-- Add Inquiry Button -->
                <a href="{{ route('inquiry.form') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> + Add Inquiry
                </a>

                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Products</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $inquiry->name }}</td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td>{{ $inquiry->phone }}</td>
                                    <td>{{ $inquiry->address }}</td>
                                    <td>
                                        @php
                                            $products = json_decode($inquiry->products, true);
                                        @endphp
                                        @if (is_array($products) && count($products) > 0)
                                            <ul class="list-unstyled">
                                                @foreach ($products as $product)
                                                    <li class="product-list-item">
                                                        <strong>Product Name:</strong> {{ $product['name'] ?? 'N/A' }}<br>
                                                        <strong>Quantity:</strong> {{ $product['quantity'] ?? 'N/A' }}<br>
                                                        <strong>Size:</strong> {{ $product['size'] ?? 'N/A' }}<br>
                                                        <strong>Color:</strong> {{ $product['color'] ?? 'N/A' }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            No products found
                                        @endif
                                    </td>

                                    <td>{{ $inquiry->message }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('inquiry.edit', $inquiry->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('inquiry.destroy', $inquiry->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this inquiry?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
