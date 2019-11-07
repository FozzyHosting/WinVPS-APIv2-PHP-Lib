# Fozzy Windows VPS APIs Client library for PHP

The API Client Library enables you to work with Fozzy Windows VPS APIs for creating or managing your machines.

## Requirements

PHP 5.5 and later

## Developer Documentation

The actual API Documentation available on this [link](https://winvps.fozzy.com/api/v2_docs).

The [docs](docs) folder provides detailed guides for using current library.

## Installation & Usage

You can use Composer to install the package.

### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

fozzy-hosting


The preferred method is via composer. Follow the [installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```
composer require fozzy-hosting/fozzy-winvps-api
```

Finally, be sure to include the autoloader:

```
require_once '/path/to/your-project/vendor/autoload.php';
```

### Authorization

To be able to send requests you need to get API key as described in API Documentation.


### Full example

```php

<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Fozzy\WinVPS\Api\ApiException;
use Fozzy\WinVPS\Api\Configuration;
use Fozzy\WinVPS\Api\Resource;
use Fozzy\WinVPS\Api\Repository;


$host = 'Endpoint from API docs';
$key = 'API key from WinVPS client area';

try {
    // Create configuration object.
    $config = Configuration::getDefaultConfiguration()
        ->setHost($host)
        ->setApiKey($key);
    
    /*
    Create repository by passing the `config` instance.
    Repository allows to get an Instance for each class of API Endpoints described in docs foler. 
    */
    $repository = new Repository($config);
    
    // Get API Instance object to make requests. 
    $machinesInstance = $repository->get('machines');

    /*
    Load all machines from the endpoint.
    Only the part of records will be returned because API uses pagination
    */  
    $allMachinesPage = $machinesInstance->machinesGet();

    print_r($allMachinesPage);
    
} catch (Exception $e) {
    echo 'Exception when calling BrandsApi->brandsGet: ', $e->getMessage(), PHP_EOL;
}

?>
```

### Pagination

```
<?php
/**
 * Each of the API Instances supports the next methods:
 *
 * paginationSetLimit($limit) - setup new per-page amount
 * paginationNext() - go to the next page
 * paginationPrev() - go to the previous page
 * paginationGetTotal() - total recourds amount
 * paginationGetPage() - get current page number
 * paginationGetPages() - get total pages count
 * paginationHasMore() - does the next page exists
 */

// Example based on the previous code
do {
    $allMachinesPage = $machinesInstance->machinesGet();
    $machinesInstance->paginationNext();

} while ($machinesInstance->paginationHasMore());

?>
```

