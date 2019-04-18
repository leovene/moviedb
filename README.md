# moviedb

### Project architecture

The project consists in two docker images, one for back-end and front-end and another for mysql databases, 
but this is how I built this project only to resolve this solution with that time

* Myapp docker image
    * Latest PHP docker image to run laravel
    * Compose to install dependencies
* Mysql docker images
    * Latest mysql docker image
* Backend
    * Laravel for backend, I choose laravel because I wanted show how to use laravel to create APIs
    and laravel is a powerful framework and I think laravel is a productive framework.
* Front-end
    * Vue for frontend, I choose vue because I like how Vue organize components and I think Vue
    a powerful frontend framework, it is light, easy to start and it has a good integration with laravel
    
    
### About the project

Sometimes I prefer to use node js in the backend, I think node has few dependencies do create an image in docker.
I chose laravel because I tried to show how are my skills in php.
The solution has one unit test that try to make a request on moviedb api. 
The upcoming movies was feed in a mysql storage to show how laravel can handle with other docker images and how Can I use mysql.
Other movies make requests straight to movie API to show how laravel can handle with requests.
Finally, the project has a laravel-docker file with instructions to create a image that can run laravel 
and a docker-compose file to manage this one and a mysql docker image.

### Commands to run the project

1 - docker-compose up -d  
2 - docker-compose run myapp php artisan migrate --seed

## # Third-party libraries

* Frontend - Installed via NPM
    * vuetify - It's an extension for vue tha can be helpful to create material components 
    * axios - It's an extesion to make requests with vue
    * vue-router - It's an extension to create routes for pages in vue
* Backend - Installed via composer
    * guzzlehttp/guzzle - Package to make requests in laravel
    * barryvdh/laravel-cors - Package to allow cross origin requests
* Docker
    * docker-compose - tool that can manages many containers

### Command to stop the project

1 - docker-compose stop
