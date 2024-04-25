<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <div class="lg:w-1/4 md:w-1/2 p-4">
                            <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <label for="name">タイトル</label>
                                <input type="text" id="title" name="title">
                                <label for="name">サブタイトル</label>
                                <input type="text" id="sub_title" name="sub_title">
                                <input type="file" id="movie" name="movie">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </form>
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
