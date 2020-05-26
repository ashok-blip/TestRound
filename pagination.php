<?php
include "externalContent.php";
class Pagination {
	public function __construct(){
		$this->curlConnection = new ExternalContent();
	}

	public function paginate($url, $type){
		if (isset($_GET['page_no']) && $_GET['page_no']!="") {
			$page_no = $_GET['page_no'];
		} else {
			$page_no = 1;
		}
		
		$total_records_per_page = 10;
		$offset = ($page_no-1) * $total_records_per_page;
		$limit = 10;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2"; 
		$total_records = 100;
		$total_no_of_pages = ceil($total_records / $total_records_per_page);
		$second_last = $total_no_of_pages - 1;
		$result['previous_page'] = $previous_page;
		$result['adjacents'] = $adjacents;
		$result['second_last'] = $second_last;
		$result['next_page'] = $next_page;
		$result['page_no'] =  $page_no;

		//To fetch data from placeholder
		$postList = ($type == 'withPagination') ? 
					$this->curlConnection->getListWithPagination($url, $offset, $limit) : 
					$this->curlConnection->getListWithOutPagination($url);
		$result['results'] = json_decode($postList);
		return $result;
	}
}