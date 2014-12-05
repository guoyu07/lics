# lics

lics is a lightweight [Calibre](http://calibre-ebook.com/) server baked with [CakePHP](http://cakephp.org/) that makes your e-book collection accessible through the web. It is equipped with a responsive web interface based on [Bootstrap](http://getbootstrap.com/), created with e-ink screens in mind.

## Features

* Browse, search and download books from your library
* Decent usability and readability for e-ink devices
* Easy installation on low-end NAS systems

## Demo

[lics.slauth.de](http://lics.slauth.de/) (user `admin`, password `admin`)

## Installation

Put the whole stuff in a directory served by your web server and configure the full path to your local Calibre library in `app/Config/database.php`. The default password for user `admin` is `admin`. This can be changed once logged in.

## To do

* scale covers to thumbnails and cache them
* improve search
* add simple user management

## Alternatives

* [BicBucStriim](https://github.com/rvolz/BicBucStriim)
* [calibre2opds](http://calibre2opds.com/)
