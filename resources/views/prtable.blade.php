@extends('dashboard')
@section('content')
  <style>
        /* Style adjustments for the DataTable */
        #productTable {
            width: 100%; /* Ensures the table uses the full width available */
            max-width: 800px; /* Limits the maximum width */
            margin: auto; /* Centers the table */
            font-size: 0.9em; /* Decreases the font size */
        }

        #productTable th,
        #productTable td {
            padding: 5px; /* Reduces padding for smaller cells */
        }
    </style>
    
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product List</h4>
                <p class="card-description">List of products in the database</p>
                <div class="table-responsive">
                     <table id="productTable" class="table table-hover">
                        <a href="{{ route('product.show') }}" class="btn btn-outline-primary btn-icon-text">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i> + Add Products
                        </a>

                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Brand Name</th>
                                <th>YouTube Link</th>
                                <th>Price</th>
                                <th>Review</th>
                                <th>Category</th>
                                <th>Photos</th>
                                <th>Colors & Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td>{{ $product->brandname }}</td>
                                    <td><a href="{{ $product->ytlink }}" target="_blank">View Video</a></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->review }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        @if ($product->photos)
                                            @php
                                                $photos = json_decode($product->photos);
                                            @endphp
                                            @foreach ($photos as $photo)
                                                <img src="{{ url('storage/app/' . $photo) }}" alt="Product Photo"
                                                    width="50" height="50">
                                            @endforeach
                                        @else
                                            No Photos
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($product->colors))
                                            @php
                                                $colors = json_decode($product->colors);
                                            @endphp
                                            @foreach ($colors as $color)
                                                <div>
                                                    <strong>{{ $color->name }}</strong>
                                                    @if (!empty($color->image))
                                                        <img src="{{ url('storage/app/' . $color->image) }}"
                                                            alt="{{ $color->name }} Image" width="50" height="50">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            No Colors
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Pass product id for edit -->
                                        <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <!-- Delete form -->
                                        <form action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Your custom script -->
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "pageLength": 5, // Show 5 entries per page
                "ordering": true,
                "searching": true,
                "paging": true,
                "lengthMenu": [5, 10, 15, 20] // Allow users to select how many rows to display
            });
        });
    </script>
@endsection
