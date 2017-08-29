<?php
/**
 * Created by PhpStorm.
 * User: BrianLogan
 * Date: 8/22/2017
 * Time: 7:44 PM
 */

namespace darkgoldblade01\Velocify;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use SimpleXmlReader\SimpleXmlReader;

/**
 * Class Velocify
 *
 * The basic starting point for
 * the Velocify package.
 *
 * @package CollingMedia\Velocify
 *
 */

class Velocify {

	/**
	 * URL
	 *
	 * The endpoint for all interactions on Velocify.
	 *
	 * @var string
	 */
	protected $url = 'http://service.velocify.com/ClientService.asmx/';

	/**
	 * Client
	 *
	 * The client used by Guzzle and all functions in the package.
	 *
	 * @var object
	 */
	protected $client = null;

	/**
	 * Access Token
	 *
	 * The access token used for all requests.
	 *
	 * @var array
	 */
	protected $access_token = null;

	/**
	 * Options
	 *
	 * The options config that includes the `username`,
	 * and `password`.
	 *
	 * @var array
	 */
	protected $options;


	/**
	 * Velocify constructor.
	 *
	 * @param array $options The options config array. See $options variable.
	 *
	 * @throws \Exception
	 */
	public function __construct(array $options = [])
	{
		$required = ['username', 'password'];
		foreach($required AS $item) {
			if(!isset($options[$item])) {
				throw new \Exception($item . ' must be set in the options.');
			}
		}
		$this->options = $options;
		$this->client = new Client([
			'base_uri' => $this->url,
			'query' => [
                'username' => $this->options['username'],
                'password' => $this->options['password'],
            ]
		]);
	}

	/**
	 * Agents Class
	 *
	 * Returns the Agents Class
	 *
	 * @return Agents
	 */
	public function agents() {
		return new Agents($this->options);
	}

	/**
	 * Leads Class
	 *
	 * Returns the Leads Class
	 *
	 * @return Leads
	 */
	public function leads() {
		return new Leads($this->options);
	}

	/**
	 * Send
	 *
	 * Sends the request on through Guzzle.
	 *
	 * @param string $method The method used in the request (GET, POST, DELETE, PATCH, PUT...)
	 * @param string $url The URL the request should be made to.
	 * @param array $options The options you need for the GuzzleHTTP request.
	 * @param bool $array Return array, or the request object? (true for array, false for request object)
	 *
	 * @return Response|string
	 */
	protected function send(string $method, string $url, array $options = [], $array = true) {
        if(isset($options['query'])) {
	        $options['query'] = array_merge( $options['query'], $this->client->getConfig( 'query' ) );
        }
		$request = $this->client->request($method, $url, $options);
		if(!$array) {
			return $request;
		} else {
			return $request->getBody()->getContents();
		}
	}
}