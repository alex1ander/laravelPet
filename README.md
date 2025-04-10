# LaravelPet

Это проект на Laravel для управления подписками и планами.

## Установка и запуск

1. Клонируйте репозиторий на свой локальный компьютер:
    ```bash
    git clone https://github.com/alex1ander/laravelPet.git
    ```
   
2. Перейдите в директорию проекта и установите все зависимости с помощью Composer:
    ```bash
    cd laravelPet
    composer install
    ```

3. Установите все необходимые зависимости для фронтенда с помощью NPM:
    ```bash
    npm install
    ```

4. Установите MySQL:
    ```bash
    sudo apt update
    sudo apt install mysql-server
    ```

5. Войдите в MySQL с правами администратора:
    ```bash
    sudo mysql -u root -p
    ```

6. Создайте нового пользователя и предоставьте ему доступ к базе данных:
    ```sql
    CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'your_password';
    
    GRANT ALL PRIVILEGES ON laravel_pet.* TO 'laravel_user'@'localhost';
    FLUSH PRIVILEGES;
    ```

7. Настройте параметры подключения к базе данных. Откройте файл `.env` в корне проекта и замените параметры подключения к базе данных:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_pet
    DB_USERNAME=laravel_user
    DB_PASSWORD=your_password
    ```

8. Запустите встроенный сервер Laravel:
    ```bash
    php artisan serve
    ```
   Сервер будет доступен по адресу `http://127.0.0.1:8000`.

9. Для работы с шифрованием и сессиями Laravel необходимо сгенерировать ключ:
    ```bash
    php artisan key:generate
    ```

10. Примените миграции для создания всех необходимых таблиц в базе данных:
    ```bash
    php artisan migrate
    ```

11. Запустите сидеры для заполнения базы данных начальными данными (например, планами и пользователями):
    ```bash
    php artisan db:seed
    ```

