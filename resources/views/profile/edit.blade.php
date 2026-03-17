@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Profil Ayarları</h1>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-gray-50 shadow sm:rounded-lg border border-gray-200">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-gray-50 shadow sm:rounded-lg border border-gray-200">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
@endsection
