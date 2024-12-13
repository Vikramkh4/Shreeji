@extends('dashboard')
@section('content')

<div class="col-md-12 text-center">
    <h4 class="card-title">Product List</h4>
    <p class="card-description">Select the range of products for the PDF</p>
    <p class="text-warning"><strong>Note:</strong> You can generate a PDF for a maximum of 100 products at a time.</p>
    
    <form method="GET" action="{{ route('pdf.convert') }}" target="_blank">
        @csrf
        <div class="form-group">
            <label for="start">Start</label>
            <select name="start" id="start" class="form-control">
                @for ($i = 0; $i < $pageCount; $i += 100)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="end">End</label>
            <select name="end" id="end" class="form-control">
                @for ($i = 1; $i <= $pageCount; $i += 1)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="pageCount">Products Count (Optional)</label>
            <input type="number" id="pageCount" name="pageCount" class="form-control" placeholder="Page Count Start" >
        </div>

        <button type="submit" class="btn btn-primary mb-4">Download PDF</button>
    </form>
</div>

    <div class="container mt-5">
        <h2>Upload PDF</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            <p>Uploaded File: <a href="{{ route('pdf.download', basename(session('path'))) }}">{{ basename(session('path')) }}</a></p>
        @endif

        <form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="pdf" class="form-label">Choose PDF</label>
                <input type="file" class="form-control" id="pdf" name="pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload PDF</button>
        </form>
    </div>


@endsection
