# ACF Field Boilerplate

[![Packagist](https://img.shields.io/packagist/v/log1x/acf-field-boilerplate.svg?style=flat-square)](https://packagist.org/packages/log1x/acf-field-boilerplate)
[![Packagist Downloads](https://img.shields.io/packagist/dt/log1x/acf-field-boilerplate.svg?style=flat-square)](https://packagist.org/packages/log1x/acf-field-boilerplate)

This is an ACF Field Type boilerplate to quickly make clean, well structured custom field types.

This is entirely based off of the original [acf-field-type-template](https://github.com/elliotcondon/acf-field-type-template) provided by the creator of ACF.

## Features

* [Laravel Mix](https://laravelmix.com) for handling assets.
* PSR-2 coding style
* Namespacing
* Cleaner DocBlocks
* Cleaner directory structure
* Attempt at a more DRY approach

## Requirements

Make sure all dependencies have been installed before moving on:

* [ACF](https://www.advancedcustomfields.com/pro/) >= 5.0
* [PHP](http://php.net/manual/en/install.php) >= 7.1.3
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)

## Boilerplate installation

Install ACF Field Boilerplate using Composer:

```
$ composer create-project log1x/acf-field-boilerplate:dev-master
```
## Field development

* Run `yarn` from the boilerplate directory to install dependencies

### Build commands

* `yarn run build` — Compile and optimize the files in your assets directory
* `yarn run build:production` — Compile assets for production

After you have your project created, simply go through and change the namespace to your field name and use the provided `fields/example.php` to quickly get started.
