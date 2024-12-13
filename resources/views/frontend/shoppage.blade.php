@extends('frontend.layout')
@section('contet')
<style>
    .btn-pagination {
        background-color: #3498db;
        color: white;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        margin: 5px;
        border-radius: 5px;
    }

    .btn-pagination[disabled] {
        background-color: #95a5a6;
        cursor: not-allowed;
    }
</style>

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ route('shop.view', ['category' => 'all']) }}">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request('category') == 'all' ? 'how-active1' : '' }}" data-filter="*">
                        All Products
                    </button>
                </a>

                <?php $categories = App\Models\Category::all(); ?>
                @foreach ($categories as $cat)
                    <a href="{{ route('shop.view', ['category' => $cat->id]) }}">
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                            {{ $cat->name }}
                        </button>
                    </a>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <!-- Search Button -->
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search Form -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form action="{{ route('shop.view') }}" method="GET">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" 
                            placeholder="Search products..." value="{{ request()->search ?? '' }}" />
                    </div>
                </form>
            </div>
        </div>

        <!-- Product Display Section -->
        <div class="row isotope-grid" id="product-container">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women product-item">
                    <!-- Product Card -->
                    <div class="block2 product-card">
                        <div class="block2-pic hov-img0 position-relative" style="height: auto; overflow: hidden;">
                            @if ($product->photos)
                                @php
                                    $photos = json_decode($product->photos);
                                @endphp
                                <img src="{{ url('storage/app/' . $photos[0]) }}" alt="Product Photo"
                                    class="img-fluid product-image">
                            @else
                                <img src="{{ asset('assets2/images/default-product.jpg') }}" alt="No Photo Available"
                                    class="img-fluid product-image">
                            @endif

                            <!-- Quick View Button -->
                            <a href="{{ route('product.quickView', $product->id) }}"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l text-center">
                                <a href="{{ route('product.detail', $product->id) }}"
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </a>

                                <span class="stext-105 cl3">
                                    ₹ {{ number_format($product->price, 2) }}
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04"
                                        src="{{ asset('assets2/images/icons/icon-heart-01.png') }}" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="{{ asset('assets2/images/icons/icon-heart-02.png') }}" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Controls -->
      <!-- Pagination Controls -->
<div class="pagination-controls text-center p-t-20">
    <button id="prevPage" class="btn-pagination" {{ $products->onFirstPage() ? 'disabled' : '' }}>Previous</button>
    <span id="currentPage" class="m-lr-10">{{ $products->currentPage() }}</span> of {{ $products->lastPage() }}
    <button id="nextPage" class="btn-pagination" {{ $products->hasMorePages() ? '' : 'disabled' }}>Next</button>
</div>

    </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.getElementById('prevPage');
    const nextButton = document.getElementById('nextPage');

    prevButton.addEventListener('click', function() {
        if (!prevButton.hasAttribute('disabled')) {
            fetchProducts({ page: {{ $products->currentPage() - 1 }} });
        }
    });

    nextButton.addEventListener('click', function() {
        if (!nextButton.hasAttribute('disabled')) {
            fetchProducts({ page: {{ $products->currentPage() + 1 }} });
        }
    });

    function fetchProducts(params) {
        let queryString = Object.keys(params).map(key => key + '=' + params[key]).join('&');
        fetch(`{{ route('shop.view') }}?${queryString}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('product-container').innerHTML = data.html.products;
            alert(data.html.products);
            document.querySelector('.pagination-controls').innerHTML = data.pagination;
            alert(data.pagination);

            // Update button states based on the new pagination
            prevButton.disabled = data.current_page == 1;
            nextButton.disabled = data.current_page == data.last_page;

            // Update the URL without reloading the page
            const newUrl = `{{ route('shop.view') }}?page=${data.current_page}`;
            window.history.pushState({ path: newUrl }, '', newUrl);
        })
        .catch(error => console.error('Error fetching products:', error));
    }
});
</script>



