<?php


//test
function amazonXML($isbn){
		$region = "com";
		$params = array(
											'Operation'=>"ItemLookup",
											'IdType'=>"ISBN",
											'Service'=>"AWSECommerceService",
											'AWSAccessKeyId'=>Config::get('env_vars.amazon_public_key'),
											'AssociateTag'=>Config::get('env_vars.amazon_ass_tag'),
	 										'Version'=>"2006-09-11",
	 										'Availability'=>"Available",
	 										'SearchIndex' => "All",
	 										'Condition'=>"All",
	 										'ItemPage'=>"1",
	 										'ResponseGroup'=>"ItemAttributes,Images,OfferFull,Offers,Reviews,EditorialReview,BrowseNodes,SalesRank",
	 										//'ResponseGroup' =>"Large",
	 										'ItemId'=> $isbn);
	$amazon_url = aws_signed_request($region, $params, Config::get('env_vars.amazon_public_key'), Config::get('env_vars.amazon_private_key'), $associate_tag=NULL, $version='2011-08-01');
	$amazonXML = simplexml_load_string(file_get_contents($amazon_url));
	$amazonXML->registerXpathNamespace("xmlns", "http://webservices.amazon.com/AWSECommerceService/2011-08-01");
	return $amazonXML;
}

function amazonDOM($isbn){
		$region = "com";
		$params = array(
											'Operation'=>"ItemLookup",
											'IdType'=>"ISBN",
											'Service'=>"AWSECommerceService",
											'AWSAccessKeyId'=>Config::get('env_vars.amazon_public_key'),
											'AssociateTag'=>Config::get('env_vars.amazon_ass_tag'),
	 										'Version'=>"2006-09-11",
	 										'Availability'=>"Available",
	 										'SearchIndex' => "All",
	 										'Condition'=>"All",
	 										'ItemPage'=>"1",
	 										'ResponseGroup'=>"ItemAttributes,Images,OfferFull,Offers,Reviews,EditorialReview,BrowseNodes,SalesRank",
	 										//'ResponseGroup' =>"Large",
	 										'ItemId'=> $isbn);
	$amazon_url = aws_signed_request($region, $params, Config::get('env_vars.amazon_public_key'), Config::get('env_vars.amazon_private_key'), $associate_tag=NULL, $version='2011-08-01');
	// $amazonXML = simplexml_load_string(file_get_contents($amazon_url));
	// $amazonXML->registerXpathNamespace("xmlns", "http://webservices.amazon.com/AWSECommerceService/2011-08-01");
	$doc = new DOMDocument();
	$doc->load($amazon_url);
	$doc->preserveWhiteSpace = false;
  $doc->formatOutput = true;
	$xpath = new DOMXPath($doc);
	$xpath->registerNamespace("xmlns", "http://webservices.amazon.com/AWSECommerceService/2011-08-01");
	$query = '//xmlns:BrowseNode/xmlns:Name';
	$entries = $xpath->query($query);
	return $entries;
}

function amazonURL($isbn){
		$region = "com";

		$params = array(
											'Operation'=>"ItemLookup",
											'IdType'=>"ISBN",
											'Service'=>"AWSECommerceService",
											'AWSAccessKeyId'=>Config::get('env_vars.amazon_public_key'),
											'AssociateTag'=>Config::get('env_vars.amazon_ass_tag'),
	 										'Version'=>"2006-09-11",
	 										'Availability'=>"Available",
	 										'SearchIndex' => "All",
	 										'Condition'=>"All",
	 										'ItemPage'=>"1",
	 										'ResponseGroup'=>"ItemAttributes,Images,OfferFull,Offers,Reviews,EditorialReview,BrowseNodes,SalesRank",
	 										'ItemId'=> $isbn);
	$amazon_url = aws_signed_request($region, $params, Config::get('env_vars.amazon_public_key'), Config::get('env_vars.amazon_private_key'), $associate_tag=NULL, $version='2011-08-01');

	return $amazon_url;

}

function xmlParse($xpath, $xml){
	if($xml){
			if($xpath){
				$bookmeta = $xml->xpath($xpath);
				$bookmeta = $bookmeta[0];
				return $bookmeta;
			}

	} else {
		return 0;
	}


}

function ordinalize($int){
			if(is_int($int)){
				if(in_array(($int % 100),range(11,13))){
					return $int . "th"; }
				else {
					switch(($int % 10)){
						case 1:
							return $int . "st";
							break;
						case 2:
							return $int . "nd";
							break;
						case 3:
							return $int . "rd";
							break;
						default:
							return $int . "th";
							break;
					}
		  	}
			} else {
				return $int;
			}
		}



?>