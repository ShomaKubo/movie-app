<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Movie Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <div class="lg:w-1/4 md:w-1/2 p-4">
                                <video id="video" controls>
                                    <source src="{{ asset('storage/' . $movie->path) }}" type="video/mp4">
                                </video>
                                <div class="text-gray-900 title-font text-xl font-medium mt-4">
                                    {{ $movie->title }}
                                </div>
                                <div class="text-gray-500 text-xs tracking-widest title-font mt-2">
                                    {{ $movie->sub_title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap -m-4">
                        <div class="lg:w-1/4 md:w-1/2 p-4">
                            <h1 class="text-gray-500 text-xl tracking-widest title-font">概要</h1>
                            <h3 class="text-gray-500 text-base tracking-widest title-font mt-2">{{ $movie->summary }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
  const movie_id = '{{$movie->id}}'; // ajaxで使用する
</script>
<script src="{{ asset('/js/video.js') }}"></script>
