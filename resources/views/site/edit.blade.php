<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Изменить сайт') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('site.update', $site->id) }}" class="m-auto w-50">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Название')"/>
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name', $site->name)"
                required
                autofocus/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- URL -->
        <div class="mt-4">
            <x-input-label for="url" :value="__('URL')"/>
            <x-text-input id="url" class="block mt-1 w-full"
                          type="text"
                          name="url"
                          :value="old('url', $site->url)"
                          required/>

            <x-input-error :messages="$errors->get('url')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="comment" :value="__('Комментарий')"/>
            <x-text-input
                id="comment"
                class="block mt-1 w-full"
                type="text"
                name="comment"
                :value="old('comment', $site->comment)"
                required
                autofocus/>
            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
        </div>

        <input type="hidden" name="site_id" value="{{ $site->id }}">

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-dark ms-3">
                {{ __('Изменить') }}
            </button>
        </div>
    </form>
</x-app-layout>
