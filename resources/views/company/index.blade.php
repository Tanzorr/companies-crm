@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-xl mb-4">Company List</h1>
                <a href="{{ route('company.create') }}" class="btn btn-primary">Create Company</a>
            </div>
            <table class="mt-5">
                <thead>
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($companies as $company)
                    <tr>
                        <td><img src="{{ asset('/logos/'.$company->logo) }}" alt="" width=100 height=100></td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <x-link-button href="{{ $company->website }}">Visit</x-link-button>
                        </td>
                        <td>
                            <x-link-button href="{{route('company.edit', $company)}}">Edit</x-link-button>
                            <x-button class="bg-red-500">Delete</x-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Company Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
@endsection
