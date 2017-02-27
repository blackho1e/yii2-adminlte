# AdminLTE-Asset


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require blackho1e/adminlte-asset "*"
```

or add

```
"blackho1e/adminlte-asset": "*"
```

to the ```require``` section of your `composer.json` file.


## Usage

In view

```php
// @app/views/layouts/main.php

\blackho1e\adminlte\assets\AdminLteAsset::register($this);
// further code
```

or as a dependency in your app wide AppAsset.php

```php
// @app/assets/AppAsset.php

public $depends = [
    'blackho1e\adminlte\assets\AdminLteAsset',
    // more dependencies
];
```
