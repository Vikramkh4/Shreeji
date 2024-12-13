@extends('frontend.layout')
@section('contet')

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- dFlip Flipbook Stylesheets -->
<link href="https://cdn.jsdelivr.net/npm/dflip/css/dflip.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/dflip/css/themify-icons.min.css" rel="stylesheet" type="text/css">

<style>
    /* Custom Styles */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .card-title {
        font-size: 28px;
        color: #343a40;
        margin-bottom: 10px;
    }

    .card-description {
        font-size: 16px;
        color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 25px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    #flipbook_example {
        margin: 20px auto;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        overflow: hidden;
    }
</style>

<div class="container">
    <!-- Header Section -->
    <div class="text-center">
        <h4 class="card-title">Shreeji Product Catalog</h4>
        <p class="card-description">Explore our product catalog in an engaging, interactive flipbook format!</p>
        <a href="{{ route('pdf.download', ['filename' => 'Shreeji.pdf']) }}" class="btn btn-primary mb-4">
            <i class="glyphicon glyphicon-download"></i> Download PDF
        </a>
    </div>

    <!-- Flipbook Section -->
    <div class="text-center">
        <div class="_df_book" id="flipbook_example" source="https://shreejiienterprise.com/storage/app/public/products/pdf/Shreeji.pdf"></div>
    </div>
</div>

<!-- Footer Section -->
<div class="container mt-5 text-center">
    <p style="color: #6c757d; font-size: 14px;">
        &copy; {{ date('Y') }} Shreeji Enterprises. All Rights Reserved.
    </p>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>

<!-- dFlip Flipbook JS -->
<script src="https://cdn.jsdelivr.net/npm/dflip/js/dflip.min.js" type="text/javascript"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the flipbook
        const flipbook = new DFLIP("#flipbook_example", {
            height: 600,               // Set flipbook height
            backgroundColor: "#e5040455" // Set background color
        });
    });
</script>

@endsection
