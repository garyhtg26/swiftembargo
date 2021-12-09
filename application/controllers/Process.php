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
        $validation = $this->form_validation;
        $validation->set_rules($postModel->rules());



	$wsdl   = "http://10.230.83.97:8080/embargo/services/TransactionScoring03?wsdl"; 
	$location = "http://10.230.83.97:8080/embargo/services/TransactionScoring03";
	$action = "http://localhost:8090/mockCustomerManagementSoapHttpBinding/scoreTransaction";

	$client = new SoapClient($wsdl, array(
	    'soap_version'  => SOAP_1_1,
	    'cache_wsdl'    => WSDL_CACHE_NONE, 
	    'cache_ttl'     => 86400, 
	    'trace'         => true,
	    'exceptions'    => true,
	));



        try {
            $swift = "{1:F01EFGBGRAAAXXX3121734186}{2:I700ABNAKRSEXXXXN}{4:\n:20:".(($this->input->post('REQUEST_ID')!='') ? $this->input->post('REQUEST_ID') : $this->$postModel->generateId())."\n:51D:".$this->input->post('ISSUING_BANK')."\n:57D:".$this->input->post('ADVISING_BANK')."\n:50:".$this->input->post('APPLICANT')."\n:59:".$this->input->post('BENEFICIARY')."\n:44E:".$this->input->post('PORT_OF_LOADING')."\n:44F:".$this->input->post('PORT_OF_DISCHARGE')."\n:44A:".$this->input->post('PLACE_OF_TAKING_IN_CHARGE')."\n:44B:".$this->input->post('PLACE_OF_DESTINATION')."\n:45A:".$this->input->post('DESCRIPTION_OF_GOOODS')."\n:53A:".$this->input->post('COUNTRY_OF_ORIGIN')."\n:60:".$this->input->post('SHIPPER')."\n:61:".$this->input->post('NOTIFY_PARTY')."\n:62:".$this->input->post('CONSIGNEE')."\n:70:".$this->input->post('VESSEL_PRE_CARRIAGE')."\n:71:".$this->input->post('VESSEL_MAIN_VESSEL')."\n:72:".$this->input->post('CARRIER')."\n:73:".$this->input->post('MASTER')."\n:74:".$this->input->post('CHARTERER')."\n:75:".$this->input->post('OWNER')."\n:76:".$this->input->post('AGENT_OF_CARRIER')."\n:80:".$this->input->post('DELIVERY_AGENT_IN_TRANSPORT_DOC')."\n:81:".$this->input->post('SHIPPING_COMPANY')."\n:82:".$this->input->post('INSURANCE_COMPANY')."\n:83:".$this->input->post('AGENT_OF_INSURANCE_COMPANY')."\n:84:".$this->input->post('SETTLING_AGENT_OF_INSURANCE')."\n:85:".$this->input->post('ISSUER_OF_CERT_OF_ANALYSIS')."\n:86:".$this->input->post('ISSUER_OF_PACKING_LIST')."\n:87:".$this->input->post('ISSUER_OF_HEALTH_CERTIFICATE')."\n:88:".$this->input->post('MANUFACTURER')."\n:90:".$this->input->post('OTHERS')."\n-}";
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
            foreach ($requestIds as $requestId) $requestId[0] = (!empty($this->input->post('REQUEST_ID')) ? $this->input->post('REQUEST_ID') : $this->$postModel->generateId());
            $textDatas = $xml->xpath('//textData');
            foreach ($textDatas as $textData) $textData[0] = $swift;
            
            // $userNames = $xml->xpath('//userName');
            // foreach ($userNames as $userName) $userName[0] = getenv('WS_USERNAME');
            // $passs = $xml->xpath('//pass');
            // foreach ($passs as $pass) $pass[0] = getenv('WS_PASSWORD');

            $final = $xml->asXML();

	    $sesuatu = $client->__doRequest($final, $location, $action, '1', false);
	    $this->session->set_userdata('sesuatu', $sesuatu);
        
        $xmlRes = simplexml_load_string($sesuatu);
        foreach ($xmlRes as $s) {  
        $this->session->set_userdata('status', $s->status);
        }
        } catch (SoapFault $e) {
            $this->session->set_userdata('error', $e);
        }

	    $this->session->set_userdata('swift', $swift);
        $this->session->set_userdata('final', $final);
           
         if ($validation->run()) {
            $postModel->save();
            $this->session->set_flashdata('success', 'Berhasil disubmit');
            return redirect('output/'.$this->input->post('REQUEST_ID'));
        } else {
            $idgenerate = $postModel->generateId();
            $postModel->savegenerate($idgenerate);
            $this->session->set_flashdata('success', 'Berhasil disubmit');
            return redirect('output/'.$idgenerate);
        }
		// $data["id"] = $this->input->post('id');
        // $this->load->view("output",$data);
        
    }

    
}
