# Магазин амбассадоров VK

## О проекте

Проект выполнен для тестового задания на вакансию Бэкенд-разработчик (Стажировка 2023)

Реализовал прототип интернет-магазина «Магазин амбассадоров VK» с помощью фреймворка Laravel на PHP. 

В процессе работы над заданием реализовал возможности веб-сайта (70% фронтенд и бэкенд)
интернет-магазина:

- Выбор города
- Регистрация
- Авторизация
- Дерево каталога
- Хлебные крошки
- Просмотр карточки товара
- Корзина
- Добавление товара в корзину
- Подтверждение заказа в корзине
- Просмотр заказов в личном кабинете пользователя
- Редактирование информации пользователя в личном кабинете
- Просмотр списка складов в городе

На работающий интернет-магазин можно зайти по ссылке: https://vkshop.ilkatkov.ru

## База данных

Была использована СУБД MySQL, дамп таблицы лежит в корне проекта vkShopTest.sql

## Возможный прототип API

### Авторизованный пользователь (клиент) 

- GET api/category/{id} - просмотр категории
- GET api/product/{id} - просмотр товара
- POST api/login - авторизация
- POST api/register - регистрация 

- POST api/logout - выход из аккаунта
- GET api/account - просмотр профиля
- UPDATE api/account изменить профиль
- POST api/product/{id} - добавить товар в корзину
- GET api/cart - посмотр корзины
- POST api/cart - оформление заказа 

### Неавторизованный пользователь 

- GET api/category/{id} - просмотр категории
- GET api/product/{id} - просмотр товара
- POST api/login - авторизация
- POST api/register - регистрация 

### Авторизованный пользователь (администратор) 

#### Товары
- UPDATE api/admin/product/{id} - изменение товара
- POST api/admin/product - добавление товара
- GET api/admin/product/{id} - просмотр товара
- DELETE api/admin/product/{id} - удаление товара 

#### Категории
- UPDATE api/admin/category/{id} - изменение категории
- POST api/admin/category - добавление категории
- GET api/admin/category/{id} - просмотр категории
- DELETE api/admin/category/{id} - удаление категории 

#### Заказы
- GET /api/admin/order/{id} - просмотр заказа
- UPDATE /api/admin/order/{id} - обновление заказа


