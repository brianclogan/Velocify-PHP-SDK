<?php
/**
 * Created by PhpStorm.
 * User: BrianLogan
 * Date: 8/22/2017
 * Time: 7:44 PM
 */

namespace CollingMedia\Velocify;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use SimpleXmlReader\SimpleXmlReader;

/**
 * Class Leads
 *
 * All functions that interact with leads
 * in Velocify.
 *
 * @package CollingMedia\Velocify
 *
 */

class Leads extends Velocify {

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
	 * List Leads
	 *
	 * Lists all leads in Velocify
	 * based on the timeframe given,
	 * based on date created in Velcoify.
	 *
	 * @param string $start The start date that you want to pull from. It will always default to the start of the day.
	 * @param string $end The end date you want to pull to. It will always default to the end of the day.
	 *
	 * @return Response|SimpleXmlReader
	 */
	public function listLeads(string $start = null, string $end = null) {
		$query = [];
		//Building the query
		if($start)
			$query['from'] = Carbon::parse($start)->startOfDay()->format('Y-m-d\TH:i:s');
		if($end)
			$query['to'] = Carbon::parse($end)->endOfDay()->format('Y-m-d\TH:i:s');

		//Sending the request
		$request = $this->send("GET", "GetLeads", [
			'query' => $query
		]);

		return $request;
	}

	/**
	 *
	 * List Modified Leads
	 *
	 * Lists all recently modified
	 * leads in Velocify.
	 *
	 * @param int $minutesAgo How many minutes you want to pull leads from, default is 15.
	 *
	 * @return Response|SimpleXmlReader
	 */
	public function listModifiedLeads(int $minutesAgo = 15) {
		$query = [];
		//Building the query
		if($minutesAgo)
			$query['fromNowMinutes'] = $minutesAgo;

		//Sending the request
		$request = $this->send("GET", "GetLeadsSpan", [
			'query' => $query
		]);

		return $request;
	}

    /**
     *
     * Get Lead
     *
     * Get a specific lead
     * from Velcoify based on
     * the Lead ID.
     *
     * @param string $leadId
     *
     * @return Response|SimpleXmlReader
     */
    public function getLead(string $leadId) {
        $query = [];
        //Building the query
        if($leadId)
            $query['leadId'] = $leadId;

        //Sending the request
        $request = $this->send("GET", "GetLead", [
            'query' => $query
        ]);

        return $request;
    }

}