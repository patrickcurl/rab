<?php
use Carbon\Carbon;
use Guzzle\Http\Client;
class Order extends Eloquent {

	protected $table = 'orders';
	protected $fillable = array('user_id', 'tracking_number', 'total_amount', 'received_date', 'paid_date', 'comments');

	public function items(){
		return $this->hasMany('Item');
	}
  public function user(){
    return $this->belongsTo('User');
  }

  public static function gDate()
{ $tmpdate = self::created_at;
     if ($tmpdate == "0000-00-00" || $tmpdate == "") {
          return null;
      } else {
          return date('m/d/Y',strtotime($tmpdate));
      }
}

// public function getCreatedAtAttribute($v){
//   //$date = date("m/d/y", strtotime($v));
//   $date = (strtotime($v)*1000) + 18000000;
//   return $date;
// }
public function getReceivedDateAttribute($v){
  //$date = date("m/d/y", strtotime($v));
  if(isset($v)){
    $date = (strtotime($v)*1000) + 18000000;
    return $date;
  } else{
    return null;
  }


}

public function short_date($attr)
  {
      $date = $this->get_attribute($attr);
      if (is_string($date)){
        $dateObject = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $dateObject->format('Y-m-d');
      }
      return $date;
  }

  public static function setDate($date, $field){
    if ($date){

     $fieldVal = date('Y-m-d', (strtotime($date)));
    } else {
      $fieldVal = '';
    }
   //return var_dump($fieldVal);
    return $fieldVal;
  }

  public static function getDate($date, $field) {
      $tmpdate = self::$field;
      if ($tmpdate == "0000-00-00" || $tmpdate == "") {
          return "";
      } else {
          return date('m/d/Y',strtotime($tmpdate));
      }
  }

