@extends('dashboard')

@section('content')
    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('company-name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Logo -->
        <div class="mt-4">
            <x-input-label for="logo" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="file"
                          name="logo"
                          accept="image/*"
            />

            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>

        <!-- Web site -->
        <div class="mt-4">
            <x-input-label for="website" :value="__('website')" />

            <x-text-input id="website" class="block mt-1 w-full"
                          type="text"
                          name="website" required />

            <x-input-error :messages="$errors->get('website')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
@endsection
