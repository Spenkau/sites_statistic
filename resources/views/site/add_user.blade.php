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

    <div class="container row">
        <div class="col">
            <form class="row g-3" id="search-user_form">
                <div class="col-auto">
                    <label for="name" class="visually-hidden">Ник-нейм пользователя</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ник-нейм">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Найти</button>
                </div>
            </form>

            <ul id="users-list" class="list-group overflow-y-auto" style="height: 50vh">

            </ul>
        </div>

        <div class="col">
            <form
                id="add-collaborators_form"
                class="border-dark border-1 p-4
                        rounded-3 d-flex justify-content-center
                        align-items-center flex-column gap-5">
                <p class="text-center">Список пользователей на добавление в коллабораторы</p>
                <ul class="list-group d-flex flex-wrap" id="collaborators-list"></ul>

                <button type="submit">Добавить</button>
            </form>
        </div>
    </div>

    @section('script')
        <script async>
            const searchButton = document.getElementById('search-user-btn');
            const searchUserForm = document.getElementById('search-user_form');
            const usersList = document.getElementById('users-list');
            const collaboratorsList = document.getElementById('collaborators-list');
            const modal = document.getElementById('show-users-modal');
            const addCollaboratorsForm = document.getElementById('add-collaborators_form');

            const collaborators = [];

            searchUserForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const formData = new FormData(searchUserForm);

                const queryString = new URLSearchParams(formData).toString();

                axios.get(`/user/?${queryString}`)
                    .then((res) => {
                        const users = res.data;
                        usersList.innerHTML = renderUsers(users, 'search');
                        console.log(users)
                    })
            })


            usersList.addEventListener('click', (event) => {
                if (event.target.matches('.add-collaborator-btn')) {
                    const btn = event.target;
                    const input = btn.previousElementSibling

                    const userId = input.getAttribute('data-id');
                    const userName = input.getAttribute('data-name');

                    if (!collaborators.find(item => item.id === userId)) {
                        collaborators.push({
                            id: userId,
                            name: userName
                        })
                    }

                    collaboratorsList.innerHTML = renderUsers(collaborators, 'add')
                }
            })

            addCollaboratorsForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const userIds = [];

                collaborators.map((collaborator) => {
                    userIds.push(+collaborator.id)
                })

                if (userIds.length > 0) {
                    const siteId = {{ $site->id }};
                    axios.post(`/site/${siteId}/store-user`, {
                        'site_id': siteId,
                        'user_ids': userIds
                    })
                } else {
                    alert('Список пользователей пуст!')
                }
            })

            function renderUsers(users, aim) {
                let userListMarkup = '';

                switch (aim) {
                    case 'search':
                        if (users && users.length > 0) {
                            users.map((user) => {
                                userListMarkup += getSearchUsersMarkup(user);
                            })
                        }
                        return userListMarkup;
                    case 'add':
                        if (collaborators && collaborators.length > 0) {
                            collaborators.map((collaborator) => {
                                userListMarkup += getAddUsersMarkup(collaborator)
                            })
                        }
                }

                return userListMarkup;
            }

            const getSearchUsersMarkup = (user) => {
                return `
                <li class="list-group-item">
                    <p>Ник-нейм: ${user.name}</p>
                    <p>Почта: ${user.email}</p>
                    <input type="hidden" data-id="${user.id}" data-name="${user.name}" />
                    <button class="add-collaborator-btn btn btn-primary">Добавить в список</button>
                </li>
            `
            }

            const getAddUsersMarkup = (user) => {
                return `
                <li class="list-group-item d-flex text-center gap-3">
                    <p class="m-0">Ник-нейм: ${user.name}</p>
                    <button class="add-collaborator-btn btn btn-close"></button>
                </li>
            `
            }
        </script>
    @endsection
</x-app-layout>


