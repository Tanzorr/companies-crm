@extends('dashboard')

@section('content')
    <x-breadcrumbs :links="['My Employees'=>route('employees.index'), 'Edit'=>'#' ]" class="mb-4"/>
    <form method="POST" action="{{ route('employees.update', $employee) }}" >
        @csrf
        @method('PUT')

        <!--First Name -->
        <div>
            <x-input-label for="first_name" :value="__('Name')"/>
            <x-text-input id="first_name" class="block mt-1 w-full"
                          type="text"
                          name="first_name" :
                          :value="$employee->first_name"
                          required autofocus autocomplete="first_name"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!--Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')"/>
            <x-text-input id="last_name"
                          class="block mt-1 w-full"
                          type="text"
                          name="last_name"
                          :value="$employee->last_name"
                          required autofocus
                          autocomplete="last_name"/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <!--Company Name -->
        <div class="mt-4 w-full h-full">
            <x-input-label for="company_name"
                           :value="'Company name'"/>
            <x-select name="company_id" :options="$companies" :selected="$employee->company_id" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email" name="email"
                          :value="$employee->email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>


        <!-- phone number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('phone')"/>
            <x-text-input id="phone" class="block mt-1 w-full"
                          type="text"
                          :value="$employee->phone"
                          name="phone" required/>

            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
@endsection
