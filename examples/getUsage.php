<?php

require dirname(__FILE__).'/../vendor/autoload.php';

require dirname(__FILE__).'/app.config.php';

use AJT\MozillaAddons\MozillaAddonsClient;

// Get the client
$client = MozillaAddonsClient::factory(array('app_name' => $app_name, 'debug' => false));

// Get downloads
print "getDownloadsPerDay\n";
$downloads = $client->getDownloadsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($downloads);

// Get download sources
print "getDownloadSourcesPerDay\n";
$downloads = $client->getDownloadSourcesPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($downloads);

// Get all usage numbers
print "getUsagePerDay\n";
$usages = $client->getUsagePerDay(array('date_start' => '20130501', 'date_end' => '20130506'));
foreach ($usages as $usage) {
	print $usage['date'] . "," . $usage['count'];
	print "\n";
}

// Get addon versions
print "getVersionsPerDay\n";
$versions = $client->getVersionsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($versions);
 
// Get firefox versions
print "getApplicationsPerDay\n";
$apps = $client->getApplicationsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($apps); 

// Get OS platforms
print "getPlatformsPerDay\n";
$os = $client->getPlatformsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($os); 

// Get used languages/locales
print "getLocalesPerDay\n";
$lc = $client->getLocalesPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($lc); 

// Get addon status per day (Enabled/disabled, incompatible etc...)
print "getAddonStatusPerDay\n";
$status = $client->getAddonStatusPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($status); 
 
// Get contributions for this addon
/*
This fails as it's not publicly available
 *
print "getContributionsPerDay\n";
$contribs = $client->getContributionsPerDay(array('date_start' => '20130504', 'date_end' => '20130506'));
print_r($contribs);
*/