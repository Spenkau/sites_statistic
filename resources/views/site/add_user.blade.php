<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white m-0">
            {{ __('Добавить коллегу к сайту') }} <span>{{ $site->name }}</span>
        </h2>
    </x-slot>

    <details class="user-select-none">
        <summary>
            Детали сайта
        </summary>
        <ul class="list-group mb-4">
            <li>Адрес: <a href="{{ $site->url }}" class="link-dark">{{ $site->url }}</a></li>
            <li>Дата создания: {{ $site->created_at }}</li>
            <li>Комментарий: {{ $site->comment }}</li>
        </ul>
    </details>

    <hr>

    <form class="row g-3" id="search-user_form">
        <div class="col-auto">
            <label for="login" class="visually-hidden">Ник-нейм пользователя</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Ник-нейм">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Найти</button>
        </div>
    </form>

    <form class="d-flex justify-content-center align-items-center flex-column gap-5">
        <ul class="list-group">
            @if(!empty($users))
                @foreach($users as $user)
                    <li class="list-group-item">{{ $user->name }}</li>
                @endforeach
            @endif
        </ul>

        <button type="submit">Добавить</button>
    </form>

    <script async>
        const searchButton = document.getElementById('search-user-btn');
        const searchUserForm = document.getElementById('search-user_form');

        searchUserForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const formData = new FormData(searchUserForm);

            const queryString = new URLSearchParams(formData).toString();

            axios.get(`/user/?${queryString}`)
                .then((res) => console.log(res.data))
        })
    </script>
</x-app-layout>


