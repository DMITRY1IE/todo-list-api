
    запуск проекта -  php artisan serve

 

    {
        "name":"дима",
        "email": "lozhkin3115@gmail.com",
        "password": "123456"
    }
    POST http://127.0.0.1:8000/api/register — регистрация пользователя.

    POST http://127.0.0.1:8000/api/login — логин и получение JWT-токена.

    GET  http://127.0.0.1:8000/api/me — получить информацию о текущем пользователе (нужен токен).

    POST http://127.0.0.1:8000/api/logout — выйти из системы (нужен токен).


    title - название
    description - описание
    due_date - дата
    is_completed - выполнено/не выполнено

    POST http://127.0.0.1:8000/api/tasks — создание задачи
    GET http://127.0.0.1:8000/api/tasks — получение списка задач с возможностью фильтрации is_completed=true/false
    PUT http://127.0.0.1:8000/api/tasks/{task} — обновление задачи
    DELETE http://127.0.0.1:8000/api/tasks/{task} — удаление задачи
