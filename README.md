## Introduction

Blog site app that has features:
1. User Registration. 
2. User Login.
3. View Blogs.
4. Manage on your own Blog.

## Laravel & External Features
1. Breezer (Scaffolding of Auth. NOTE: just chop some of them, not entirely). 
2. Laravel built-in authentication.
3. Flowbite (Tailwind CSS support and easy to implement).
4. Blade Templates & Vite to load JS & CSS.
5. Policies for Authorization.
6. Controller-Service-Repository Pattern.
7. Migration & Seeding.

## Setup Project
1. Assume you already install NPM 10.2.3, Node v18.19.0 & Composer latest on your local machine.
2. Clone project on `https://github.com/ddewantaraq/blog-site-treasury`.
3. Run 
```
docker-composer up -d
composer install
npm install
php artisan migrate --seed
php artisan key:generate
```

#### Run Project
1. First you need at least two terminals.
2. On terminal 1, run `php artisan serve`.
3. On terminal 2, run `npm run dev`.
4. Open your browser and visit http://127.0.0.1:8000/ to run the web app.
5. Access for the user:
 ```
username: test_user
password: 123123123
```