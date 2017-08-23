<?php

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use SimpleXmlReader\SimpleXmlReader;

/**
 * @covers Leads
 */
final class AgentsTest extends TestCase {

	protected $velocify;
	protected $leads;

	/**
	 * Setup the tests
	 */
	public function setup() {
		$this->leads = null;
		$this->velocify = new \CollingMedia\Velocify\Velocify([
		    "username" => getenv('VELOCIFY_USERNAME'),
            "password" => getenv('VELOCIFY_PASSWORD')
		]);
	}

	/**
	 * @return SimpleXmlReader|Response
	 */
	public function testGetAgents() {
		$response = $this->velocify->agents()->listAgents();
		$count = 0;
		foreach($response->path('Agents/Agent') AS $item) {
			$count++;
		};
		$this->assertGreaterThan(0, $count,"Found {$count} agents from Velocify.");
		return $response;
	}

	/**
	 * @return SimpleXmlReader|Response
	 */
	public function testGetAgentsInGroup() {

		// TODO: implement testGetAgentsInGroup() method.

//		$response = $this->velocify->agents()->getAgents();
//		$count = 0;
//		foreach($response->path('Agents/Agent') AS $item) {
//			$count++;
//		};
//		$this->assertGreaterThan(0, $count,"Found {$count} agents from Velocify.");
//		return $response;
	}

}