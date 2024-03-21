<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создание страницы') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('site.page.store', ['site' => $site]) }}" class="m-auto w-50">
        @csrf
        @method('POST')

        <!-- Name -->
        <div>
            <x-input-label for="url" :value="__('URL')"/>
            <x-text-input
                id="url"
                class="block mt-1 w-full"
                type="text"
                name="url"
                :value="old('name')"
                required
                autofocus/>
            <x-input-error :messages="$errors->get('url')" class="mt-2"/>
        </div>

        <!-- URL -->
        <div class="mt-4">
            <x-input-label for="threshold_speed" :value="__('Порог')"/>
            <x-text-input id="threshold_speed" class="block mt-1 w-full"
                          type="text"
                          name="threshold_speed"
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
                :value="old('comment')"
                required
                autofocus/>
            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
        </div>

        <input type="hidden" name="site_id" value="{{ $site }}">

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-dark ms-3">
                {{ __('Создать') }}
            </button>
        </div>
    </form>
</x-app-layout>
