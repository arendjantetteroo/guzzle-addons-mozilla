<?php

namespace AJT\MozillaAddons;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Plugin\Log\LogPlugin;

/**
 * An Mozilla Addons Client based on guzzle
 *
 * @package AJT\MozillaAddons
 *
 */
class MozillaAddonsClient extends Client
{

    /**
     * Factory method to create a new MozillaAddonsClient
     *
     * The following array keys and values are available options:
     * - base_url: Base URL of web service     
     * 
     * @param array|Collection $config Configuration data
     *
     * @return MozillaAddonsClient
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => 'https://addons.mozilla.org/nl/firefox/addon/',
            'debug' => false
        );
        $required = array('base_url', 'app_name');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url').$config->get('app_name') . '/statistics', $config);
        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/services.json');
        $client->setDescription($description);

		if($config->get('debug')){
			$client->addSubscriber(LogPlugin::getDebugPlugin());	
		}		
        return $client;
    }

	/**
     * Shortcut for executing Commands in the Definitions.
     *
     * @param string $method
     * @param array|null $args
     *
     * @return mixed|void
     *
     */
    public function __call($method, $args = null)
    {
        $commandName = ucfirst($method);

        $result = parent::__call($commandName, $args);
  
        return $result;
    }
}