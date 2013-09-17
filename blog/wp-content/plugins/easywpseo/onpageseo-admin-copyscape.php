<?php

if (!function_exists ('is_admin'))
{
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}
elseif (!class_exists('OnPageSEOCopyscape'))
{
	class OnPageSEOCopyscape
	{
		/**
		 * Instance Variables
		 */

		var $copyscapeURL = 'http://www.copyscape.com/api/';
		var $xmlData;
		var $xmlDepth;
		var $xmlRef;
		var $xmlSpec;
		var $options;



		/**
		 * PHP 4 constructor (for backwards compatibility)
		 *
		 * @param	void
		 * @return	bool	true
		 */

		function OnPageSEOCopyscape($options)
		{
			$this->__construct($options);
			return;
		}


		/**
		 * PHP 5 constructor
		 *
		 * @param	void
		 * @return	void
		 */

		function __construct($options)
		{
			// Plugin Options
			$this->options = $options;
		}

		function test()
		{
			return 'teststs';
		}

		function copyscape_api_check_balance()
		{
			return $this->copyscape_api_call('balance');
		}

		function copyscape_api_url_search($url, $full=null, $operation='csearch')
		{
			$params['q']=$url;
			if (isset($full))
				$params['c']=$full;
		
			return $this->copyscape_api_call($operation, $params, array(2 => array('result' => 'array')));
		}


		function copyscape_api_text_search($text, $encoding, $full=null, $operation='csearch')
		{
			$params['e']=$encoding;
			if (isset($full))
				$params['c']=$full;
			return $this->copyscape_api_call($operation, $params, array(2 => array ('result' => 'array')), $text);
		}

		function copyscape_api_call($operation, $params=array(), $xmlspec=null, $postdata=null)
		{
			//$url=COPYSCAPE_API_URL.'?u='.urlencode(COPYSCAPE_USERNAME).'&k='.urlencode(COPYSCAPE_API_KEY).'&o='.urlencode($operation);
			$url=$this->copyscapeURL.'?u='.urlencode($this->options['copyscape_username']).'&k='.urlencode($this->options['copyscape_api_key']).'&o='.urlencode($operation);
		
			foreach ($params as $name => $value)
				$url.='&'.urlencode($name).'='.urlencode($value);
		
			$curl=curl_init();
		
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_TIMEOUT, $this->options['request_timeout']);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, isset($postdata));
		
			if (isset($postdata))
				curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
		
			$response=curl_exec($curl);
			curl_close($curl);
		
			if (strlen($response))
				return($this->copyscape_read_xml($response, $xmlspec));
			else
				return false;
		}



		function copyscape_read_xml($xml, $spec=null)
		{
			return(simplexml_load_string($xml));
		}

	}

}

?>