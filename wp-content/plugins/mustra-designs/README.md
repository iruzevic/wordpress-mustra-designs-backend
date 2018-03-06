# Infinum WordPress Plugin Boilerplate

This repository contains all the tools you need to start building a modern WordPress plugin, using all the latest front end development tools.

## Who do I talk to?

For questions talk to:

* [ivan.ruzevic@infinum.hr](ivan.ruzevic@infinum.hr)
* [denis.zoljom@infinum.hr](denis.zoljom@infinum.hr)
* [team@eightshift.com](team@eightshift.com)

## It contains:

* Webpack3+ config and build for Front and Admin parts
* ES Linting
* Style Linting
* PHP Error Check
* WPCS Style Guide
* BrowserSync
* PostCSS with plugins
* Build and Prebuild Bash Script
* .gitignore
* Object oriented codebase
* Namespacing
* Autoloader
* ...

## Getting started
Follow the instructions:

## Development Pre Start
The script will install npm, composer dependencies and setup coding standards.

```
sh _setup.sh
```

## Development Start
Builds assets in watch mode using Webpack.

```
npm start
```

## Browser sync
We are using BrowserSync to sync assets and enable easy cross-device testing.
To set it up go to `webpack.config.js` and set `proxyUrl` variable to link of your local development.
It is tested on MAMP and Vagrant (VVV).

## Linting Assets (JS,SASS)
We are using Infinum [ES](https://www.npmjs.com/package/@infinumjs/eslint-config) and [Style](https://www.npmjs.com/package/@infinumjs/stylelint-config) linters. 
Lints JS and SASS using Webpack.

```
npm run precommit
```

## Linting PHP ##
We are using [Infinum coding standards for WordPress](https://github.com/infinum/coding-standards-wp) to check php files. There are some subtle differences between ours and WordPress coding standards like spaces vs tabs, 2 spaces vs 4 etc.

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
wpcs mustra_designs
```

Autofix plugin for minor violations:
```
wpcbf mustra_designs
```

## Build
Build creates public folder in plugin for all the assets.

Check for errors js, css, php but not WP standards

```
sh _prebuild.sh
```

Builds production ready assets

```
sh _build.sh
```

## Note
This means that for the plugin to work you need to have, at the minimum, php 5.3. Although we recommend that you use php 7 because of the performance benefits.

## Credits

Infinum WordPress Boilerplate is maintained and sponsored by
[Infinum](https://www.infinum.co).

<img src="https://infinum.co/infinum.png" width="264">

## License

Infinum WordPress Boilerplate is Copyright © 2017 Infinum. It is free software, and may be redistributed under the terms specified in the LICENSE file.
