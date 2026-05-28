# Тестовое задание: блог на чистом PHP + Smarty + MySQL

## Требования к системе
- Windows, macOS или Linux
- Docker Desktop (установленный и запущенный)
- Git

## Быстрый старт

1. **Клонировать репозиторий**
    ```bash
    git clone <ссылка на ваш репозиторий>
    cd <папка проекта>

2. **Запустить контейнеры**

    ```bash
    docker-compose up -d
    Контейнеры: Nginx (порт 8080), PHP 8.1, MySQL (порт 3307), phpMyAdmin (порт 8085)

3. **Установить зависимости Composer**

    ```bash
    docker-compose exec php composer install
    
4. **Создать базу данных и наполнить тестовыми данными**

   ```bash
    docker-compose exec db mysql -u root -prootsecret < sql/schema.sql

    docker-compose exec db mysql -u root -prootsecret < sql/seeder.sql

5. **Открыть сайт**
    http://localhost:8080

**Доступные страницы**
    Главная – список категорий с 3 последними постами

    Страница категории – /category.php?id=1 (сортировка и пагинация)

    Страница статьи – /article.php?id=1 (похожие статьи, счётчик просмотров)

**Админка БД**
    phpMyAdmin: http://localhost:8085
    Сервер: db, Логин: bloguser, Пароль: secret

**Структура SCSS**
    scss/_variables.scss – переменные цветов, отступов

    scss/_mixins.scss – миксины для карточек, контейнеров

    scss/main.scss – основные стили и адаптив

**После изменения SCSS запустите компиляцию:**
```bash
    docker-compose exec php php bin/compile-scss.php

**Остановка**
    bash
    docker-compose down

**Примечание**
    Кэш Smarty и скомпилированные шаблоны хранятся в папках templates_c/ и cache/ – они не включены в репозиторий.

    Все настройки БД уже прописаны в docker-compose.yml, файл .env не требуется.