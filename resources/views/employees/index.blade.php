@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-xl mb-4">Employee List</h1>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
            </div>
        </div>
        <table class="mt-5">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td> {{ $employee->last_name }}</td>
                        <td> {{ $employee->company->name }}</td>
                        <td> {{ $employee->email }}</td>
                        <td> {{ $employee->phone }}</td>
                        <td>
                            <div class="flex gap-2">
                                <x-link-button href="{{route('employees.edit', $employee)}}">Edit</x-link-button>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button >Delete</x-button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6">No Employee Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
