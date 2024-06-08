<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <section class="body-font">
                    <div class="container px-5 py-24 mx-auto my-4">
                        <div class="col-form-label col-form-label-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="col-form-label col-form-label-lg mt-8">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        @if ($user->role == 'admin')
                        <div class="col-form-label col-form-label-lg mt-8">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
