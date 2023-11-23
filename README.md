# todo-app
Todo Web App on PHP (Symfony)
Simple ToDoList App
![image](https://github.com/meirbnb/todo-app/assets/76254028/ae31f21f-c19e-4d75-8c53-9815a4414b53)

Installation:
- clone the repo
- cd into the application directory
- run 'composer install'
- check .env file (tweak db configs if necessary)
- on the CLI run:
  - php bin/console doctrine:database:create
  - php bin/console make:migration
  - php bin/console doctrine:migrations:migrate
  - php bin/console doctrine:fixtures:load
  - php bin/console server:start (or run 'symfony server:start' - in case you have symfony-cli binary installed)
  - open the localhost:port (ex: 127.0.0.1:8000) url in your browser
  - test

TODO:
- add task edit functionality
- add csrf protection to forms (security issue)
- add frontend framework (vue.js or react.js) and make requests to endpoints dynamically (i.e w/o page reloading).
