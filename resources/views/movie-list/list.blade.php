<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Movie List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <table class="table table-hover table-striped mb-auto">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th class="w-20">タイトル</th>
                        <th class="w-20">サブタイトル</th>
                        <th class="w-25">概要</th>
                        <th class="w-20">チャプター</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr v-for="movie in movies">
                        <td class="turn">{{ $movie->title }}</td>
                        <td class="turn">{{ $movie->sub_title }}</td>
                        <td class="turn">{{ $movie->summary }}</td>
                        <td class="text-center">{{ $movie->chapter }}</td>
                        <td>
                            <form action="{{ route('movie-list.destroy', ['id'=>$movie->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか？")'>削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</x-app-layout>