  public static function createLabel($customer, $weight){
    $license = Config::get('env_vars.ups_license');
    $user = Config::get('env_vars.ups_user');
    $pass = Config::get('env_vars.ups_pass');
    $company = Config::get('env_vars.ups_company');

    // $ups_confirm_url = "https://wwwcie.ups.com/ups.app/xml/ShipConfirm"; // Testing
    // $ups_accept_url = "https://wwwcie.ups.com/ups.app/xml/ShipAccept";  // Testing
    $ups_confirm_url = "https://onlinetools.ups.com/ups.app/xml/ShipConfirm"; // Production
    $ups_accept_url = "https://onlinetools.ups.com/ups.app/xml/ShipAccept";  // Production

    $ups_confirm_request = "
        <?xml version='1.0'?>
        <AccessRequest xml:lang='en-US'>
          <AccessLicenseNumber>$license</AccessLicenseNumber>
          <UserId>$user</UserId>
          <Password>$pass</Password>
        </AccessRequest>
        <?xml version='1.0'?>
        <ShipmentConfirmRequest xml:lang='en-US'>
          <Request>
            <TransactionReference>
              <CustomerContext>Customer Comment</CustomerContext>
              <XpciVersion/>
            </TransactionReference>
            <RequestAction>ShipConfirm</RequestAction>
            <RequestOption>validate</RequestOption>
          </Request>
          <LabelSpecification>
            <LabelPrintMethod>
              <Code>GIF</Code>
              <Description>gif file</Description>
            </LabelPrintMethod>
            <HTTPUserAgent>Mozilla/4.5</HTTPUserAgent>
            <LabelImageFormat>
              <Code>GIF</Code>
              <Description>gif</Description>
            </LabelImageFormat>
          </LabelSpecification>
          <Shipment>
           <RateInformation>
              <NegotiatedRatesIndicator/>
            </RateInformation>
          <Description/>
            <Shipper>
              <Name>{$company['name']}</Name>
              <PhoneNumber>{$company['phone']}</PhoneNumber>
              <ShipperNumber>{$company['ship_num']}</ShipperNumber>
            <TaxIdentificationNumber></TaxIdentificationNumber>
              <Address>
              <AddressLine1>{$company['address']}</AddressLine1>
              <City>{$company['city']}</City>
              <StateProvinceCode>{$company['state']}</StateProvinceCode>
              <PostalCode>{$company['zip']}</PostalCode>
              <PostcodeExtendedLow></PostcodeExtendedLow>
              <CountryCode>US</CountryCode>
             </Address>
            </Shipper>
          <ShipTo>
             <CompanyName>{$company['name']}</CompanyName>
              <AttentionName>{$company['attn']}</AttentionName>
              <PhoneNumber>{$company['phone']}</PhoneNumber>
              <Address>
                <AddressLine1>{$company['address']}</AddressLine1>
                <City>{$company['city']}</City>
                <StateProvinceCode>{$company['state']}</StateProvinceCode>
                <PostalCode>{$company['zip']}</PostalCode>
                <CountryCode>US</CountryCode>
              </Address>
            </ShipTo>
            <ShipFrom>
              <CompanyName>{$customer['first_name']} {$customer['last_name']}</CompanyName>
              <AttentionName>{$customer['first_name']} {$customer['last_name']}</AttentionName>
              <PhoneNumber>{$customer['phone']}</PhoneNumber>
            <TaxIdentificationNumber></TaxIdentificationNumber>
              <Address>
                <AddressLine1>{$customer['address']}</AddressLine1>
                <City>{$customer['city']}</City>
              <StateProvinceCode>{$customer['state']}</StateProvinceCode>
              <PostalCode>{$customer['zip']}</PostalCode>
              <CountryCode>US</CountryCode>
              </Address>
            </ShipFrom>
             <PaymentInformation>
              <Prepaid>
                <BillShipper>
                  <AccountNumber>{$company['ship_num']}</AccountNumber>
                </BillShipper>
              </Prepaid>
            </PaymentInformation>
            <Service>
              <Code>03</Code>
              <Description>Ground</Description>
            </Service>
            <Package>
              <PackagingType>
                <Code>02</Code>
                <Description>Customer Supplied</Description>
              </PackagingType>
              <Description>Package Description</Description>
            <ReferenceNumber>
              <Code>00</Code>
            <Value>Package</Value>
            </ReferenceNumber>
              <PackageWeight>
                <UnitOfMeasurement>
                  <Code>LBS</Code>
                </UnitOfMeasurement>
                <Weight>$weight</Weight>
              </PackageWeight>

              <AdditionalHandling>0</AdditionalHandling>
            </Package>
          </Shipment>
        </ShipmentConfirmRequest>";
        // $client = new Client();

        // $request = $client->post($ups_confirm_url);
        // $request->getCurlOptions()->set(CURLOPT_SSL_VERIFYPEER, 0);
        // $request->getCurlOptions()->set(CURLOPT_RETURNTRANSFER, 1);
        // $request->getCurlOptions()->set(CURLOPT_HEADER, 0);
        // $request->getCurlOptions()->set(CURLOPT_POST, 1);
        // $request->getCurlOptions()->set(CURLOPT_POSTFIELDS, $ups_confirm_request);
        // $request->getCurlOptions()->set(CURLOPT_TIMEOUT, 3600);


        // //$request->setBody($ups_confirm_request);
        // $response = $request->send();
        // return var_dump($response);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ups_confirm_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ups_confirm_request);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        $ups_confirm_response = new SimpleXMLElement(curl_exec($ch));
        curl_close($ch);
        // form the accept request in order to issue a label
        $ups_accept_request = "
        <?xml version='1.0' encoding='ISO-8859-1'?>
          <AccessRequest>
            <AccessLicenseNumber>$license</AccessLicenseNumber>
            <UserId>$user</UserId>
            <Password>$pass</Password>
          </AccessRequest>
        <?xml version='1.0' encoding='ISO-8859-1'?>
          <ShipmentAcceptRequest>
            <Request>
              <TransactionReference>
                <CustomerContext>Customer Comment</CustomerContext>
              </TransactionReference>
              <RequestAction>ShipAccept</RequestAction>
              <RequestOption>1</RequestOption>
            </Request><ShipmentDigest>{$ups_confirm_response->ShipmentDigest}</ShipmentDigest>
            </ShipmentAcceptRequest>";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ups_accept_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ups_accept_request);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        $ups_accept_response = new SimpleXMLElement(curl_exec($ch));
        return $ups_accept_response;
        if (isset($ups_accept_response)){
          $tracking_number = $ups_accept_response->ShipmentResults->PackageResults->TrackingNumber;
          $label = $ups_accept_response->ShipmentResults->PackageResults->LabelImage->GraphicImage;
          $data = array('tracking_number' => $tracking_number, 'label' => $label);
        return $data;
        } else {
          return null;
        }



  }

}