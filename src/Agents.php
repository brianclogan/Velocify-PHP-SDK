<?php
/**
 * Created by PhpStorm.
 * User: BrianLogan
 * Date: 8/22/2017
 * Time: 7:44 PM
 */

namespace darkgoldblade01\Velocify;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use SimpleXmlReader\SimpleXmlReader;

/**
 * Class Agents
 *
 * All functions that interact with agents
 * in Velocify.
 *
 * @package CollingMedia\Velocify
 *
 */

class Agents extends Velocify {

	/**
	 * Contacts constructor.
	 *
	 * @param array $options
	 *
	 * @throws \Exception
	 */
	public function __construct( array $options = [] ) {
		parent::__construct( $options );
    }

	/**
	 *
	 * List Agents
	 *
	 * Lists all agents in Velocify.
	 *
	 * @return Response|SimpleXmlReader
	 */
	public function listAgents() {
		//Sending the request
		$request = $this->send("GET", "GetAgents");
		return $request;
	}

	/**
	 *
	 * Get Agent
	 *
	 * Get a specific agent
	 * from Velcoify based on
	 * the Agent ID.
	 *
	 * @param string $agentId
	 *
	 * @return Response|SimpleXmlReader
	 */
	public function getAgent(string $agentId) {
		$query = [];
		//Building the query
		if($agentId)
			$query['agentId'] = $agentId;

		//Sending the request
		$request = $this->send("GET", "GetAgent", [
			'query' => $query
		]);

		return $request;
	}

	/**
	 *
	 * Get Agents In Group
	 *
	 * Get the agents in a group
	 * from Velcoify based on
	 * the Group ID.
	 *
	 * @param string $groupId
	 *
	 * @return Response|SimpleXmlReader
	 */
	public function getAgentsInGroup(string $groupId) {
		$query = [];
		//Building the query
		if($groupId)
			$query['groupId'] = $groupId;

		//Sending the request
		$request = $this->send("GET", "GetAgentsInGroup", [
			'query' => $query
		]);

		return $request;
	}

}