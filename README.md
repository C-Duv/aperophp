AperoPHP
========

[![Build Status](https://secure.travis-ci.org/afup/aperophp.png?branch=master)](http://travis-ci.org/afup/aperophp)

Install
=======

Requirements
------------

* PHP 5.4
* MySQL
* Apache

Project have been builded and his production environment OS is a Debian Squeeze

Minimal installation
--------------------

* Clone project
* Install configuration
  * Copy app/config.php.dist to config.php
  * Update configuration for your installation (typically, database connexion)
* Install dependancies
    ```bash
    cd /path/to/project
    php composer.phar install
    ```
* Install and populate database
    ```bash
    app/console db:install
    app/console db:load-fixtures
    ```

To generate assets
------------------

In order to generate assets, you have to download npm [here](http://npmjs.org/ "npm official website").
Then, run the following command:

    npm install -g jshint recess uglify-js

You can now generate assets with:

    ./bin/assets.sh

Vhost example
-------------

    <VirtualHost *:80>
        DocumentRoot "/path/to/"
        ServerName www.aperophp.dev

        <Directory /path/to/web/>
            Options Indexes Includes FollowSymLinks -MultiViews
            AllowOverride All
            Order allow,deny
            Allow from all
 
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ index.php [QSA,L]    
        </Directory>
    </VirtualHost>

Comment participer
==================

[Comment participer ?](https://github.com/afup/aperophp/wiki/Comment-contribuer)

TODO
====

Nice to have
------------

* authentification avec des services tierces (Openid, Twitter, Google, Facebook, etc.) oui 
* mise en avant des membres AFUP
* mini-système de news pour le site
* lien avec les antennes locales de l'AFUP (pour Lyon, Nantes, Orléans, par exemple)
* accès et gestion directe depuis le back-office de l'AFUP

To add as issues ?
------------------

* Après connexion, devrait être loggé (vérifier si check email => si oui, mettre un message)
* Depot de commentaire : écran pas clair
* Si dépot de 2 commentaires dans la même action, texte du 1er commentaire affiché au 2nd affichage
