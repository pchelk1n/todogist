[![Build Status](https://travis-ci.org/pchelk1n/todogist.svg?branch=master)](https://travis-ci.org/pchelk1n/todogist)

Todogist
========================

The simple Symfony demo application

Requirements
------------

https://symfony.com/doc/current/reference/requirements.html

Installation
------------

```bash
$ composer install
$ bin/console doctrine:database:create
$ bin/console doctrine:migrations:migrate
```

Usage
-----

```bash
$ bin/console server:run
```

Tests
-----

```bash
$ ./vendor/bin/simple-phpunit
```
