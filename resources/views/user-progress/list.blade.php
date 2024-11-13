<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('User Progress List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <table class="table table-hover table-striped mb-auto">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th class="w-25">{{ __('User Id') }}</th>
                        <th class="w-25">{{ __('Name') }}</th>
                        <th class="w-25">{{ __('Progress') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr v-for="user in users">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="text-center">{{ $user->watch_count . ' 本視聴済み / 全 ' . $movie_count . ' 本' }}</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ route('user-progress.detail', ['id'=>$user->id]) }}" class="btn btn-info">詳細</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</x-app-layout>
