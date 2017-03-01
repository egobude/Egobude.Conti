[![Latest Stable Version](https://poser.pugx.org/egobude/conti/v/stable)](https://packagist.org/packages/egobude/conti)
[![Latest Unstable Version](https://poser.pugx.org/egobude/conti/v/unstable)](https://packagist.org/packages/egobude/conti)
[![Total Downloads](https://poser.pugx.org/egobude/conti/downloads)](https://packagist.org/packages/egobude/conti)
[![License](https://poser.pugx.org/egobude/conti/license)](https://packagist.org/packages/egobude/conti)
[![Monthly Downloads](https://poser.pugx.org/egobude/conti/d/monthly)](https://packagist.org/packages/egobude/conti)

conti - Utility for your docker development environment
=================== 

```conti``` helps you to interact with your docker development environment. It provides some useful commands to speed up your development based on docker containers. 

## Installation

To install ```conti``` you just have to execute the following command:

```
composer require egobude/conti
````

Then you can call it via 

```
vendor/bin/conti
```

## Usage

### Default usage:

```
vendor/bin/conti help
```

### Flow Framework usage:

```
bin/conti help
```

## Setup your project

Open a shell and run according to the setup ```bin/conti install docker.dev```

Use any domain name, but you need to have your DNS setup correctly to point the this domain name to the VM main ip address. Then you can start your containers via ```bin/conti up # shortcut to docker-compose up -d```

Use ```bin/conti help``` to list all available commands. 

## General tips

### Use custom images

If you want to use custom images you can override them via env variable. The following env variables are available:

* CONTI_IMAGE_MARIADB, [zeroboh/mariadb:10.1-debian-jessie](https://hub.docker.com/r/zeroboh/mariadb/tags/)
* CONTI_IMAGE_NGINX, [zeroboh/nginx:1.11-alpine](https://hub.docker.com/r/zeroboh/nginx/tags/)
* CONTI_IMAGE_PHP, [zeroboh/php:7.1-fpm-alpine](https://hub.docker.com/r/zeroboh/php/tags/)
* CONTI_IMAGE_COMPOSER, [composer/composer:1-php5-alpine](https://hub.docker.com/r/composer/composer/tags/)

### How to dump your database?

```
bin/conti mysqldump # save the sqldump into the volume ./mysql_backup folder
```
