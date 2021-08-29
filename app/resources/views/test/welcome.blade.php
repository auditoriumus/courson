@extends('layouts.test')

@section('content')
    <div class="card">
        <div class="card-header">
            Аннотация
        </div>
        <div class="card-body">
            <h5 class="card-title">Тестовое задание</h5>
            <p class="card-text">Реализован web-интерфейс, а также api с аутентификацией.
                Используется архитектура REST.
                Затраченное время на выполнение - 4 часа. Для удобства необходимо в корневой директории запустить
                команду:</p>
            <div class="alert alert-primary" role="alert">
                docker-compose up -d
            </div>
            <div class="alert alert-warning" role="alert">
                <p>Необходимо войти в контейнер:</p>
                docker exec -it php bash
            </div>
            <div class="alert alert-primary" role="alert">
                php artisan migrate:fresh --seed
            </div>
            <div class="alert alert-secondary" role="alert">
                <p>login: admin@mail.ru</p>
                <p>password: admin@mail.ru</p>
            </div>
            <div class="alert alert-secondary" role="alert">
                Список контактов состоит из кликабельных строк таблицы, избранные контакты выделяются синим цветом.
                Отредактировать, удалить, а также сделать контакт избранным можно перейдя в подробный просмотр одного
                контакта (кликнуть на элемент общей таблицы). Добавление в избранное реализовано ajax-запросом нативным
                js.
                В таблице контактов не реализованы уникальные поля, так как этого не требовалось заданием, также
                пользователь может манипулировать и просматривать только свои контакты, в том числе и через API.
            </div>

            <p>Методы API:</p>
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Аутентификация</div>
                <div class="card-body">
                    <p class="card-text">
                    <p>POST http://localhost/api/login</p>
                    <p>Accept: application/json</p>
                    <p>Content-Type: application/json</p>

                    {
                    "email": "admin@mail.ru",
                    "password": "admin@mail.ru"
                    }
                    </p>
                </div>
                <div class="card-header">Возвращает токен</div>
            </div>

            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Получение всех контактов пользователя</div>
                <div class="card-body">
                    <p class="card-text">
                    <p>GET http://localhost/api/v1/contacts</p>
                    <p>Accept: application/json</p>
                    <p>Content-Type: application/json</p>
                    <p>Authorization: Bearer токен</p>
                    </p>
                </div>
                <div class="card-header">Возвращает контакты пользователя</div>
            </div>

            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Получение контакта пользователя по id</div>
                <div class="card-body">
                    <p class="card-text">
                    <p>GET http://localhost/api/v1/contacts/10</p>
                    <p>Accept: application/json</p>
                    <p>Content-Type: application/json</p>
                    <p>Authorization: Bearer токен</p>
                    </p>
                </div>
                <div class="card-header">Возвращает контакт</div>
            </div>

            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Сохранение контакта</div>
                <div class="card-body">
                    <p class="card-text">
                    <p>POST http://localhost/api/v1/contacts</p>
                    <p>Accept: application/json</p>
                    <p>Content-Type: application/json</p>
                    <p>Authorization: Bearer токен</p>

                    {
                    "name": "Имя",
                    "phone": "телефон"
                    }
                    </p>
                </div>
            </div>

            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Изменение контакта</div>
                <div class="card-body">
                    <p class="card-text">
                    <p>PUT http://localhost/api/v1/contacts/10</p>
                    <p>Accept: application/json</p>
                    <p>Content-Type: application/json</p>
                    <p>Authorization: Bearer токен</p>

                    {
                    "name": "Имя",
                    "phone": "телефон"
                    }
                    </p>
                </div>
            </div>

            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Удаление контакта</div>
                <div class="card-body">
                    <p class="card-text">
                    <p>DELETE http://localhost/api/v1/contacts/10</p>
                    <p>Accept: application/json</p>
                    <p>Content-Type: application/json</p>
                    <p>Authorization: Bearer токен</p>
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
