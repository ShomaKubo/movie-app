<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if( session('flash') )
                    @foreach (session('flash') as $key => $item)
                    <div class="alert alert-{{ $key }}">{{ session('flash.' . $key) }}</div>
                    @endforeach
                @endif

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <div class="lg:w-1/4 md:w-1/2 p-4">
                                <div class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                    {{ $movie->sub_title }}
                                </div>
                                <div class="text-gray-900 title-font text-lg font-medium">
                                    {{ $movie->title }}
                                </div>
                                <video id="video" controls>
                                    <source src="{{ asset('storage/' . $movie->path) }}" type="video/mp4">
                                </video>
                                <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">テキストテキストテキストテキスト</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
  const movie_id = '{{$movie->id}}'; // ajaxで使用する
</script>
<script src="{{ asset('/js/video.js') }}"></script>
