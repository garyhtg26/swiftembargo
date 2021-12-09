<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PostModel extends CI_Model
{
    private $_table = "TRADE_EMB";
    private $_tablecountry = "COUNTRYCODE";
    private $oracle_db;
    public $REQUEST_ID;
    
    public function __construct() //model construct function
    {
        $this->oracle_db = $this->load->database('default',true); // oracle db
    }

    public function rules()
    {
        return [
            ['field' => 'REQUEST_ID',
            'label' => 'ID',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        // return $this->db->get($this->_table)->result();
        $sql = "SELECT REQUEST_ID,STATUS,USER_ID,CREATED_TIMESTAMP FROM TRADE_EMB"; 
        return $this->db->query($sql)->result();
    }
   
    public function getAllCountry()
    {
        return $this->db->get($this->_tablecountry)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["REQUEST_ID" => $id])->row();
    }
    function generateId() {
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('ymd');
        $incrementid = $this->db->query("select LPAD(1+to_number(substr(NVL(MAX(REQUEST_ID),'TSYYMMDD00000000'),-8)),8,'0') as REQUEST_ID FROM trade_emb where REQUEST_ID LIKE 'TS".$currentDate."%'");
        $result = $incrementid->result();
        $hasil = "";
        foreach ($incrementid->result_array() as $row)
            $hasil = $row['REQUEST_ID'];
        
        $ids = "TS{$currentDate}{$hasil}" ;
        return $ids;
    }
    public function save()
    {
        
        $data = array(
                'REQUEST_ID' => $this->input->post('REQUEST_ID'),
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
                // 'XML_SOAP_REQ'=> $this->session->userdata('final'),
                // 'XML_SOAP_RSP'=> $this->session->userdata('sesuatu'),
                // 'STATUS'=> $this->session->userdata('status'),
                // 'CREATED_TIMESTAMP'=> $this->input->post('CREATED_TIMESTAMP')
    );
        $this->db->insert($this->_table, $data);
        
        // $sql= "UPDATE TRADE_EMB
        // SET XML_SOAP_REQ = '.$this->session->userdata('final'),.', XML_SOAP_RSP= '.$this->session->userdata('sesuatu').', STATUS='.$this->session->userdata('status').',CREATED_TIMESTAMP = '.$this->input->post('CREATED_TIMESTAMP').'
        // WHERE REQUEST_ID='.$this->REQUEST_ID.';";
        // $this->db->query($sql);
        $data2 = array(
                'XML_SOAP_REQ'=> $this->session->userdata('final'),
                'STATUS'=> $this->session->userdata('status'),  
        );
        
        $this->db->where('REQUEST_ID', $this->input->post('REQUEST_ID'));
        $this->db->update($this->_table, $data2);

        $data3 = array(
                'XML_SOAP_RSP'=> $this->session->userdata('sesuatu'),
                'CREATED_TIMESTAMP'=> $this->input->post('CREATED_TIMESTAMP')
        );
        
        $this->db->where('REQUEST_ID', $this->input->post('REQUEST_ID'));
        $this->db->update($this->_table, $data3);
        
    }
    public function savegenerate($id)
    {
        
        // $this->REQUEST_ID = $this->generateId();
        $data = array(
                'REQUEST_ID' => $id,
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
                // 'XML_SOAP_REQ'=> $this->session->userdata('final'),
                // 'XML_SOAP_RSP'=> $this->session->userdata('sesuatu'),
                // 'STATUS'=> $this->session->userdata('status'),
                // 'CREATED_TIMESTAMP'=> $this->input->post('CREATED_TIMESTAMP')
    );
        $this->db->insert($this->_table, $data);
        
        // $sql= "UPDATE TRADE_EMB
        // SET XML_SOAP_REQ = '.$this->session->userdata('final'),.', XML_SOAP_RSP= '.$this->session->userdata('sesuatu').', STATUS='.$this->session->userdata('status').',CREATED_TIMESTAMP = '.$this->input->post('CREATED_TIMESTAMP').'
        // WHERE REQUEST_ID='.$this->REQUEST_ID.';";
        // $this->db->query($sql);
        $data2 = array(
                'XML_SOAP_REQ'=> $this->session->userdata('final'),
                'STATUS'=> $this->session->userdata('status'),  
        );
        
        $this->db->where('REQUEST_ID', $id);
        $this->db->update($this->_table, $data2);

        $data3 = array(
                'XML_SOAP_RSP'=> $this->session->userdata('sesuatu'),
                'CREATED_TIMESTAMP'=> $this->input->post('CREATED_TIMESTAMP')
        );
        
        $this->db->where('REQUEST_ID', $id);
        $this->db->update($this->_table, $data3);
        }

    
}
