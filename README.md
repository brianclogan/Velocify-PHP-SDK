# Velocify PHP SDK

Master Branch

[![Build Status](https://travis-ci.org/Colling-Media/Velocify-PHP-SDK.svg?branch=master)](https://travis-ci.org/Colling-Media/Velocify-PHP-SDK)

Dev Branch

[![Build Status](https://travis-ci.org/Colling-Media/Velocify-PHP-SDK.svg?branch=dev)](https://travis-ci.org/Colling-Media/Velocify-PHP-SDK)

Velocify PHP API - an easy to use version of the PHP Velocify API using GuzzleHTTP.

## Requirements

PHP 7.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/):

```
composer require collingmedia/Velocify-php-sdk
```


### Getting Started

Getting started is easy, you just have to pass the variables required to use the endpoints you want. For instance, the access token is not required if you are using the authorzation endpoints, but everything is required for any other request.

```php
<?php
$Velocify = new CollingMedia\Velocify\Velocify([
    'client_id' => '_YOUR_CLIENT_ID_',
    'client_secret' => '_YOUR_CLIENT_SECRET_',
    'redirect_uri' => '_YOUR_REDIRECT_URI_',
    'access_token' => '_YOUR_ACCESS_TOKEN_ARRAY_'
]);
```

### Authroization

Generate the URLs required, along with retreiving access tokens, and refreshing tokens.

#### Setup
```php
<?php
$Velocify = new CollingMedia\Velocify\Velocify([
    'client_id' => '_YOUR_CLIENT_ID_',
    'client_secret' => '_YOUR_CLIENT_SECRET_',
    'redirect_uri' => '_YOUR_REDIRECT_URI_',
]);
```

#### Generate Authroization URL
This will return the URL required to authroize a user, and redirect them back to your application
```php
$url = $Velocify->authorize()->getAuthorizationUrl();
```

#### Get Token from Response Code
This will exchange the code variable in the URL on a redirect from Velocify for an access token, verifying it against the `client_id`, `client_secret`, and `redirect_uri`.
```php
$code = $_GET['code'];
$token = $Velocify->authorize()->getToken($code);
```

#### Refresh Token
This will refresh the access token you have by sending the refresh code, and getting the response back.
```php
$refreshedToken = $Velocify->authorize()->refreshToken();
```


### Campaigns

Get, update, and delete campaigns.

#### Setup
```php
<?php
$Velocify = new CollingMedia\Velocify\Velocify([
    'client_id' => '_YOUR_CLIENT_ID_',
    'client_secret' => '_YOUR_CLIENT_SECRET_',
    'redirect_uri' => '_YOUR_REDIRECT_URI_',
    'access_token' => '_YOUR_ACCESS_TOKEN_ARRAY_',
]);
```

#### List All Campaigns
This will return all of the campaigns in Velocify, results are paginated.
```php
$campaigns = $Velocify->campaigns()->listCampaigns();
```

#### Get a Specific Campaign
This will return the campaign you specify by using the ID.
```php
$campaign = $Velocify->campaigns()->getCampaign($campaignId);
```


### Contacts

Get, update, and delete contacts.

#### Setup
```php
<?php
$Velocify = new CollingMedia\Velocify\Velocify([
    'client_id' => '_YOUR_CLIENT_ID_',
    'client_secret' => '_YOUR_CLIENT_SECRET_',
    'redirect_uri' => '_YOUR_REDIRECT_URI_',
    'access_token' => '_YOUR_ACCESS_TOKEN_ARRAY_',
]);
```

#### List All Contacts
This will return all of the contacts in Velocify, results are paginated.
```php
$campaigns = $Velocify->contacts()->listContacts();
```

#### Get a Specific Campaign
This will return the contact you specify by using the ID.
```php
$campaign = $Velocify->contacts()->getContact($contactId);
```
