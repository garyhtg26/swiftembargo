<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PostModel");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data["username"] = $this->product_model->getAll();
        $this->load->view('templates/header');
        $this->load->view("input");
        $this->load->view('templates/footer');
        
    }

    public function store()
    {
        $postModel = $this->PostModel;
        $validation = $this->form_validation;
        $validation->set_rules($postModel->rules());
            $wsdl   = "http://10.230.83.97:8080/embargo/services/TransactionScoring03?wsdl"; 
            $client = new SoapClient($wsdl, array(  'soap_version' => SOAP_1_1,
                                                     'trace' => true,
                                                  )); 
            try {
                $swift = "{1:F01EFGBGRAAAXXX3121734186}{2:I700ABNAKRSEXXXXN}{4:\n:20:".$this->input->post('id')."\n:51D:".$this->input->post('issuebank')."\n:57D:".$this->input->post('advisingbank')."\n:50:".$this->input->post('applicant')."\n:59:".$this->input->post('beneficiary')."\n:44E:".$this->input->post('portofloading')."\n:44F:".$this->input->post('portofdischarge')."\n:44A:".$this->input->post('placeoftaking')."\n:44B:".$this->input->post('placeofdestination')."\n:45A:".$this->input->post('descriptionofgoods')."\n:53A:".$this->input->post('countryoforigin')."\n:45A:".$this->input->post('shipper')."\n:45A:".$this->input->post('notifyparty')."\n:45A:".$this->input->post('consignee')."\n:47A:".$this->input->post('precarriage')."\n:47A:".$this->input->post('mainvessel')."\n:47A:".$this->input->post('carrier')."\n:47A:".$this->input->post('master')."\n:47A:".$this->input->post('charterer')."\n:47A:".$this->input->post('owner')."\n:47A:".$this->input->post('agentofcarrier')."\n:47A:".$this->input->post('deliveryagent')."\n:47A:".$this->input->post('shipingcompany')."\n:46A:".$this->input->post('insuracecompany')."\n:46A:".$this->input->post('agentofinsurance')."\n:46A:".$this->input->post('settlingagent')."\n:46A:".$this->input->post('issuerofcert')."\n:45A:".$this->input->post('issuerofpacking')."\n:45A:".$this->input->post('issuerofhealth')."\n:45A:".$this->input->post('manufacturer')."\n:46A:".$this->input->post('other')."\n-}";
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
                            <additionalParameter xsi:type="tran:ArrayOf_tns2_AdditionalData" soapenc:arrayType="urn:AdditionalData[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
                            <inOut xsi:type="xsd:string">in</inOut>
                            <instance xsi:type="xsd:string">1</instance>
                            <paymentSystem xsi:type="xsd:string">System1</paymentSystem>
                            <searchMode xsi:type="xsd:string">verbose</searchMode>
                            <trxFormat xsi:type="xsd:string">mt</trxFormat>
                            </params>
                            <data xsi:type="urn:TransactionData" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
                            <requestId xsi:type="xsd:string">...</requestId>
                            <textData xsi:type="xsd:string">...</textData>
                            <transactionIds xsi:type="tran:ArrayOf_xsd_string" soapenc:arrayType="xsd:string[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
                            <xmlData xsi:type="xsd:base64Binary">cid:482434121934</xmlData>
                            </data>
                            </v3:scoreTransaction>
                            </soapenv:Body>
                            </soapenv:Envelope>
                            XML;
                $xml = simplexml_load_string($string);
                $args = array(new SoapVar($xml, XSD_ANYXML));    
                $res  = $client->__soapCall('sendObject', $args);
                return $res;
            } catch (SoapFault $e) {
                echo "Error: {$e}";
            }
            echo "<hr>Last Request";
            echo "<pre>", htmlspecialchars($client->__getLastRequest()), "</pre>";

            $swift = "{1:F01EFGBGRAAAXXX3121734186}{2:I700ABNAKRSEXXXXN}{4:\n:20:".$this->input->post('REQUEST_ID')."\n:51D:".$this->input->post('ISSUING_BANK')."\n:57D:".$this->input->post('ADVISING_BANK')."\n:50:".$this->input->post('APPLICANT')."\n:59:".$this->input->post('BENEFICIARY')."\n:44E:".$this->input->post('PORT_OF_LOADING')."\n:44F:".$this->input->post('PORT_OF_DISCHARGE')."\n:44A:".$this->input->post('PLACE_OF_TAKING_IN_CHARGE')."\n:44B:".$this->input->post('PLACE_OF_DESTINATION')."\n:45A:".$this->input->post('DESCRIPTION_OF_GOOODS')."\n:53A:".$this->input->post('COUNTRY_OF_ORIGIN')."\n:45A:".$this->input->post('SHIPPER')."\n:45A:".$this->input->post('NOTIFY_PARTY')."\n:45A:".$this->input->post('CONSIGNEE')."\n:47A:".$this->input->post('VESSEL_PRE_CARRIAGE')."\n:47A:".$this->input->post('VESSEL_MAIN_VESSEL')."\n:47A:".$this->input->post('CARRIER')."\n:47A:".$this->input->post('MASTER')."\n:47A:".$this->input->post('CHARTERER')."\n:47A:".$this->input->post('OWNER')."\n:47A:".$this->input->post('AGENT_OF_CARRIER')."\n:47A:".$this->input->post('DELIVERY_AGENT_IN_TRANSPORT_DOC')."\n:47A:".$this->input->post('SHIPPING_COMPANY')."\n:46A:".$this->input->post('INSURANCE_COMPANY')."\n:46A:".$this->input->post('AGENT_OF_INSURANCE_COMPANY')."\n:46A:".$this->input->post('SETTLING_AGENT_OF_INSURANCE')."\n:46A:".$this->input->post('ISSUER_OF_CERT_OF_ANALYSIS')."\n:45A:".$this->input->post('ISSUER_OF_PACKING_LIST')."\n:45A:".$this->input->post('ISSUER_OF_HEALTH_CERTIFICATE')."\n:45A:".$this->input->post('MANUFACTURER')."\n:46A:".$this->input->post('OTHERS')."\n-}";
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
                            <additionalParameter xsi:type="tran:ArrayOf_tns2_AdditionalData" soapenc:arrayType="urn:AdditionalData[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
                            <inOut xsi:type="xsd:string">in</inOut>
                            <instance xsi:type="xsd:string">1</instance>
                            <paymentSystem xsi:type="xsd:string">System1</paymentSystem>
                            <searchMode xsi:type="xsd:string">verbose</searchMode>
                            <trxFormat xsi:type="xsd:string">mt</trxFormat>
                            </params>
                            <data xsi:type="urn:TransactionData" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
                            <requestId xsi:type="xsd:string">...</requestId>
                            <textData xsi:type="xsd:string">...</textData>
                            <transactionIds xsi:type="tran:ArrayOf_xsd_string" soapenc:arrayType="xsd:string[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
                            <xmlData xsi:type="xsd:base64Binary">cid:482434121934</xmlData>
                            </data>
                            </v3:scoreTransaction>
                            </soapenv:Body>
                            </soapenv:Envelope>
                            XML;
                $xml = simplexml_load_string($string);

            $requestIds = $xml->xpath('//requestId');
            foreach ($requestIds as $requestId) $requestId[0] = $this->input->post('id');
            $textDatas = $xml->xpath('//textData');
            foreach ($textDatas as $textData) $textData[0] = $swift;
            
            // $userNames = $xml->xpath('//userName');
            // foreach ($userNames as $userName) $userName[0] = getenv('WS_USERNAME');
            // $passs = $xml->xpath('//pass');
            // foreach ($passs as $pass) $pass[0] = getenv('WS_PASSWORD');

            $final = $xml->asXML();

            // Create the SoapClient instance
            // $url         = "http://localhost:8080/embargo/services/TransactionScoring03";
            // $soapclient     = new SoapClient($url, array("trace" => 1, "exception" => 0));
            // $response =$soapclient->scoreTransaction($final);
            // if($response->scoreTransactionResult->Status == "Success")
            // {
            //     echo "SOAP Sent!";
            // }
            $this->session->set_userdata('swift', $swift);
            $this->session->set_userdata('final', $final);
           
        if ($validation->run()) {
            $postModel->save();
            $this->session->set_flashdata('success', 'Berhasil disubmit');
        }
		// $data["id"] = $this->input->post('id');
        // $this->load->view("output",$data);
        return redirect('output/'.$this->input->post('REQUEST_ID'));
    }
	public function view($id)
    {
        $postModel = $this->PostModel;
        $ids = $this->uri->segment(2);
        $data["post"] = $postModel->getById($ids);
        if (!$data["post"]) show_404();
        
        $this->load->view('templates/header');
        $this->load->view('output', $data);
        $this->load->view('templates/footer');
    }
    
}
