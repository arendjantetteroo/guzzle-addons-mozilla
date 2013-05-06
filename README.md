guzzle-addons-mozilla
=====================

A simple PHP API client for the Mozilla Addon Statistics service

## Installation

The library is available through Composer, so its easy to get it. 
Simply add this to your `composer.json` file:

    "require": {
        "ajt/guzzle-addons-mozilla": "dev-master"
    }
    
And run `composer install`

## Features

* Support the current statistics per day

## Todo

- [ ] Add tests
- [ ] Add some Response models
- [ ] Figure out if there is a way to login so private statistics work as well


## Usage
You need to have a public statistics board for this to work, as of now there is no support for authentication
    
To use the Mozilla Addons API Client simply instantiate the client

```php
<?php

require dirname(__FILE__).'/../vendor/autoload.php';

use AJT\MozillaAddons\MozillaAddonsClient;

/**
 * For example, for the JSON-handle dashboard :
 * https://addons.mozilla.org/en-us/firefox/addon/JSON-handle/statistics/?last=30
 * @var string
 */
$app_name = 'JSON-handle'; // Fill in your appname here

// Get the client
$client = MozillaAddonsClient::factory(array('app_name' => $app_name, 'debug' => false));

// Get downloads
print "getDownloadsPerDay\n";
$downloads = $client->getDownloadsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($downloads);
```

Invoke Commands using our `__call` method (auto-complete phpDocs are included)

```php
<?php 
// Get the client
$client = MozillaAddonsClient::factory(array('app_name' => $app_name, 'debug' => false));

// Get downloads
print "getDownloadsPerDay\n";
$downloads = $client->getDownloadsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($downloads);
``` 

## Examples
Copy the api.config.php.dist to api.config.php andd fill in the app-name.
Afterwards you can execute the example getUsage.php in the examples directory. 

You can look at the services.json for details on what methods are available and what parameters are available to call them

## Contributions welcome

Found a bug, open an issue, preferably with the debug output and what you did. 
Bugfix? Open a Pull Request and i'll look into it. 

## License

The Mozilla Addons API client is available under an MIT License.
