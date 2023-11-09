## Test task for Terra Force company

This task was performed as part of the selection for the position of Junior PHP developer! It is a crud web application written on Laravel platform using MySQL database, Docker and Javascript.

## To launch the application you will need
- run command "docker-compose up -d" to start the application container and run it
- if port conflicts occur, you can pause the local server and MySQL with these commands :
    "sudo systemctl stop nginx" and "sudo systemctl stop mysql" 
- After starting the containers, you need to do migrations! Firstly, you can get into our application container using this command:
 "docker exec -ti test_terraforce_laravel.test_1 bash", after that you can do migrations "php artisan:migrate"
- enter the 'localhost' URL and the application will start )

