@extends('dashboard')
@section('content')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <p class="card-description"> Basic form elements </p>
                <form class="forms-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf <!-- Include CSRF token for security if you're using Laravel -->

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter product name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="editor" rows="10" cols="80" placeholder=" Enter your content here...">
             
          </textarea>
                    </div>

                    <div class="form-group">
                        <label for="brandname">Brand Name</label>
                        <input type="text" class="form-control" id="brandname" name="brandname"
                            placeholder="Enter brand name">
                    </div>

                    <div class="form-group">
                        <label for="ytlink">YouTube Link</label>
                        <input type="url" class="form-control" id="ytlink" name="ytlink"
                            placeholder="Enter YouTube link">
                    </div>

                    <div class="form-group">
                        <label for="photos">Product Photos</label>
                        <input type="file" class="form-control" id="photos" name="photos[]" multiple>
                    </div>
                    <div class="form-group">
                        <label for="video">Product Video</label>
                        <input type="file" class="form-control" id="videos" name="videos[]">


                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
                    </div>

                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="3" placeholder="Enter product review"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="colors">Colors and Images</label>
                        <div id="color-section">
                            <div class="row color-row mb-2">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="colors[]"
                                        placeholder="Enter color name">
                                </div>
                                <div class="col-md-5">
                                    <input type="file" class="form-control" name="color_images[]">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-color">Remove</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-color" class="btn btn-secondary mt-2">Add Color</button>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        // Initialize CKEditor
        CKEDITOR.replace('editor');

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
    </script>
@endsection
