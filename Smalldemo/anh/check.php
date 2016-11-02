<?php
class CheckInput{
	public $number=1;
	public $first='';
	public $last='';
	public $folder='imgs/';
	public function savefile($url, $filename=null){
		if(empty($url)){
			return false;
		}
		$url=strtolower($url);
		$path_parts = pathinfo($url);
		//var_dump($path_parts);die;
		$fileextention = $path_parts['extension'];
		if($filename==null){
			//$milliseconds = round(microtime(true) * 1000);
			//$filename= $milliseconds.'.'.$fileextention;
			$filename= $path_parts['filename'].'.'.$fileextention;
		}
		$drisave=$this->folder.$filename;
		//echo $drisave;
		//var_dump($url);die;
		$url = $url;
		$img = $drisave;
		/*
		file_put_contents($img, file_get_contents($url));
		*/
		copy($url, $drisave);
		return $drisave;
		
		
		
		
		$ch = curl_init($url);
		$fp = fopen($drisave, 'w');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		return $drisave;
		die;
	}
	/**
	 * @param $url
	 * @param array $options
	 * @return string
	 * @throws Exception
	 */
	function checkURL($url) {
		 $headers = get_headers($url);
		$resut = substr($headers[0], 9, 3);
		//var_dump($resut );die;
	if( $resut!= '200' ){
			return  false;
		}
		return  true;

	//if(get_http_response_code($url) != "200"){
	   // echo "error";
	  // return  false;
	//}else{
	//	return  true;
		//file_get_contents('http://somenotrealurl.com/notrealpage');
	//}
		
		
		
		if (empty($url)) {
			return $exists = false;
		}
		//$file = 'http://www.domain.com/somefile.jpg';
		$file = $url;
		$file_headers = @get_headers($file);
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$exists = false;
		}
		else {
			$exists = true;
		}
		return $exists;
	}
}

?>