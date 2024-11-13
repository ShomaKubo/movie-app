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
                                @include('profile.partials.admin-update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
