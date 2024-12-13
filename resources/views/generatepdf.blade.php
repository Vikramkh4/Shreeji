<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv= x-ua-compatible content= ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
    
        .all-info{
           width: 150px;
            height: auto;
             padding: 50px;
            margin-bottom: 20px;
        float: left;  
            
            
            
            
        }
        
        .product-card {
              width:400px;
               height: auto;
              box-sizing: content-box;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
         
        }

        .product-image img {
            width:150px;
            height: auto;
             padding: 50px;
            object-fit: cover;
            margin-bottom: 20px;
        float: left;}

        .product-info {
          width:150px;
            height: auto;
            margin-bottom: 20px;
        float: left;}

        .product-variants {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .variant-image-item {
            width: 50px;
            text-align: center;
        }

        .variant-image-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-bottom: 5px;
        }

        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            text-align: right;
            margin-top: 20px;
        }
        
        
         <!--.scroll {-->
         <!--     width:auto;-->
         <!--   height: auto;-->
         <!--   background-color: white;-->
         <!--overflow: scroll;}-->
        

   

            .card {
            padding: 20px;
            width:100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
           
           
         #content {
           width:100%;
    }   
           
            
            
       
    </style>
</head>
<body>

<h2 class="text-center">{{ $title }}</h2>
<p class="text-center">{{ $date }}</p>

 <div id="content">
<div class="container no-gutters mt-5">
   
    <div class="product-card">
        @foreach ($products as $product)
        <!-- Product Image -->
          <div class="card">  
        <div class="product-image">
            @if ($product->photos)
                @php
                    $photos = json_decode($product->photos);
                @endphp
                @if (!empty($photos[0]))
                    <img src="{{ asset('storage/app/' . $photos[0]) }}" alt="Product Photo">
                @else
                    <p>No Photo Available</p>
                @endif
            @else
                <p>No Photo Available</p>
            @endif
        </div>
        </div>
       

        <!-- Product Information -->
        <div class="card">  
        <div class="product-info">
            <h4><strong>Article:</strong> {{ $product->name }}</h4>
            <p><strong>Description:</strong> {{ $product->description }}</p>
        </div>
        </div>
        
       

  <div class="card">  
 <div class="all-info">
        <!-- Product Variants -->
        @if (!empty($product->colors))
            @php
                $colors = json_decode($product->colors);
            @endphp
            <div>
                <strong>Variants:</strong>
                <div class="product-variants">
                    @foreach ($colors as $color)
                        <div class="variant-image-item">
                            @if (!empty($color->image))
                                <img src="{{ asset('storage/app/' . $color->image) }}" alt="{{ $color->name }} Variant">
                                <strong>{{ $color->name }}</strong>
                            @else
                                <p>No Image</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p>No Variants Available</p>
        @endif

        <!-- Product Price -->
        <div class="price">
            ₹{{ number_format($product->price, 2) }}
        </div>
          <br>
        </div>
        </div>
      
        
        
        
    </div>
  
    @endforeach
</div>
</div>
<!--</div>-->

</body>
</html>
