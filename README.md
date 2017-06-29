# GitLab DashBoard With Silex API

A simple and up to date Silex API to create a gitlab DashBoard and help you manage your team performance.

# Summary

* [Packages](#packages)
* [Docker container](#docker-container)
* [Executables](#executables)
* [Configuration](#configuration)
* [Directory structure](#directory-structure)
* [Tests](#tests)

# Packages

- Monolog
  - Monolog is a easy way to keep logs in your application, it's easy to use and is possible to create graphs to analyze better your logs.
- Doctrine
  - Database abstraction layer
- CORS
  - Add CORS validation into your API
- PHPDOTENV
  - Allow us to use **.env** files instead of static PHP files to store configurations
- Annotation
  - Uses annotation to create routes to be used in the application, you no longer need 
    a huge routes files
- Swagger
  - Easy way to document the API

# Docker container

Make sure to have the right permissions before start the API, follow
the table shown below to know which permission you should apply

|Path|Permission|Command|
|---|-----------|-------|
|storage/| Read and Write | chmod -R 777 storage/|

This API skeleton ships with a docker file to speed up your environment setup, basically you must have
docker installed in your machine and then run the following commands in your terminal

```
git clone https://github.com/Wiuu/gitdash.git 

cd docker && docker build . -t gitdash

docker run -d -v WHERE_YOUR_CLONED_DIRECTORY_IS:/var/www/html -p 80:80 gitdash
```

Obs: replace *WHERE_YOUR_CLONED_DIRECTORY_IS* with the absolute path where you've cloned
the repository.

Assuming that you've cloned the api in the directory **/var/www**, you'd have the following
docker statement

```
docker run -d -v /var/www:/var/www/html -p 80:80 acme-api
```

# Executables

This skeleton provides to you all executables need to run you tests for example or
to run the composer to install the dependencies, usually you must have those
installed in your machine but here it is easier as well.

|Executable|Description|
|----------|-----------|
|bin/codeception.phar  |  Executes all the existing tests|
|bin/composer.phar  |  Install all dependencies needed |
|bin/phpcs.phar  |   Execute the code sniffer to check the code quality |

### Running composer

Without a docker container running, you still can run composer. The example
bellow assumes that you're inside this repository folder.

```
php bin/composer.phar install
```

Therefore you probably don't want to install the composer in order to run it.
Here comes the docker container that we're using in this project, to run composer
inside the container just do:

```
docker run -it -v WHERE_YOUR_CLONED_DIRECTORY_IS:/var/www/html gitdash php /var/www/html/bin/composer.phar install -vvv -d /var/www/html
```

Obs: replace *WHERE_YOUR_CLONED_DIRECTORY_IS* with the absolute path where you've cloned
the repository.

Assuming that you've cloned the api in the directory **/var/www**, you'd have the following
docker statement

```
docker run -it -v /var/www:/var/www/html gitdash php /var/www/html/bin/composer.phar install -vvv -d /var/www/html
```

### Running phpcs

The codesniffer follows the same principle of the composer, you can run it without docker as the command above

```
php bin/phpcs.phar -h
```

Always prefer to use the container to run any command, this will prevent you a lot of environment issues

```
docker run -it -v WHERE_YOUR_CLONED_DIRECTORY_IS:/var/www/html gitdash php /var/www/html/bin/phpcs.phar /var/www/html/src
```

Obs: replace *WHERE_YOUR_CLONED_DIRECTORY_IS* with the absolute path where you've cloned
the repository.

Assuming that you've cloned the api in the directory **/var/www**, you'd have the following
docker statement

```
docker run -it -v /var/www:/var/www/html gitdash php /var/www/html/bin/phpcs.phar /var/www/html/src
```

### Running codeception

In order to run all tests created in the API, you can following two different approaches, the first is without docker

```
php bin/codecept.phar -h
```

The second is running codeception inside docker container

```
docker run -it -v WHERE_YOUR_CLONED_DIRECTORY_IS:/var/www/html gitdash php /var/www/html/bin/codecept.phar run -c /var/www/html -f
```

Obs: replace *WHERE_YOUR_CLONED_DIRECTORY_IS* with the absolute path where you've cloned
the repository.

Assuming that you've cloned the api in the directory **/var/www**, you'd have the following
docker statement

```
docker run -it -v /var/www:/var/www/html gitdash php /var/www/html/bin/codecept.phar run -c /var/www/html -f
```


#Configuration

Often we do need to define configurations to be used through the application,
to provide that in this skeleton we use the **.env** pattern. This pattern
allow us to define environment variables outside the project structure.

URL, database connection, log level are the most common configurations used
across the project.

The **env.example** inside this project has some default keys to be used, but to use them
you need first rename the file in the project root. To do that just run the following command
inside the project's folder

```
mv env.example .env
```

Now you're ready to go, of course you need to provide valid values to your application to work

```
DEBUG=true
ENV=development
URL=http://localhost:8000
APP_NAME=SILEX_API_SKELETON

DB_HOST=localhost
DB_USER=homestead
DB_PASSWORD=secret
DB_DATABASE=silex

EMAIL_HOST=smtp.mailtrap.io
EMAIL_USER=my_user
EMAIL_PASSWORD=my_password
EMAIL_ENCRYPTION=tls
EMAIL_PORT=465
EMAIL_AUTH=cram-md5
```

To get you going smooth into the skeleton, here goes what each of the variables inside the **.env** file means

|Key|Default value|Description|
|---|-------------|-----------|
|ENV| development | Define in which environment the application is running |
|URL| http://localhost | The absolute URL where the application is running |
|APP_NAME| SILEX_API_SKELETON | The name used by monolog, this name identifies the application in the log files |
|DEBUG| true | When true enables the debug logging |
|DB_HOST| localhost | Where your database is located |
|DB_USER| homestead | The user name to access the database |
|DB_PASSWORD| secret| The password needed to access the database |
|DB_DATABSE| silex | The database which the application talks to |

# Directory structure

In this section you can know more about the structure being used

```
|__bin                           # executables
    |__ codecept.phar            #
    |__ composer.phar            #  
    |__ phpcs.phar               #
|__resources                     # The resources folder is the right place to add configurations, sql scripts, or other possible "assets" of the project            
   |_ config                     #
   |_sql                         #
|__src                           # source of your application, you should store all your custom classes here
|__storage                       # stores files generated by the application
      |__ cache                  # store cache files
      |__ logs                   # store logs files
|__tests                         #
     |__acceptance               # acceptance folder test
     |__functional               # functional folder test
     |__unit                     # unit folder test
|__web                           # public directory where all the request come from

```

# Tests

This project uses the [codeception](http://codeception.com/) framework to run the tests. Codeception is a easy
and a complete solution to run unit, function and acceptance test all at once and with one tool.


#Executing migration

By default the migrations are run when the container is load, but to execute again or create a new migration please
use this commands :

to create :

```
./vendor/bin/mongo-migrator create MigrationName
```

to execute :

```
./vendor/bin/mongo-migrator migrate
```

to more details : https://github.com/kurlltd/silex-doctrine-migrations-provider