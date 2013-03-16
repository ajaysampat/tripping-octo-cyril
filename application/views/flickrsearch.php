<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Flickr { 
	private $apiKey = 'fd7aed334447ebd17c24d9e941371191'; 
 
	public function __construct() {
	} 
 
	public function search($query = null) { 
		$search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $this->apiKey . '&text=' . urlencode($query) . '&per_page=24&format=php_serial'; 
		$result = file_get_contents($search); 
		$result = unserialize($result); 
		return $result; 
	} 
}
?>
