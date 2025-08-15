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
                    <div class="container px-5 py-12 mx-auto">
                        <div class="pt-8 px-6 text-gray-900 text-xl">
                            {{ __(App\Models\Movie::CHAPTER[0] ?? 'Unknown Chapter') }}
                        </div>
                        {{-- スライダーのコンテナは動画ループの外側に配置 --}}
                        <div class="flex flex-wrap movie-slick -m-4 w-fit">
                            @foreach($movies as $movie)
                                {{-- 各動画カードがスライダーの1要素になる --}}
                                <div class="lg:w-1/4 md:w-1/2 p-4">
                                    <a class="block relative h-48 rounded overflow-hidden" href="{{ route('movie.detail', $movie->id) }}">
                                        <img class="object-cover object-center w-full h-full block" src="{{ asset('storage/' . $movie->thumbnail_path) }}">
                                    </a>
                                    <div class="mt-4">
                                        <a href="{{ route('movie.detail', $movie->id) }}">
                                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $movie->sub_title }}</h3>
                                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $movie->title }}</h2>
                                        </a>
                                    @if ( \App\Models\MovieWatchLog::existMovieWatchLog(auth()->id(), $movie->id) )
                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 text-right">{{ ("視聴済み") }}</h3>
                                        @endif
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
// DOMの準備ができてからスクリプトを実行する
$(document).ready(function(){
    $('.movie-slick').slick({
        slidesToShow: 1,       // 表示数を調整
        slidesToScroll: 1,     // スクロール数を調整
        infinite: false,       // スライドをループさせない
    });
});
</script>
