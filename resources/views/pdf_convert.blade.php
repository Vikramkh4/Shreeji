<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products PDF</title>

    <style>
        @page {
            margin: 1cm;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: auto;
            padding: auto;
            position: relative;
        }

        .page-border {
            border: 1px solid #ddd;
            margin: 20px auto;
            padding: 20px;
            page-break-after: always;
            background-color: #f9f9f9;
            position: relative;
        }

        .logo-container {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 150px; /* Increased size */
            height: auto;
        }

        .logo-container img {
            width: 150px; /* Match container width */
            height: auto;
        }

        .footer {
            position: absolute;
            bottom: 0px;
            left: 10px;
        
            text-align: left;
            font-size: 12px;
            color: #666;
            margin-top: 10px;
            border-top: 1px solid #ddd;
            padding: 5px 0;
        }

        .page-number {
            position: absolute;
            bottom: 20px;
            right: 10px;
            font-size: 12px;
            color: #666;
        }

        .full-page-image {
            width: 100%;
            height: auto;
        }

        .product-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .product-header {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .product-image {
            display: flex;
            max-width: 100%;
            max-height: 50%;
            object-fit: contain;
            align-content: center;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }

        .product-details {
            flex: 1;
            font-size: 14px;
            line-height: 1.6;
        }

        .product-details strong {
            font-size: 18px;
            color: #333;
        }

        .product-details p {
            margin: 10px 0;
            font-weight: bold;
        }

        .variants-container {
            margin-top: 20px;
        }

        .variants-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .variant-images {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .variant-image-item {
            display: inline-block;
            margin-right: 10px;
            flex-wrap: wrap;
        }

        .variant-image-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .price {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    @php $pageCount = $count; @endphp
  
    <!-- Product Details -->
    @foreach ($products as $product)
    @if($product != null)
    <div class="page-border" style="{{ $loop->last ? '' : 'page-break-after: always;' }}">
            <!-- Logo -->
            <div class="logo-container">
                <img src="{{ asset('assets/images/Shreeji-logo.png') }}" alt="Logo">
            </div>

            <div class="product-container">
                <!-- Product Header -->
                <div class="product-header">
                    <!-- Product Image -->
                    <div>
                        @if ($product->photos)
                            @php
                                $photos = json_decode($product->photos);
                            @endphp
                            @if (!empty($photos[0]))
                                <img src="{{ asset('storage/app/' . $photos[0]) }}" alt="Product Photo"
                                    class="product-image">
                            @endif
                        @else
                            <p>No Photo</p>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="product-details">
                        <strong>Article:</strong>
                        <p>{{ $product->name }}</p>
                        <strong>Description:</strong>
                        <p>{!! $product->description !!}</p>
                        <div class="price">MRP: ₹{{ $product->price }}</div>
                    </div>
                </div>

                <!-- Variants -->
                @if (!empty($product->colors))
                    @php
                        $colors = json_decode($product->colors);
                    @endphp
                    <div class="variants-container">
                        <div class="variants-title">Available Variants</div>
                        <div class="variant-images">
                            @foreach ($colors as $color)
                                <div class="variant-image-item">
                                    @if (!empty($color->image))
                                        <img src="{{ asset('storage/app/' . $color->image) }}"
                                            alt="{{ $color->name }} Variant">
                                        <br>{{ $color->name }}
                                    @else
                                        <p>No Image</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>No Variants</p>
                @endif
            </div>

            <!-- Page Number -->
            <div class="page-number">Page {{ $pageCount }}</div>

            <!-- Footer Text -->
            <div class="footer">© 2024 Shreeji Enterprises. All rights reserved.</div>
        </div>
         @else
         @break;
         @endif

        @php $pageCount++; @endphp
    @endforeach
</body>


</html>
