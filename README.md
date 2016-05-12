# CSCI E-15: P4
**By Michael Shull**

**[mshull@g.harvard.edu](mailto:mshull@g.harvard.edu)**

## Live URL
[https://p4.shullworks.com](https://p4.shullworks.com)

## Description
For my P4 project I decided to create a CRM system that can be used for lawyers. The project consists of a login system, a dashboard with search functionality, an in-depth case management system which allows you to edit case details via AJAX, add tasks, add notes, upload files, and view additional case details. The goal is to allow a lawyer to import leads via an API and give them the ability to manage those leads into cases and administrate the case throughout it's existance in a simple administration tool. To create this system I used a variety of tools in Laravel which include Controllers, Models with Relationships, many migration files, a few migration seeds.

## Demo
[https://youtu.be/1Ud_FMfQkbU](https://youtu.be/1Ud_FMfQkbU)

## Details for Teaching Team

1. To download an run this code you will need to first add your .env file and update your database settings.

2. Once your database is setup you will need to chmod 777 the storage and bootstrap/cache directories.

3. Next you will want to change the routes.php file and change the subdomain configuration to match your subdomain.

4. Finally you will want to clear your compiled classes and run the migrations tool. I used the following (composer dump-autoload, php artisan clear-compiled, php artisan optimize, php artisan migrate:refresh --seed)

5. You will now need to wait as the migration takes hold and the data is seeded into the system.

## Outside Code

1. This project uses the [Bootstrap framework](http://getbootstrap.com) as it's front-end foundation. 

2. This project uses over 22 vendor libraries, primarily for roles and form helpers.

3. A bootstrap template was purchased from ThemeForest and then heavily modified for this project.

4. The theme for this project using many (many, many) CSS and Javascript libraries.
