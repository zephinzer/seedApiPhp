# seedApiPhp
Seed project for a REST-ful API using the Slim framework for routing and PHPUnit for testing. 

This project has been successfully deployed on Ubuntu 14.04 LTS with Apache 2.4, PHP 5.4 and MySQL CE 5.16.

## Get Started
### Install dependencies with <a href='https://getcomposer.org/'>Composer</a>
```
php composer.phar install
```
This will install <a href='https://phpunit.de/'>PHPUnit</a> and <a href='http://www.slimframework.com/'>Slim</a>.

### Set Apache configuration
Direct a local address to the root folder where seedApiPhp was unzipped to.

### Edit template values
Access `bootstrap-config.php` and change all `[[value]]` fields accordingly.

## Longer Description
This is a work-in-progress. The objective of this project is a seed project which I can clone and quickly build a REST-ful API for a service-oriented architecture web application. To that extent, the only configuration required is of Apache, and for unique values such as database fields and hostname configurations. Development can begin by making a copy of the `/demo` folder and adding in code into the placeholders.
