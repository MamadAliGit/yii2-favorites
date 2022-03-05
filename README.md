Installation
============

[![Latest Stable Version](https://img.shields.io/packagist/v/mamadali/yii2-webhook.svg)](https://packagist.org/packages/mamadali/yii2-webhook)
[![Total Downloads](https://img.shields.io/packagist/dt/mamadali/yii2-webhook.svg)](https://packagist.org/packages/mamadali/yii2-webhook)


The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist mamadali/yii2-favorites "*"
```

or add

```
"mamadali/yii2-favorites": "*"
```

to the require section of your `composer.json` file.

then run migrations
```
php yii migrate/up --migrationPath=@vendor/mamadali/yii2-favorites/migrations
```

first add to config.php or if use advanced project add to common/config/main.php

```php
    'components' => [
        ...
        'favorites' => [
            'class' => 'mamadali\favorites\Favorite',
        ],
        ...
    ];
```

# Usage

How to add product to user favorites
```php
   Yii::$app->favorites->add(Product::class, $product->id);
```

Note: this method return true when user not loged in

How to remove product from user favorites

```php
   Yii::$app->favorites->remove(Product::class, $product->id);
```

How to check if product is in user favorites

```php
   Yii::$app->favorites->has(Product::class, $product->id);
```

How to get all user favorites from Product model

```php
   Yii::$app->favorites->getAll(Product::class);
```

How to get count of user favorites from Product model

```php
   Yii::$app->favorites->getCount(Product::class);
```

How to get data provider from favorite Products
```php
   Yii::$app->favorites->getDataProvider(Product::class);
```
