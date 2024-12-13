@extends('dashboard')
@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Distributer And Relators</h4>
                

                <p class="card-description"> List of all Entries </p>
                  @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                 <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distributers as $key => $distributer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $distributer->name }}</td>
                        <td>{{ $distributer->email }}</td>
                        <td>{{ $distributer->mob }}</td>
                        <td>{{ $distributer->address }}</td>
                        <td>{{ $distributer->message }}</td>
                        <td>{{ $distributer->role }}</td>
                        <td>{{ $distributer->status ? 'Active' : 'Inactive' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
@endsection
