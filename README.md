# Магазин амбассадоров VK

Проект выполнен для тестового задания на вакансию Бэкенд-разработчик (Стажировка 2023)

Были реализованы фронтенд и бэкенд: https://vkshop.ilkatkov.ru

Возможная схема прототипа API:

## Авторизованный пользователь (клиент) 

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

## Неавторизованный пользователь 

- GET api/category/{id} - просмотр категории
- GET api/product/{id} - просмотр товара
- POST api/login - авторизация
- POST api/register - регистрация 

## Авторизованный пользователь (администратор) 

### Товары
- UPDATE api/admin/product/{id} - изменение товара
- POST api/admin/product - добавление товара
- GET api/admin/product/{id} - просмотр товара
- DELETE api/admin/product/{id} - удаление товара 

### Категории
- UPDATE api/admin/category/{id} - изменение категории
- POST api/admin/category - добавление категории
- GET api/admin/category/{id} - просмотр категории
- DELETE api/admin/category/{id} - удаление категории 

### Заказы
- GET /api/admin/order/{id} - просмотр заказа
- UPDATE /api/admin/order/{id} - обновление заказа


