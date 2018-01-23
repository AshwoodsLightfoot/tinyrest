# Tiny Rest Router

*tiny-rest-router* is a simple library for PHP 5.6+.

Features

 - Readable HTTP Method Support (GET, PUT, POST, DELETE, HEAD, PATCH and OPTIONS)
 - Automatic Parsing
 - Automatic Classes and SubClasses usage

# Installation

## Composer

`tiny-rest-router` is PSR-0 compliant and can be installed using [composer](http://getcomposer.org/).  
Simply add `ashwoodslightfoot/tiny-rest-router` to your composer.json file.

    {
        "require": {
            "ashwoodslightfoot/tiny-rest-router": "*"
        }
    }

or use a console command:
`composer require "ashwoodslightfoot/tiny-rest-router:*"` in your site root folder.

# How to configure http server

Add a `rest` folder to your project root folder. Example: `/var/www/mysite/rest`.
Configure your http server to add route for `rest/index.php`.

## Apache

Make a file `.htaccess` in your `rest` folder

    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?path=$1 [NC,L,QSA]

## Nginx 

Add this part to your site configuration file.

    location /rest {
        rewrite ^/rest(.*)$ $1&$args break;
        try_files $uri $uri/ /rest/index.php?path=$uri&args;
    }



# How to use

See a simple example `YourSiteFolder/vendor/ashwoodslightfoot/tiny-rest-router/examples/rest/index.php`

See a class hierarchy `YourSiteFolder/vendor/ashwoodslightfoot/tiny-rest-router/examples/resources/v1`. 
The folder contains classes for RESTful API v1.

