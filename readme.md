Pastiche
========

## Introduction
Pastiche is an online artwork community developed using the [Laravel](http://github.com/laravel/laravel "Laravel on GitHub") PHP Framework.

With Pastiche, you can easily share your digital artwork online. Users can upload their artworks, appreciate and give comments, and follow their favorite artists.

Pastiche is currently in its development and testing period.


## Requirements
#### Install Composer
[Download](https://getcomposer.org/Composer-Setup.exe "Get Composer") and install composer on your machine.

#### Install Laravel
With composer installed, run the following command in your terminal:
```
composer global require "laravel/installer=~1.2"
```
Next, add laravel to your path. Path is found in System Properties, Advanced System Settings, Environment Variables, System Variables, Path. Click edit, and add the following:
```
%appdata%\Composer\vendor\bin;
```

#### Install GitHub
Are you kidding me?

## Project Setup
#### Install Project
[Clone](github-windows://openRepo/https://github.com/outlime/app-lara-test-8 "Clone")  this repository to your machine.
Install the project dependencies by running<sup>[1](#footnote1)</sup> the following command:
```
composer install
```

#### Configure Environment
Inside your project folder, you can find a `.env` (environment) file. Open it and set up the variables below with their corresponding values. Please note that the values given below are default values. You may need to change them accordingly if you need to.
```
DB_HOST=localhost
DB_DATABASE=pastichedb
DB_USERNAME=root
DB_PASSWORD=
```
If you wish to test the different login APIs used in this application, you need to setup the variables below accordingly. Check the [Github](https://github.com/settings/developers), [Google](https://console.developers.google.com/) and [Facebook](https://developers.facebook.com/) developer pages to set up these values.
```
GITHUB_CLIENT_ID=
GITHUB_SECRET=
GITHUB_REDIRECT=

FACEBOOK_CLIENT_ID=
FACEBOOK_SECRET=
FACEBOOK_REDIRECT=

GOOGLE_CLIENT_ID=
GOOGLE_SECRET=
GOOGLE_REDIRECT=
```

#### Create Database
Create a database in `localhost/phpmyadmin`. Name the database `pastichedb` (preferred but not required). Finally, run<sup>[1](#footnote1)</sup> the following command:
```
php artisan migrate
```

## Developing<sup>[2](#footnote2)</sup>
#### Running the Project
To run the project, run<sup>[1](#footnote1)</sup> the following command:
```
php -S 127.0.0.1:8888 -t public
```
Open your browser and go to `127.0.0.1:8888`.

#### Project Directories
 File                | Directory         
:--------------------|:------------
 User Views          | `resources\views`
 Styles              | `public\css`
 Scripts             | `public\js`

#### URLs<sup>[3](#footnote3)</sup>

 Page                | URL         
:--------------------|:------------
 Home/Dashboard      | `127.0.0.1:8888`
 Login               | `127.0.0.1:8888/login`
 Register            | `127.0.0.1:8888/register`
 User Profile        | `127.0.0.1:8888/{username}`
 Post                | `127.0.0.1:8888/{username}/posts/{post-id}`
 Logout              | `127.0.0.1:8888/logout`

#### Views
Laravel uses a special templating engine for its views. Thus, when creating a new view always save with an extension of `.blade.php`.

The main template for all views is `home.blade.php`

To add a new CSS file:
```
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
```
To add a new JS file:
```
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
```
To add a comment:
```
{{-- This is a comment --}}
```

## FAQ
#### Composer installer asks for a php.exe file. Where is it found?
For WAMP, it is found in `C:\wamp\bin\php\php5.5.12`.

#### When I run a php artisan command, the keyword artisan is not recognized
You are not running the command in your project directory.

#### Why do I not have a .env file?
If you already did `composer install`, you may have to manually make your own by running<sup>[1](#footnote1)</sup> the following commands:
```
copy .env.example .env
php artisan key:generate
```

#### I am experiencing SQL errors
Your WAMP isn't turned on or isn't configured correctly.

#### I am experiencing a TokenMismatchException
Your session has expired. Reload the page.

#### I have many more questions about Laravel
There is a search engine invented in 1998 called Google.


## Project Contributors
#### Project Manager
* [Czarina Salvador](http://github.com/czawena)

#### Quality Assurance
* [Jhomar Galsim](http://github.com/GALSIM23)

#### Frontend Developers
* [Paula Tuazon](http://github.com/paulavinia)
* [Rae Pascual](http://github.com/heyraeee)

#### Backend Developers
* [Emman Cantoria](http://github.com/airotnac)
* [Emil Matubis](http://github.com/outlime)



## References
* <http://laravel.com/docs/5.1>
* <http://cheats.jesse-obrien.ca/>
* <http://laracasts.com/series/laravel-5-fundamentals>

## Footnotes
<a id="footnote1">1</a>. Open a terminal in your project directory
<br>
<a id="footnote2">2</a>. Guide for frontend developers only
<br>
<a id="footnote3">3</a>. Will be changed to a real domain when released to production
<br>
<br>
<br>
---
*This readme is written by [Emil](http://github.com/outlime). Need more help? Contact me.*
