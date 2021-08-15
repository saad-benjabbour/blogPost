## CRUD PHP application:

A simple CRUD php application using a basic mvc framework from scratch in PHP with s secure login and registration process

## Project Structure:
```bash
|-- app
|   |-- config
|   |   `-- config.php
|   |-- controllers
|   |   |-- Pages.php
|   |   |-- Posts.php
|   |   `-- Users.php
|   |-- helpers
|   |   |-- image_uploading.php
|   |   |-- send_email.php
|   |   |-- session_helper.php
|   |   `-- verify_email.php
|   |-- libraries
|   |   |-- Controller.php
|   |   |-- Core.php
|   |   `-- Database.php
|   |-- models
|   |   |-- Post.php
|   |   `-- User.php
|   |-- require.php
|   `-- views
|       |-- Posts
|       |   |-- create.php
|       |   |-- details.php
|       |   |-- home.php
|       |   `-- update.php
|       |-- includes
|       |   |-- footer.php
|       |   |-- head.php
|       |   |-- head_.php
|       |   |-- header__.php
|       |   `-- navigation.php
|       `-- users
|           `-- login.php
|-- file
`-- public
    |-- css
    |   |-- bootstrap-datetimepicker.css
    |   |-- bootstrap-datetimepicker.js
    |   |-- style.css
    |   |-- style2.css
    |   `-- style3.css
    |-- img
    |   `-- profile
    |       |-- 1ebc77a526.jpg
    |       |-- 2e775d09fd.jpg
    |       `-- c0ff23202c.jpg
    `-- index.php

```
## Configuration:
the confifuration settings of this project are stored in the [app/config/config.php](https://github.com/saad-benjabbour/blogPost/blob/main/app/config/config.php) class. Default settings include database connection, and some global constants, you can your own configuration to fit your needs.

## Routing:
the app handles each and every of its urls using [app/libraries/Core.php](https://github.com/saad-benjabbour/blogPost/blob/main/app/libraries/Core.php) class it loads the controller and the method requested beside any additional parameters if exists.

```php
protected $currentController = 'Users'; // by default
    protected $currentMethod = 'login'; // by default
    protected $params = [];
```
the model and view for a specific action get loaded by [app/libraries/Controller](https://github.com/saad-benjabbour/blogPost/blob/main/app/libraries/Controller.php) class

## Controllers:
Controllers respond to user actions (by clicking a link, submitting a form...) they extend from [app/libraries/Controller](https://github.com/saad-benjabbour/blogPost/blob/main/app/libraries/Controller.php) class

## Views:
Views are used to display data (in html format). Views files go in the [app/views](https://github.com/saad-benjabbour/blogPost/tree/main/app/views)

## Models:
Models are used to get and store data in  your application. They contain methods used to retrieve data from the database. Modeles use an Database instance (db) 
a simple method to get all the available posts in the database:
```php
 // finding all the posts
    public function findAllPosts()
    {
        $this->db->query('SELECT * FROM posts ORDER BY created_at ASC');
        $results = $this->db->resultSet();
        return $results;
    }
```

## URLs access rules:
A group of .htaccess files to set these rules:
An [app/.htaccess](https://github.com/saad-benjabbour/blogPost/blob/main/app/.htaccess) which restrict the user from accessing the app folder
```.htaccess
Options -Indexes
```
An [public/.htaccess] redirect anything that doesn't exist to index.php which is the entry of the project.

```.htaccess
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  RewriteBase /examOnline/public
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

An [blogPost/.htaccess](https://github.com/saad-benjabbour/blogPost/blob/main/.htaccess)  will direct all requests to public folder (the only accessible folder by the user)

```.htaccess
<IfModule mod_rewrite.c>
  RewriteEngine on
  RewriteRule ^$ public/ [L]
  RewriteRule (.*) public/$1 [L]
</IfModule>
```

## Tools:
[PHP](https://www.php.net/): PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.

[bootstrap](https://getbootstrap.com/): for a quick design and customization of a responsive mobile-first sites.

[PHPComposer](https://getcomposer.org/): A Dependency Manager for PHP used for downloading needed packages for the application using the terminal.

[WampServer](https://www.wampserver.com/en/): WampServer is a Windows web development environment. It allows you to create web applications with Apache2, PHP and a MySQL database.


