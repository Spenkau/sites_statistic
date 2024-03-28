import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

// TODO в site to user находятся все возможные каналы
// TODO как обрабатывать ошибки по типу "такая страница сайта уже сущесвтует"? Валидация через FormRequest
// TODO нужно ли в pages user_id. Допустим, как получить почту юзера чья pages отвалилась? User_id в pages не нужен. Будет всё через сущность Site
// TODO как сохранять деталь и уведомление одновременно? Как и задумал
// TODO сделать доступ к сайту для других пользователей
// TODO настроить консольный роутинг
// TODO ПОЧТУ ЧЕРЕЗ dashemail smtp протокол

// QUESTIONS
// Внедрять в джоб сервис лучше через конструктор или с помощью app(serviceName)

// TODO сделать фильтрацию (найти способ) моделей наследующих BaseRepository
// TODO порефакторить код, нагнать стили на блейды и пофиксить все баги
