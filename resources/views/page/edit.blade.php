<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white m-0 py-3">
            {{ __('Изменить страницу') }}
        </h2>
    </x-slot>

    <form
        method="POST"
        action="{{ route('site.page.update', ['site' => $site, 'page' => $page]) }}"
        class="m-auto w-50">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <x-input-label for="url" :value="__('URL')"/>
            <x-text-input id="url" class="block mt-1 w-full"
                          type="text"
                          name="url"
                          :value="old('url', $page->url)"
                          required/>

            <x-input-error :messages="$errors->get('url')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="threshold_speed" :value="__('Порог')"/>
            <x-text-input
                id="threshold_speed"
                class="block mt-1 w-full"
                type="text"
                name="threshold_speed"
                :value="old('threshold_speed', $page->threshold_speed)"
                required
                autofocus/>
            <x-input-error :messages="$errors->get('threshold_speed')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="comment" :value="__('Комментарий')"/>
            <x-text-input
                id="comment"
                class="block mt-1 w-full"
                type="text"
                name="comment"
                :value="old('comment', $page->comment)"
                required
                autofocus/>
            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-dark ms-3">
                {{ __('Изменить') }}
            </button>
        </div>
    </form>
</x-app-layout>
