<?php
	header('Content-type: application/json'); //Return data as json
	$url = $_GET['url']; // Get URL parameter
	if(!(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")){ 
		// If not ajax request
		$msg = array(
			'id' => 1,
			'title' => '请勿非法请求！如有需请联系marcotan@vip.qq.com',
			'src' => '请勿非法请求！如有需请联系marcotan@vip.qq.com',
			'time' => '00:00'
		);
		echo json_encode($msg);
		exit();
	}
	include 'config.php';
	$html = httprequest($url, $cookie);
	$dom = new DOMDocument();  // Create document object model
	@$dom->loadHTML($html);  // Load HTML into document object model
	$xPath = new DOMXPath($dom);  // Create domxpath instance
	// Get all elements with a particular id and then loop through and print the href attribute
	$elements = $xPath->query('//*[@id="pager"]/div[3]/div[2]/div[2]/ul/li/div/h2/a/@href');
	$courses = array();
	foreach ($elements as $e) { //Get courses list
		$courses[] = $e->nodeValue;
	}
	$data = array();
	foreach ($courses as $c){
		$tmp = [];
		$html = httprequest($c, $cookie);
		$dom = new DOMDocument();
		@$dom->loadHTML($html);
		$xPath = new DOMXPath($dom);
		$elements = $xPath->query('//li[@class="on"]/i/em');
		$tmp['id'] = $elements[0]->nodeValue;
		$xPath = new DOMXPath($dom);
		$elements = $xPath->query('//*[@id="palyer-box"]/h1/text()');
		$tmp['title'] = $elements[0]->nodeValue;
		$xPath = new DOMXPath($dom);
		$elements = $xPath->query('//*[@type="video/mp4"]/@src');
		$tmp['src'] = $elements[0]->nodeValue;
		$xPath = new DOMXPath($dom);
		$elements = $xPath->query('//li[@class="on"]//p');
		$tmp['time'] = $elements[0]->nodeValue;
		$data[] = $tmp;
	}
	echo json_encode($data);
	function httprequest($url, $cookie=''){
		$ch = curl_init();    // Init a curl instance
		curl_setopt($ch, CURLOPT_URL, $url);  //Set URL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //Close automatic output
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		$html = curl_exec($ch);  // Execute
		curl_close($ch);  //Close curl object
		return $html;
	}