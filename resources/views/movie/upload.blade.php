<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Movie Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                
                <section class="body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="p-4">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div><label class="col-form-label col-form-label-lg text-white">タイトル</label></div>
                            <div>
                                <input class="text-black col-4" type="text" name="title">
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            <div class="mt-4"><label class="col-form-label col-form-label-lg text-white">サブタイトル</label></div>
                            <div>
                                <input class="text-black col-4" type="text" name="sub_title">
                                <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                            </div>
                            <div class="mt-4"><label class="col-form-label col-form-label-lg text-white">概要</label></div>
                            <div>
                                <textarea class="text-black" name="summary"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('summary')" />
                            </div>
                            <div class="mt-4"><label class="col-form-label col-form-label-lg text-white">チャプター</label></div>
                            <div>
                                <select class="text-black col-4" name="chapter">
                                @foreach(App\Models\Movie::CHAPTER as $i => $chapter)
                                  <option value="{{ $i }}">{{ $chapter }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mt-8"><label class="col-form-label col-form-label-lg text-white">動画ファイル</label></div>
                            <div><input type="file" id="movie" name="movie">
                                <x-input-error class="mt-2" :messages="$errors->get('movie')" />
                            </div>
                            <div class="mt-8"><label class="col-form-label col-form-label-lg text-white">サムネイル画像</label></div>
                            <div><input type="file" id="thumbnail" name="thumbnail">
                                <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                            </div>
                            <div class="mt-8"><x-primary-button>{{ __('Save') }}</x-primary-button></div>
                            </form>          
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
