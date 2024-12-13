@extends('dashboard')
@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Product Inquiry</h4>
      <p class="card-description">Modify your inquiry for multiple products</p>
      @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('inquiry.update', $inquiry->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $inquiry->name }}" placeholder="Enter your name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $inquiry->email }}" placeholder="Enter your email" required>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $inquiry->phone }}" placeholder="Enter your phone number" required>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Your Address</label>
            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter your address" required>{{ $inquiry->address }}</textarea>
        </div>

        <!-- Products and Quantities -->
        <div class="form-group">
            <label>Products and Quantities</label>
            <div id="product-list">
              @php
                $products = json_decode($inquiry->products, true);
              @endphp
              @foreach ($products as $index => $product)
                <div class="product-item row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="products[{{ $index }}][name]" value="{{ $product['name'] }}" placeholder="Product Name" required>
                    </div>
                    <div class="col-md-4">
                      <input type="number" class="form-control" name="products[{{ $index }}][quantity]" value="{{ $product['quantity'] }}" placeholder="Quantity" required>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-danger remove-product">Remove</button>
                    </div>
                </div>
              @endforeach
            </div>
            <button type="button" id="add-product" class="btn btn-primary mt-3">+ Add Another Product</button>
        </div>

        <!-- Inquiry Message -->
        <div class="form-group">
            <label for="message">Inquiry Details</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter inquiry details" required>{{ $inquiry->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Inquiry</button>
      </form>
    </div>
  </div>
</div>

<script>
    let productIndex = @php echo count($products); @endphp;

    // Add new product row
    document.getElementById('add-product').addEventListener('click', function() {
        let productList = document.getElementById('product-list');
        let newProduct = `
        <div class="product-item row">
            <div class="col-md-6">
              <input type="text" class="form-control" name="products[${productIndex}][name]" placeholder="Product Name" required>
            </div>
            <div class="col-md-4">
              <input type="number" class="form-control" name="products[${productIndex}][quantity]" placeholder="Quantity" required>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-danger remove-product">Remove</button>
            </div>
        </div>
        `;
        productList.insertAdjacentHTML('beforeend', newProduct);
        productIndex++;
    });

    // Remove product row
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-product')) {
            e.target.closest('.product-item').remove();
        }
    });
</script>

@endsection
