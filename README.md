This is My Interview Project

## How to install and run on your local system

1. git clone https://github.com/NovaSugiantara/interview-coding-assesment.git
2. cd laravel-vue-crud/
3. composer install
4. composer require laravel/ui
5. php artisan ui vue
6. npm install
7. cp .env.example .env
8. php artisan key:generate
9. Create your database
10. Add your database config in the .env file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[YOUR DATABASE NAME]
DB_USERNAME= [YOUR DATABASE USERNAME] or root
DB_PASSWORD= [YOUR DATABASE Password] or set it null
```

11. php artisan migrate

```
~ Migrates & Seed database from Modules
12. php artisan module:migrate
13. php artisan module:seed
```

13. npm run watch
14. php artisan serve
15. open http://127.0.0.1:8000 in browser
