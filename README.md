# Velocify PHP SDK

Master Branch

[![Build Status](https://travis-ci.org/darkgoldblade01/Velocify-PHP-SDK.svg?branch=master)](https://travis-ci.org/darkgoldblade01/Velocify-PHP-SDK)

Dev Branch

[![Build Status](https://travis-ci.org/darkgoldblade01/Velocify-PHP-SDK.svg?branch=dev)](https://travis-ci.org/darkgoldblade01/Velocify-PHP-SDK)

Velocify PHP API - an easy to use version of the PHP Velocify API using GuzzleHTTP.

## Requirements

PHP 7.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/):

```
composer require darkgoldblade01/velocify
```


### Getting Started

Getting started is easy, you just have to pass the variables required to use the endpoints you want. For instance, the access token is not required if you are using the authorzation endpoints, but everything is required for any other request.

```php
<?php
$velocify = new darkgoldblade01\Velocify\Velocify([
    'username' => '_YOUR_USERNAME_',
    'password' => '_YOUR_PASSWORD_',
]);
```


### Leads

Get, update, and delete leads.

#### Setup
```php
<?php
$velocify = new darkgoldblade01\Velocify\Velocify([
    'username' => '_YOUR_USERNAME_',
    'password' => '_YOUR_PASSWORD_',
]);
```

#### List All Leads
This will return all of the contacts in Velocify, based on the `$startDate` and `$endDate`.
```php
$campaigns = $velocify->leads()->listLeads($startDate, $endDate);
```
