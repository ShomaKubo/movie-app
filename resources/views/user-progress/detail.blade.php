<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $user->name . __('Progress Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <table class="table table-hover table-striped mb-auto">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th class="w-25">{{ __('Movie Title') }}</th>
                        <th class="w-25">{{ __('Movie Watch State') }}</th>
                        <th class="w-25">{{ __('Movie Watch Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr v-for="movie in movies">
                        <td class="turn">{{ $movie->title }}</td>

                        @if(!is_null($movie->watched_movie_id))
                            <td class="text-center">視聴済み</td>
                            <td class="text-center">{{ $movie->watched_at }}</td>
                        @else
                            <td class="text-center">未視聴</td>
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</x-app-layout>
