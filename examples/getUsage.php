<?php

require dirname(__FILE__).'/../vendor/autoload.php';

require dirname(__FILE__).'/app.config.php';

use AJT\MozillaAddons\MozillaAddonsClient;

// Get the client
$client = MozillaAddonsClient::factory(array('app_name' => $app_name, 'debug' => false));

// Get all usage numbers
print "getUsagePerDay\n";
$usages = $client->getUsagePerDay(array('date_start' => '20130101', 'date_end' => '20130506'));
foreach ($usages as $usage) {
	print $usage['date'] . "," . $usage['count'];
	print "\n";
}
