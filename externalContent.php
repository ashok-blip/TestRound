<?php
class ExternalContent {
	public $cURLConnection;
	private $reponse;
	function __construct(){
		$this->cURLConnection = curl_init();
	}

	public function getListWithPagination($url, $offset, $limit){
		$url = "$url?_start=$offset&_limit=$limit";
		$reponse = $this->setOptions($url);
		return $reponse;
	}

	public function getListWithOutPagination($url){
		$reponse = $this->setOptions($url);
		return $reponse;
	}

	private function setOptions($url){
		curl_setopt($this->cURLConnection, CURLOPT_URL, $url);
		curl_setopt($this->cURLConnection, CURLOPT_RETURNTRANSFER, true);
		$list = curl_exec($this->cURLConnection);
		curl_close($list);
		return $list;
	}
}