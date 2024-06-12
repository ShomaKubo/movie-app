<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <table class="table table-hover table-striped mb-auto">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>名前</th>
                        <th>E-Mail</th>
                        <th>ロール</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr v-for="user in users">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">{{ $user->role == 'admin' ? '管理者' : '一般' }}</td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{ route('user-list.edit', ['id'=>$user->id]) }}" class="btn btn-info">編集</a>
                        </div>
                        </td>
                        <td>
                            <form action="{{ route('user-list.destroy', ['id'=>$user->id]) }}" method="POST">
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
