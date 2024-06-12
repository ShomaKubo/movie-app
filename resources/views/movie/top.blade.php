<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Movie List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
                @foreach (App\Models\Movie::CHAPTER as $chapter)
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="pt-8 px-6 text-gray-900 text-xl">
                            {{ __($chapter) }}
                        </div>
                        <div class="flex flex-wrap -m-4 movie-slick w-fit">
                        @foreach($movies as $movie)
                            @if ($chapter == $movie->chapter)
                            <div class="lg:w-1/4 md:w-1/2 p-4">
                                <a class="block relative h-48 rounded overflow-hidden">
                                <img class="object-cover object-center w-full h-full block" src="{{ Storage::url($movie->thumbnail_path) }}">
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
                            @endif
                        @endforeach
                        </div>
                    </div>
                </section>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<script>
$('.movie-slick').slick({
    slidesToShow: 3,       // スライド表示数
    slidesToScroll: 1,     // 何枚スライドさせるか
    infinite: false,       // スライドをループさせない
    //autoplay: true,      // 自動ループ
    //autoplaySpeed: 3000, // 自動ループのスライド切り替え時間
});
</script>
