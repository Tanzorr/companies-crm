@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-xl mb-4">Company List</h1>
                <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
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
                        <td><img src="{{ asset('/storage/logos/'.$company->logo) }}" alt="" width=100 height=100></td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <x-link-button href="{{ $company->website }}">Visit</x-link-button>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <x-link-button href="{{route('companies.edit', $company)}}">Edit</x-link-button>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button >Delete</x-button>
                                </form>
                            </div>
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
