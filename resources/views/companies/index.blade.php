@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-xl mb-4">Company List</h1>
                <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
            </div>
            <table class="min-w-full mt-5 bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Logo</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Website</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($companies as $company)
                    <tr>
                        <td class="py-2 px-4 border-b"><img src="{{ asset('/storage/logos/'.$company->logo) }}" alt="" width="100" height="100"></td>
                        <td class="py-2 px-4 border-b">{{ $company->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $company->email }}</td>
                        <td class="py-2 px-4 border-b">
                            <x-link-button href="{{ $company->website }}" class="text-blue-500">Visit</x-link-button>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <div class="flex gap-2">
                                <x-link-button href="{{ route('companies.edit', $company) }}" class="text-blue-500">Edit</x-link-button>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="text-red-500">Delete</x-button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-2 px-4 border-b">No Company Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
@endsection
