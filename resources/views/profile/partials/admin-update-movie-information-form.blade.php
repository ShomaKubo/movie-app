<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Movie Information Edit') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('movie-list.update', ['id'=>$movie->id]) }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Movie Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full text-black" :value="old('title', $movie->title)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="sub_title" :value="__('Movie Sub Title')" />
            <x-text-input id="sub_title" name="sub_title" type="text" class="mt-1 block w-full text-black" :value="old('sub_title', $movie->sub_title)" />
            <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
        </div>

        <div>
            <x-input-label for="summary" :value="__('Movie Summary')" />
            <x-textarea-input id="summary" name="summary" class="mt-1 block w-full text-black" :value="old('summary', $movie->summary)" />
            <x-input-error class="mt-2" :messages="$errors->get('summary')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
