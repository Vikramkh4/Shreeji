@extends('dashboard')
@section('content')

    <div class="tab-content tab-transparent-content">
    <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Products</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $productCount }}</h2>
                        <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Total Products</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Inquiries</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $inquiryCount }}</h2>
                        <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Total Inquiries</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Categories</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $categoryCount }}</h2>
                        <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-eye icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
