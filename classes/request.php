<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/gostats/constants.php");
	
	/**
	* Used to make a request to the api and retrieve specific data
	*/
	class Request{

		private $steam_id = null;

		private $url_stats = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2?";

		private $url_player = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002?";

		private $error = null;

		private $stats = null;

		private $player = null;

		public function __construct($steam_id){
			$this->steam_id = $steam_id;
			if(!$this->retrieveStats() || $this->retrievePlayerInfo()){
				echo $this->error;
			}
		}

		/**
		* retrieveStats retrieves data from the steam API
		* returns false if unable to get the data
		*/
		public function retrieveStats(){
			if($json = @file_get_contents($this->url_stats . KEY .  "&steamid=" . $this->steam_id . "&" . APPID)){
				$this->error = null;
			} else {
				$this->error = USER_NOT_FOUND;
				return false;
			}
			$this->stats = json_decode($json, true);	
			return true;
		}

		/**
		* retrievePlayerIfno retrieves player information from the steam API
		* returns false if unable to get the data
		*/
		public function retrievePlayerInfo(){
			if($json = @file_get_contents($this->url_player . KEY .  "&steamids=" . $this->steam_id)){
				$this->error = null;
			} else {
				$this->error = USER_NOT_FOUND;
				return false;
			}
			$this->player = json_decode($json, true);
			return true;
		}

		/**
		* getStat gets the stat for a user.
		* Look in statsindex.php for $x values
		* 
		*/
		public function getStat($x){
			return $this->stats['playerstats']['stats'][$x]['value'];
		}

		/**
		* getPlayerInfo gets the stat for a user.
		* Look in playerindex.php for $x values
		* 
		*/
		public function getPlayerInfo($info){
			return $this->player['response']['players'][0][$info];
		}

	}
?>