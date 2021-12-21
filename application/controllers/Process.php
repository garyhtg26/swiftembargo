<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PostModel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $postModel = $this->PostModel;
        $idgenerate = $postModel->generateId();
        $reqid= ($this->input->post('REQUEST_ID')!='') ? $this->input->post('REQUEST_ID') : $idgenerate;
        $postModel->bookid($reqid);
        $validation = $this->form_validation;
        $validation->set_rules($postModel->rules());
        $ISSUING_BANK_HIT= 'N';
        $ADVISING_BANK_HIT= 'N';
        $APPLICANT_HIT= 'N';
        $BENEFICIARY_HIT= 'N';
        $PORT_OF_LOADING_HIT= 'N';
        $PORT_OF_DISCHARGE_HIT= 'N';
        $PLACE_OF_TAKING_IN_CHARGE_HIT= 'N';
        $PLACE_OF_DESTINATION_HIT= 'N';
        $DESCRIPTION_OF_GOOODS_HIT= 'N';
        $COUNTRY_OF_ORIGIN_HIT= 'N';
        $SHIPPER_HIT= 'N';
        $NOTIFY_PARTY_HIT= 'N';
        $CONSIGNEE_HIT= 'N';
        $VESSEL_PRE_CARRIAGE_HIT= 'N';
        $VESSEL_MAIN_VESSEL_HIT= 'N';
        $CARRIER_HIT= 'N';
        $MASTER_HIT= 'N';
        $CHARTERER_HIT= 'N';
        $OWNER_HIT= 'N';
        $AGENT_OF_CARRIER_HIT= 'N';
        $DELIVERY_AGENT_IN_TRANSPORT_DOC_HIT= 'N';
        $SHIPPING_COMPANY_HIT= 'N';
        $INSURANCE_COMPANY_HIT= 'N';
        $AGENT_OF_INSURANCE_COMPANY_HIT= 'N';
        $SETTLING_AGENT_OF_INSURANCE_HIT= 'N';
        $ISSUER_OF_CERT_OF_ANALYSIS_HIT= 'N';
        $ISSUER_OF_PACKING_LIST_HIT= 'N';
        $ISSUER_OF_HEALTH_CERTIFICATE_HIT= 'N';
        $MANUFACTURER_HIT= 'N';
        $OTHERS_HIT= 'N';




	$wsdl   = getenv('WSDL'); 
	$location = getenv('LOCATION');
	$action = getenv('ACTION');

	// $client = new SoapClient($wsdl, array(
	//     'soap_version'  => SOAP_1_1,
	//     'cache_wsdl'    => WSDL_CACHE_NONE, 
	//     'cache_ttl'     => 86400, 
	//     'trace'         => true,
	//     'exceptions'    => true,
	// ));



    //     try {
            $swift = "{1:F01EFGBGRAAAXXX3121734186}{2:I700ABNAKRSEXXXXN}{4:\n:20:".$reqid."\n:51D:".$this->input->post('ISSUING_BANK')."\n:57D:".$this->input->post('ADVISING_BANK')."\n:50:".$this->input->post('APPLICANT')."\n:59:".$this->input->post('BENEFICIARY')."\n:44E:".$this->input->post('PORT_OF_LOADING')."\n:44F:".$this->input->post('PORT_OF_DISCHARGE')."\n:44A:".$this->input->post('PLACE_OF_TAKING_IN_CHARGE')."\n:44B:".$this->input->post('PLACE_OF_DESTINATION')."\n:45A:".$this->input->post('DESCRIPTION_OF_GOOODS')."\n:53A:".$this->input->post('COUNTRY_OF_ORIGIN')."\n:60:".$this->input->post('SHIPPER')."\n:61:".$this->input->post('NOTIFY_PARTY')."\n:62:".$this->input->post('CONSIGNEE')."\n:70:".$this->input->post('VESSEL_PRE_CARRIAGE')."\n:71:".$this->input->post('VESSEL_MAIN_VESSEL')."\n:72:".$this->input->post('CARRIER')."\n:73:".$this->input->post('MASTER')."\n:74:".$this->input->post('CHARTERER')."\n:75:".$this->input->post('OWNER')."\n:76:".$this->input->post('AGENT_OF_CARRIER')."\n:80:".$this->input->post('DELIVERY_AGENT_IN_TRANSPORT_DOC')."\n:81:".$this->input->post('SHIPPING_COMPANY')."\n:82:".$this->input->post('INSURANCE_COMPANY')."\n:83:".$this->input->post('AGENT_OF_INSURANCE_COMPANY')."\n:84:".$this->input->post('SETTLING_AGENT_OF_INSURANCE')."\n:85:".$this->input->post('ISSUER_OF_CERT_OF_ANALYSIS')."\n:86:".$this->input->post('ISSUER_OF_PACKING_LIST')."\n:87:".$this->input->post('ISSUER_OF_HEALTH_CERTIFICATE')."\n:88:".$this->input->post('MANUFACTURER')."\n:90:".$this->input->post('OTHERS')."\n-}";
            $string = <<<XML
                        <soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v3="http://v3.server.transaction.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
                        <soapenv:Header/>
                        <soapenv:Body>
                        <v3:scoreTransaction soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
                        <loginData xsi:type="urn:LoginData" xmlns:urn="urn:commons.webservice.embargo.tonbeller.com">
                        <pass xsi:type="xsd:string">gwg</pass>
                        <userName xsi:type="xsd:string">demo</userName>
                        </loginData>
                        <params xsi:type="urn:TransactionScoringContext03" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
                        <additionalParameter xsi:type="tran:ArrayOf_tns2_AdditionalData" soapenc:arrayType="urn:AdditionalData[]" xmlns:tran="http://10.230.83.97:8080/embargo/services/TransactionScoring03"/>
                        <inOut xsi:type="xsd:string">in</inOut>
                        <instance xsi:type="xsd:string">1</instance>
                        <paymentSystem xsi:type="xsd:string">System1</paymentSystem>
                        <searchMode xsi:type="xsd:string">verbose</searchMode>
                        <trxFormat xsi:type="xsd:string">mt</trxFormat>
                        </params>
                        <data xsi:type="urn:TransactionData" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
                        <requestId xsi:type="xsd:string">...</requestId>
                        <textData xsi:type="xsd:string">...</textData>
                        <transactionIds xsi:type="tran:ArrayOf_xsd_string" soapenc:arrayType="xsd:string[]" xmlns:tran="http://10.230.83.97:8080//embargo/services/TransactionScoring03"/>
                        <xmlData xsi:type="xsd:base64Binary">cid:482434121934</xmlData>
                        </data>
                        </v3:scoreTransaction>
                        </soapenv:Body>
                        </soapenv:Envelope>
                        XML;

            $xml = simplexml_load_string($string);
            $requestIds = $xml->xpath('//requestId');
            foreach ($requestIds as $requestId) $requestId[0] = $reqid;
            $textDatas = $xml->xpath('//textData');
            foreach ($textDatas as $textData) $textData[0] = $swift;
            
            $userNames = $xml->xpath('//userName');
            foreach ($userNames as $userName) $userName[0] = getenv('WS_USERNAME');
            $passs = $xml->xpath('//pass');
            foreach ($passs as $pass) $pass[0] = getenv('WS_PASSWORD');

            $final = $xml->asXML();

	    $sesuatu = <<<XML
        <?xml version="1.0" encoding="utf-8"?><soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><soapenv:Body><ns1:scoreTransactionResponse soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xmlns:ns1="http://v3.server.transaction.webservice.embargo.tonbeller.com"><scoreTransactionReturn href="#id0"/></ns1:scoreTransactionResponse><multiRef id="id0" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns2:RequestResult03" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:ns2="urn:server.transaction.webservice.embargo.tonbeller.com"><errorText xsi:type="xsd:string"></errorText><requestId xsi:type="xsd:string">WSTRX_RQID_00000145</requestId><returnValue xsi:type="xsd:int">1</returnValue><transactionResults soapenc:arrayType="ns2:TransactionResult03[1]" xsi:type="soapenc:Array"><transactionResults href="#id1"/></transactionResults></multiRef><multiRef id="id1" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns3:TransactionResult03" xmlns:ns3="urn:server.transaction.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><additionalData soapenc:arrayType="ns3:AdditionalData[0]" xsi:type="soapenc:Array"/><businessRuleResults soapenc:arrayType="ns3:BusinessRuleResult[0]" xsi:type="soapenc:Array"/><detailResults soapenc:arrayType="ns4:ScoringDetailResult02[10]" xsi:type="soapenc:Array" xmlns:ns4="urn:commons.webservice.embargo.tonbeller.com"><detailResults href="#id2"/><detailResults href="#id3"/><detailResults href="#id4"/><detailResults href="#id5"/><detailResults href="#id6"/><detailResults href="#id7"/><detailResults href="#id8"/><detailResults href="#id9"/><detailResults href="#id10"/><detailResults href="#id11"/></detailResults><requestId xsi:type="xsd:string">WSTRX_RQID_00000145</requestId><status xsi:type="xsd:string">HOLD</status><statusOrigin xsi:type="xsd:string">syst</statusOrigin><transactionId xsi:type="xsd:string">WSTRX_TXID_00000146</transactionId></multiRef><multiRef id="id7" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns5:ScoringDetailResult02" xmlns:ns5="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns5:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id12"/><hits href="#id13"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">11101000</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id2" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns6:ScoringDetailResult02" xmlns:ns6="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns6:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id14"/><hits href="#id15"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">1</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">EU</slListName></multiRef><multiRef id="id3" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns7:ScoringDetailResult02" xmlns:ns7="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns7:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id16"/><hits href="#id17"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">007480</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">XOFAC</slListName></multiRef><multiRef id="id10" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns8:ScoringDetailResult02" xmlns:ns8="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns8:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id18"/><hits href="#id19"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">11273751</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id8" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns9:ScoringDetailResult02" xmlns:ns9="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns9:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id20"/><hits href="#id21"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">11198355</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id6" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns10:ScoringDetailResult02" xmlns:ns10="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns10:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id22"/><hits href="#id23"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">11036518</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id5" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns11:ScoringDetailResult02" xmlns:ns11="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns11:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id24"/><hits href="#id25"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">1045700</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id11" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns12:ScoringDetailResult02" xmlns:ns12="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns12:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id26"/><hits href="#id27"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">11278572</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id4" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns13:ScoringDetailResult02" xmlns:ns13="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns13:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id28"/><hits href="#id29"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">1045664</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id9" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns14:ScoringDetailResult02" xmlns:ns14="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><hits soapenc:arrayType="ns14:HitWord[2]" xsi:type="soapenc:Array"><hits href="#id30"/><hits href="#id31"/></hits><relScore xsi:type="xsd:int">100</relScore><score xsi:type="xsd:double">2.0</score><slId xsi:type="xsd:string">11225488</slId><slInstitutsId xsi:type="xsd:string">-1</slInstitutsId><slListName xsi:type="xsd:string">djemb</slListName></multiRef><multiRef id="id15" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns15:HitWord" xmlns:ns15="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">59</fieldId><matchedWord xsi:type="xsd:string">mugabe</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">MUGABE</searchedWord></multiRef><multiRef id="id13" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns16:HitWord" xmlns:ns16="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id16" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns17:HitWord" xmlns:ns17="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">59</fieldId><matchedWord xsi:type="xsd:string">robert</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">ROBERT</searchedWord></multiRef><multiRef id="id31" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns18:HitWord" xmlns:ns18="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id18" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns19:HitWord" xmlns:ns19="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id17" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns20:HitWord" xmlns:ns20="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">59</fieldId><matchedWord xsi:type="xsd:string">mugabe</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">MUGABE</searchedWord></multiRef><multiRef id="id27" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns21:HitWord" xmlns:ns21="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id19" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns22:HitWord" xmlns:ns22="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id14" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns23:HitWord" xmlns:ns23="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">59</fieldId><matchedWord xsi:type="xsd:string">robert</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">ROBERT</searchedWord></multiRef><multiRef id="id12" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns24:HitWord" xmlns:ns24="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id25" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns25:HitWord" xmlns:ns25="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id21" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns26:HitWord" xmlns:ns26="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id30" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns27:HitWord" xmlns:ns27="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id20" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns28:HitWord" xmlns:ns28="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id29" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns29:HitWord" xmlns:ns29="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id22" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns30:HitWord" xmlns:ns30="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id24" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns31:HitWord" xmlns:ns31="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id28" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns32:HitWord" xmlns:ns32="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef><multiRef id="id23" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns33:HitWord" xmlns:ns33="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">insurance</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">INSURANCE</searchedWord></multiRef><multiRef id="id26" soapenc:root="0" soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" xsi:type="ns34:HitWord" xmlns:ns34="urn:commons.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"><fieldId xsi:type="xsd:string">84</fieldId><matchedWord xsi:type="xsd:string">agent</matchedWord><score xsi:type="xsd:double">1.0</score><searchedWord xsi:type="xsd:string">AGENT</searchedWord></multiRef></soapenv:Body></soapenv:Envelope> 
        XML;
	    $this->session->set_userdata('sesuatu', $sesuatu);
        $xmlRes = simplexml_load_string($sesuatu);

        $statuss = $xmlRes->xpath('//status');
        foreach ($statuss as $s){  
            $status = $s;
        } 
        
        $hits = $xmlRes->xpath('//fieldId');
        foreach ($hits as $hit){  
            //$items[]=$hit;
            if ($hit=='51D'){
                $ISSUING_BANK_HIT= 'Y';
            }
            if ($hit=='57D'){
                $ADVISING_BANK_HIT= 'Y';
            }
            if ($hit==50){
                $APPLICANT_HIT= 'Y';
            }
            if ($hit==59){
                $BENEFICIARY_HIT= 'Y';
            }
            if ($hit=='44E'){
                $PORT_OF_LOADING_HIT= 'Y';
            }
            if ($hit=='44F'){
                $PORT_OF_DISCHARGE_HIT= 'Y';
            }
            if ($hit=='44A'){
                $PLACE_OF_TAKING_IN_CHARGE_HIT= 'Y';
            }
            if ($hit=='44B'){
                $PLACE_OF_DESTINATION_HIT= 'Y';
            }
            if ($hit=='45A'){
                $DESCRIPTION_OF_GOOODS_HIT= 'Y';
            }
            if ($hit=='53A'){
                $COUNTRY_OF_ORIGIN_HIT= 'Y';
            }
            if ($hit==60){
                $SHIPPER_HIT= 'Y';
            }
            if ($hit==61){
                $NOTIFY_PARTY_HIT= 'Y';
            }
            if ($hit==62){
                $CONSIGNEE_HIT= 'Y';
            }
            if ($hit==70){
                $VESSEL_PRE_CARRIAGE_HIT= 'Y';
            }
            if ($hit==71){
                $VESSEL_MAIN_VESSEL_HIT= 'Y';
            }
            if ($hit==72){
                $CARRIER_HIT= 'Y';
            }
            if ($hit==73){
                $MASTER_HIT= 'Y';
            }
            if ($hit==74){
                $CHARTERER_HIT= 'Y';
            }
            if ($hit==75){
                $OWNER_HIT= 'Y';
            }
            if ($hit==76){
                $AGENT_OF_CARRIER_HIT= 'Y';
            }
            if ($hit==80){
                $DELIVERY_AGENT_IN_TRANSPORT_DOC_HIT= 'Y';
            }
            if ($hit==81){
                $SHIPPING_COMPANY_HIT= 'Y';
            }
            if ($hit==82){
                $INSURANCE_COMPANY_HIT= 'Y';
            }
            if ($hit==83){
                $AGENT_OF_INSURANCE_COMPANY_HIT= 'Y';
            }
            if ($hit==84){
                $SETTLING_AGENT_OF_INSURANCE_HIT= 'Y';
            }
            if ($hit==85){
                $ISSUER_OF_CERT_OF_ANALYSIS_HIT= 'Y';
            }
            if ($hit==86){
                $ISSUER_OF_PACKING_LIST_HIT= 'Y';
            }
            if ($hit==87){
                $ISSUER_OF_HEALTH_CERTIFICATE_HIT= 'Y';
            }
            if ($hit==88){
                $MANUFACTURER_HIT= 'Y';
            }
            if ($hit==90){
                $OTHERS_HIT='Y';
            } 
        }
        // } catch (SoapFault $e) {
        //     $this->session->set_userdata('error', $e);
        // }


        $data = array(
            //'REQUEST_ID' => $reqid,
            'ISSUING_BANK' => $this->input->post('ISSUING_BANK'),
            'ADVISING_BANK' => $this->input->post('ADVISING_BANK'),
            'APPLICANT' => $this->input->post('APPLICANT'),
            'BENEFICIARY' => $this->input->post('BENEFICIARY'),
            'PORT_OF_LOADING' => $this->input->post('PORT_OF_LOADING'),
            'PORT_OF_DISCHARGE' => $this->input->post('PORT_OF_DISCHARGE'),
            'PLACE_OF_TAKING_IN_CHARGE' => $this->input->post('PLACE_OF_TAKING_IN_CHARGE'),
            'PLACE_OF_DESTINATION' => $this->input->post('PLACE_OF_DESTINATION'),
            'DESCRIPTION_OF_GOOODS' => $this->input->post('DESCRIPTION_OF_GOOODS'),
            'COUNTRY_OF_ORIGIN' => $this->input->post('COUNTRY_OF_ORIGIN'),
            'SHIPPER' => $this->input->post('SHIPPER'),
            'NOTIFY_PARTY' => $this->input->post('NOTIFY_PARTY'),
            'CONSIGNEE'=> $this->input->post('CONSIGNEE'),
            'VESSEL_PRE_CARRIAGE'=> $this->input->post('VESSEL_PRE_CARRIAGE'),
            'VESSEL_MAIN_VESSEL'=> $this->input->post('VESSEL_MAIN_VESSEL'),
            'CARRIER'=> $this->input->post('CARRIER'),
            'MASTER'=> $this->input->post('MASTER'),
            'CHARTERER'=> $this->input->post('CHARTERER'),
            'OWNER'=> $this->input->post('OWNER'),
            'AGENT_OF_CARRIER'=> $this->input->post('AGENT_OF_CARRIER'),
            'DELIVERY_AGENT_IN_TRANSPORT_DOC'=> $this->input->post('DELIVERY_AGENT_IN_TRANSPORT_DOC'),
            'SHIPPING_COMPANY'=> $this->input->post('SHIPPING_COMPANY'),
            'INSURANCE_COMPANY'=> $this->input->post('INSURANCE_COMPANY'),
            'AGENT_OF_INSURANCE_COMPANY'=> $this->input->post('AGENT_OF_INSURANCE_COMPANY'),
            'SETTLING_AGENT_OF_INSURANCE'=> $this->input->post('SETTLING_AGENT_OF_INSURANCE'),
            'ISSUER_OF_CERT_OF_ANALYSIS'=> $this->input->post('ISSUER_OF_CERT_OF_ANALYSIS'),
            'ISSUER_OF_PACKING_LIST'=> $this->input->post('ISSUER_OF_PACKING_LIST'),
            'ISSUER_OF_HEALTH_CERTIFICATE'=> $this->input->post('ISSUER_OF_HEALTH_CERTIFICATE'),
            'MANUFACTURER'=> $this->input->post('MANUFACTURER'),
            'OTHERS'=> $this->input->post('OTHERS'),
            'USER_ID'=> $this->input->post('USER_ID'),
            'STATUS'=> $status,
            'CREATED_TIMESTAMP'=> $this->input->post('CREATED_TIMESTAMP'),
            'ISSUING_BANK_HIT'=> $ISSUING_BANK_HIT ,
            'ADVISING_BANK_HIT'=> $ADVISING_BANK_HIT ,
            'APPLICANT_HIT'=> $APPLICANT_HIT ,
            'BENEFICIARY_HIT'=> $BENEFICIARY_HIT ,
            'PORT_OF_LOADING_HIT'=> $PORT_OF_LOADING_HIT ,
            'PORT_OF_DISCHARGE_HIT'=> $PORT_OF_DISCHARGE_HIT ,
            'PLACE_OF_TAKING_IN_CHARGE_HIT'=> $PLACE_OF_TAKING_IN_CHARGE_HIT ,
            'PLACE_OF_DESTINATION_HIT'=> $PLACE_OF_DESTINATION_HIT ,
            'DESCRIPTION_OF_GOOODS_HIT'=> $DESCRIPTION_OF_GOOODS_HIT ,
            'COUNTRY_OF_ORIGIN_HIT'=> $COUNTRY_OF_ORIGIN_HIT ,
            'SHIPPER_HIT'=> $SHIPPER_HIT ,
            'NOTIFY_PARTY_HIT'=> $NOTIFY_PARTY_HIT ,
            'CONSIGNEE_HIT'=> $CONSIGNEE_HIT ,
            'VESSEL_PRE_CARRIAGE_HIT'=> $VESSEL_PRE_CARRIAGE_HIT ,
            'VESSEL_MAIN_VESSEL_HIT'=> $VESSEL_MAIN_VESSEL_HIT ,
            'CARRIER_HIT'=> $CARRIER_HIT ,
            'MASTER_HIT'=> $MASTER_HIT ,
            'CHARTERER_HIT'=> $CHARTERER_HIT ,
            'OWNER_HIT'=> $OWNER_HIT ,
            'AGENT_OF_CARRIER_HIT'=> $AGENT_OF_CARRIER_HIT ,
            'DELIVERY_AGENT_IN_TRANSPORT_DOC_HIT'=> $DELIVERY_AGENT_IN_TRANSPORT_DOC_HIT ,
            'SHIPPING_COMPANY_HIT'=> $SHIPPING_COMPANY_HIT ,
            'INSURANCE_COMPANY_HIT'=> $INSURANCE_COMPANY_HIT ,
            'AGENT_OF_INSURANCE_COMPANY_HIT'=> $AGENT_OF_INSURANCE_COMPANY_HIT ,
            'SETTLING_AGENT_OF_INSURANCE_HIT'=> $SETTLING_AGENT_OF_INSURANCE_HIT ,
            'ISSUER_OF_CERT_OF_ANALYSIS_HIT'=> $ISSUER_OF_CERT_OF_ANALYSIS_HIT ,
            'ISSUER_OF_PACKING_LIST_HIT'=> $ISSUER_OF_PACKING_LIST_HIT ,
            'ISSUER_OF_HEALTH_CERTIFICATE_HIT'=> $ISSUER_OF_HEALTH_CERTIFICATE_HIT ,
            'MANUFACTURER_HIT'=> $MANUFACTURER_HIT ,
            'OTHERS_HIT'=> $OTHERS_HIT 
            );


	    $this->session->set_userdata('swift', $swift);
        $this->session->set_userdata('final', $final);
           
         if ($validation->run()) {
            //validasi input
        } else {
            
        }
        $errors = $xmlRes->xpath('//returnValue');
        foreach ($errors as $e){  
            $err = $e;
        } 
         $errorText = $xmlRes->xpath('//errorText');
        foreach ($errorText as $et){  
            $textError = $et;
        } 
        if ($err=='1'){
            $postModel->save($data,$reqid);
            $this->session->set_flashdata('success', 'Berhasil disubmit');
            return redirect('output/'.$reqid);
        } else{
            $dataa["textError"] = $textError;
            $this->load->view("errors/index",$dataa);
        }
		
        
    }

    
}
