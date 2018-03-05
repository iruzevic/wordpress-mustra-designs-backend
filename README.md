# Mustra-designs WordPress

## Getting started

First you need to install WordPress locally, using any of the local development environment you prefer. You can use XAMPP, MAMP, WAMP, VVV, Docker or Laravel Valet.


## Development Pre Start
Run this to setup WordPress on the server.
The script will install npm and composer dependencies, install the latest version of WordPress and set the current theme as active.

```
sh _setup.sh
```

## Development Start
Builds assets in watch mode using Webpack.

```
npm start
```

## Linting Assets (JS,SASS)
Lints JS and SASS using Webpack

```
npm run precommit
```

## Linting PHP ##
We are using [Infinum coding standards for WordPress](https://github.com/infinum/coding-standards-wp) to check php files.

To install it, you need to install [Composer](https://getcomposer.org/) first.

* Add this aliases to you bash config:

```
alias phpcs='vendor/bin/phpcs';
alias phpcbf='vendor/bin/phpcbf';
alias wpcs='phpcs --standard=vendor/infinum/coding-standards-wp/Infinum';
alias wpcbf='phpcbf --standard=vendor/infinum/coding-standards-wp/Infinum';
```
* Reload terminal

Checking plugin for possible violations:
```
wpcs wp-content/plugins/mustra-designs
```

Autofix plugin for minor violations:
```
wpcbf wp-content/plugins/mustra-designs
```

## Build
Build creates public folder in plugin all the assets.

Check for errors js, css, php but not WP standards

```
sh _prebuild.sh
```

Builds production ready assets

```
sh _build.sh
```

## Import & Export
Details are located in the `README-project.md` file. Be sure to change the URL according to your project.

## Note
* This plugin uses OOP with namespaces and autoloader. Also we have included `ci-exclude.txt` file, to point what files to exclude when deploying using continuous integration.

