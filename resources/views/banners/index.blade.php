@extends('dashboard')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Banners</h4>

                <!-- Add Banner Button -->
                <a href="{{ route('banners.create') }}" class="btn btn-outline-primary btn-icon-text mb-3">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> + Add Banner
                </a>

                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <td>
                                        <img src="{{ asset('public/banners/' . $banner->image) }}"
                                            alt="{{ $banner->title }}" style="width: 100px;">
                                    </td>
                                    <td>{{ $banner->description }}</td>
                                    <td>
                                        @if ($banner->link)
                                            <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('banners.edit', $banner->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
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
