<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>E-Mail</th>
                        <th>ロール</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr v-for="user in users">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == 'admin' ? '管理者' : '一般' }}</td>
                        <td class="text-right">
                        <a href="{{ route('user-list.edit', ['id'=>$user->id]) }}" class="btn btn-info">編集</a>
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
