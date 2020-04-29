# Laravel Occasion Manager

This package helps to manage events or occasions. It is not heavily maintained, but fork it if you wish.

# Installation

1. `composer require skoellen/laravel-occasion-manager`

2. `php artisan vendor:publish --provider="Skoellen\LaravelOccasionManager\LaravelOccasionManagerServiceProvider"`

3. Migrate the database `php artisan migrate`

# Usage

Create occasions with `Occasion` You can add the `HasOccasions` trait to a model which should be associated and can have occasions. E.g. your user model:

```php
<?php

use SKoellen\LaravelOccasionManager\Traits\HasOccasions;

class User 
{
    use HasOccasions;

    //
}
```
