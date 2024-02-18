@extends('dashboard')

@section('content')
    <x-breadcrumbs :links="['My Companies'=>route('companies.index'), 'Edit'=>'#' ]" class="mb-4"/>
    <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$company->name" required
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('company-name')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$company->email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Logo -->
        <div class="mt-4">
            <x-input-label for="logo"/>
            <img src="{{  asset('/storage/logos/'.$company->logo) }}"
                 alt="company logo"
                 width=100
                 height=100
            />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="file"
                          name="logo"
                          :value="$company->logo"
                          accept="image/*"
            />

            <x-input-error :messages="$errors->get('logo')" class="mt-2"/>
        </div>

        <!-- Web site -->
        <div class="mt-4">
            <x-input-label for="website" :value="__('website')"/>

            <x-text-input id="website" class="block mt-1 w-full"
                          type="text"
                          :value="$company->website"
                          name="website" required/>

            <x-input-error :messages="$errors->get('website')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
@endsection
