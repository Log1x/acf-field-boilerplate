# ACF Field Boilerplate

[![Packagist](https://img.shields.io/packagist/v/log1x/acf-field-boilerplate.svg?style=flat-square)](https://packagist.org/packages/log1x/acf-field-boilerplate)
![CircleCI](https://img.shields.io/circleci/build/gh/Log1x/acf-field-boilerplate.svg?style=flat-square)
[![Packagist Downloads](https://img.shields.io/packagist/dt/log1x/acf-field-boilerplate.svg?style=flat-square)](https://packagist.org/packages/log1x/acf-field-boilerplate)

This is an ACF Field Type boilerplate to quickly make clean, well structured custom field types.

This is entirely based off of the original [acf-field-type-template](https://github.com/elliotcondon/acf-field-type-template) provided by the creator of ACF.

## Features

- [Laravel Mix](https://laravelmix.com) for handling assets.
- PSR-12 code style & linting
- Namespacing
- Cleaner DocBlocks
- Cleaner directory structure
- Field autoloader
- Ready to use alongside other Composer packages
- Attempt at a more DRY approach

## Requirements

Make sure all dependencies have been installed before moving on:

- [ACF](https://www.advancedcustomfields.com/pro/) >= 5.0
- [PHP](http://php.net/manual/en/install.php) >= 7.2
- [Composer](https://getcomposer.org/download/)
- [Yarn](https://yarnpkg.com/en/docs/install)

## Getting Started

Create a project using Composer:

```sh
$ composer create-project log1x/acf-field-boilerplate:dev-master my-field
```

## Field development

- Run `yarn install` from the field directory to install dependencies.
- Replace all instances of `Log1x/AcfFieldBoilerplate` with your namespace.
- Use `src/ExampleField.php` to get started.

### Build commands

- `yarn run build` — Compile and optimize the files in your assets directory
- `yarn run build:production` — Compile assets for production

## Bug Reports

If you discover a bug in ACF Field Boilerplate, please [open an issue](https://github.com/log1x/acf-field-boilerplate/issues).

## Contributing

Contributing whether it be through PRs, reporting an issue, or suggesting an idea is encouraged and appreciated.

## License

ACF Field Boilerplate is provided under the [MIT License](https://github.com/log1x/acf-field-boilerplate/blob/master/LICENSE.md).
