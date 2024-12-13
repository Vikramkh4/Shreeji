@extends('dashboard')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <form class="forms-sample" action="{{ route('products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $product->name }}" placeholder="Enter product name" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="editor" rows="10" cols="80">{{ $product->description }}</textarea>
                    </div>

                    <!-- Brand Name -->
                    <div class="form-group">
                        <label for="brandname">Brand Name</label>
                        <input type="text" class="form-control" id="brandname" name="brandname"
                            value="{{ $product->brandname }}" placeholder="Enter brand name" required>
                    </div>

                    <!-- YouTube Link -->
                    <div class="form-group">
                        <label for="ytlink">YouTube Link</label>
                        <input type="url" class="form-control" id="ytlink" name="ytlink"
                            value="{{ $product->ytlink }}" placeholder="Enter YouTube link">
                    </div>

                    <!-- Product Photos -->
                    <!-- Product Photos -->
<div class="form-group">
    <label for="photos">Product Photos</label>
    <input type="file" class="form-control" id="photos" name="photos[]" multiple>

    <!-- Display current images -->
    <div id="image-preview" class="mt-3">
        @if ($product->photos)
            @php
                $photos = json_decode($product->photos, true) ?? [];
            @endphp
            <ul id="sortable-images" class="list-unstyled d-flex flex-wrap">
                @foreach ($photos as $photo)
                    <li class="image-item m-2" data-id="{{ $loop->index }}">
                        <img src="{{ asset('storage/app/' . $photo) }}" alt="Product Image" class="img-thumbnail" style="width: 100px; height: auto;">
                        <input type="hidden" name="photo_order[]" value="{{ $photo }}">
                        <button type="button" class="btn btn-danger btn-sm remove-image mt-1">Remove</button>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<div class="form-group">
                        <label for="video">Upload Video:</label>
                        <input type="file" class="form-control" name="videos[]" id="video" accept="video/*">
                        @if ($product->video)
                            <video width="300" controls>
                                <source src="{{ asset('storage/app/public/' . $product->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <p>Current Video: {{ basename($product->video) }}</p>
                        @endif
                    </div>


                    <!-- Price -->
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $product->price }}" placeholder="Enter price" required>
                    </div>

                    <!-- Review -->
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" placeholder="Enter product review">{{ $product->review }}</textarea>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Color Section -->
                    <div class="form-group">
                        <label for="color">Colors and Images</label>
                        <div id="color-section">
                            @php
                                $colors = json_decode($product->colors, true) ?? []; 
                            @endphp
                            @foreach ($colors as $color)
                                <div class="row color-row mb-2">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="colors[]"
                                            value="{{ $color['name'] }}" placeholder="Enter color name" >
                                    </div>
                                    <div class="col-md-5">
                                        <input type="file" class="form-control" name="color_images[]">
                                        @if (isset($color['image']))
                                            <img src="{{ 'https://shreejiienterprise.com/storage/app/'.$color['image'] }}"
                                                alt="{{ $color['name'] }} Image"
                                                style="width: 50px; height: auto; margin-top: 5px;">
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-color">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-color" class="btn btn-secondary mt-2">Add Color</button>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('products.list') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize sortable
        const sortable = new Sortable(document.getElementById('sortable-images'), {
            animation: 150,
            onEnd: function () {
                // Update the order of images
                let orderedPhotos = [];
                $('#sortable-images .image-item').each(function () {
                    orderedPhotos.push($(this).find('input[name="photo_order[]"]').val());
                });
                console.log('New order:', orderedPhotos); // Optionally log the new order
            }
        });

        // Remove image
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-image')) {
                e.target.closest('.image-item').remove();
            }
        });
    });
</script>

    <script>
  
$(document).ready(function(){
    
        
        
        
    // Add new color input row
    document.getElementById('add-color').addEventListener('click', function() {
        const colorRow = `
            <div class="row color-row mb-2">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="colors[]" placeholder="Enter color name">
                </div>
                <div class="col-md-5">
                    <input type="file" class="form-control" name="color_images[]">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-color">Remove</button>
                </div>
            </div>`;
        document.getElementById('color-section').insertAdjacentHTML('beforeend', colorRow);
    });

    // Remove color input row
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-color')) {
            e.target.closest('.color-row').remove();
        }
    });
    
});
    

  CKEDITOR.replace('editor');
    </script>
@endsection
