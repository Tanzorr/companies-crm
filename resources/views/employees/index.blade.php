@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-xl mb-4">Employee List</h1>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
            </div>
        </div>
        <table class="min-w-full mt-5 bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">First Name</th>
                <th class="py-2 px-4 border-b">Last Name</th>
                <th class="py-2 px-4 border-b">Company</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Phone</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $employee->first_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->last_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->company->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->phone }}</td>
                    <td class="py-2 px-4 border-b">
                        <div class="flex gap-2">
                            <x-link-button href="{{ route('employees.edit', $employee) }}" class="text-blue-500">Edit</x-link-button>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button class="text-red-500">Delete</x-button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-2 px-4 border-b">No Employee Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="mt-5">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
