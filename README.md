# Spotify API Connect for PHP

[![Build Status](https://travis-ci.com/wesolowski/spotify-api-connect.svg?branch=master)](https://travis-ci.com/wesolowski/spotify-api-connect)
[![codecov](https://codecov.io/gh/wesolowski/spotify-api-connect/branch/master/graph/badge.svg)](https://codecov.io/gh/wesolowski/spotify-api-connect)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wesolowski/spotify-api-connect/badges/quality-score.png)](https://scrutinizer-ci.com/g/wesolowski/spotify-api-connect)

This is a Wrapper for [Spotify Web API PHP](https://github.com/jwilsson/spotify-web-api-php)


## Requirements
* PHP 7.2 or later.
* PHP [cURL extension](http://php.net/manual/en/book.curl.php) (Usually included with PHP).


## Start

Add ENV-Variable:

CLIENT_ID = ###my_client_id###  
CLIENT_SECRET = ###my_client_secret###  
REDIRECT_URI = ###my_redirect_uri###  
REFRESH_TOKEN = ###my_refresh_token###  

You can set the Env-Variable with this packages: [PHP dotenv](https://github.com/vlucas/phpdotenv) or [Symfony DotEnv](https://github.com/symfony/dotenv) 
or manual in your application `$_ENV['CLIENT_ID']=CLIENT_ID`

#### Factory 

Factory-Class `SpotifyApiConnectFactory` give you access to main function

First you should set `CLIENT_ID`, `CLIENT_SECRET`, `REDIRECT_URI` ENV-Variable.  
REDIRECT_URI is you application URL  

For Redirect-Url pleas use this class: `SpotifyApiConnect\Application\SpotifyWebApiPhp\Session`   
-> Factory: `(new SpotifyApiConnectFactory)->createSpotifyApiAuth()`   


Here is a Symfony example: <https://github.com/wesolowski/symfony-spotify-playlist-update/blob/master/src/Component/Token/Communication/Controller/Token.php> 

When you get a Refresh Token pleas save this in `$_ENV['REFRESH_TOKEN']`

