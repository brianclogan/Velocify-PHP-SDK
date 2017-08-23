<?php

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use SimpleXmlReader\SimpleXmlReader;

/**
 * @covers Leads
 */
final class LeadsTest extends TestCase {

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
	public function testGetLeads() {
		$response = $this->velocify->leads()->listLeads('2017-01-03', '2017-01-03');
		$count = 0;
		foreach($response->path('Leads/Lead') AS $lead) {
		    $count++;
        };
        $this->assertGreaterThan(0, $count,"Found {$count} leads from Velocify.");
		return $response;
	}

	/**
	 * @return SimpleXmlReader|Response
	 */
	public function testGetLead() {
		$response = $this->velocify->leads()->listLeads('2017-01-03', '2017-01-03');
		foreach($response->path('Leads/Lead') AS $lead) {
			$leadId = (string) $lead->attributes()->Id;
		};
		$response = $this->velocify->leads()->getLead($leadId);
		$count = 0;
		foreach($response->path('Leads/Lead') AS $lead) {
			$count++;
		};
		$this->assertEquals(1, $count);
		return $response;
	}

	/**
	 * @return SimpleXmlReader|Response
	 */
	public function testGetModifiedLeads() {
		$response = $this->velocify->leads()->listModifiedLeads();
		$count = 0;
		foreach($response->path('Leads/Lead') AS $lead) {
			$count++;
		};
		$this->assertGreaterThan(0, $count);
		return $response;
	}

}