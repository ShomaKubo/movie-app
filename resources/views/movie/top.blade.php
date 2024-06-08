<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Movie List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="pt-8 px-6 text-gray-900 text-xl">
                            {{ __("基礎編") }}
                        </div>
                        <div class="flex flex-wrap -m-4 movie-slick">
                        @foreach($movies as $movie)
                            <div class="lg:w-1/4 md:w-1/2 p-4">
                                <a class="block relative h-48 rounded overflow-hidden">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                                </a>
                                <div class="mt-4">
                                    @if ( \App\Models\MovieWatchLog::existMovieWatchLog(auth()->id(), $movie->id) )
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 text-right">{{ ("視聴済み") }}</h3>
                                    @endif
                                    <a href="{{ route('movie.detail', $movie->id) }}">
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $movie->sub_title }}</h3>
                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $movie->title }}</h2>
                                    </a>         
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </section>

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="pt-8 px-6 text-gray-900 text-xl">
                            {{ __("応用編") }}
                        </div>
                        <div class="flex flex-wrap -m-4 movie-slick">
                        @foreach($movies as $movie)
                            <div class="lg:w-1/4 md:w-1/2 p-4">
                                <a class="block relative h-48 rounded overflow-hidden">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                                </a>
                                <div class="mt-4">
                                    @if ( \App\Models\MovieWatchLog::existMovieWatchLog(auth()->id(), $movie->id) )
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 text-right">{{ ("視聴済み") }}</h3>
                                    @endif
                                    <a href="{{ route('movie.detail', $movie->id) }}">
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $movie->sub_title }}</h3>
                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $movie->title }}</h2>
                                    </a>         
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
$('.movie-slick').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
    //autoplay: true,
    //autoplaySpeed: 3000,
});
</script>
