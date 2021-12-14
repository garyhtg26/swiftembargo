<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PostModel extends CI_Model
{
    private $_table = "TRADE_EMB_NEW";
    private $_tablecountry = "COUNTRYCODE";
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
        $sql = "SELECT REQUEST_ID,STATUS,USER_ID,CREATED_TIMESTAMP FROM TRADE_EMB_NEW"; 
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
        $incrementid = $this->db->query("select LPAD(1+to_number(substr(NVL(MAX(REQUEST_ID),'TSYYMMDD00000000'),-8)),8,'0') as REQUEST_ID FROM trade_emb_new where REQUEST_ID LIKE 'TS".$currentDate."%'");
        $hasil = "";
        foreach ($incrementid->result_array() as $row)
            $hasil = $row['REQUEST_ID'];
        
        $ids = "TS{$currentDate}{$hasil}" ;
        return $ids;
    }
    public function save($datas)
    {
        
        $data = $datas;
        $this->db->insert($this->_table, $data);
        
    }
    
    public function updatehit($id,$hits)
    {
        foreach ($hits as $h) {
            if ($h==59){
                $dataHit= array(
                    'BENEFICIARY_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==60){
                $dataHit= array(
                    'SHIPPER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==61){
                $dataHit= array(
                    'NOTIFY_PARTY_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==62){
                $dataHit= array(
                    'CONSIGNEE_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==70){
                $dataHit= array(
                    'VESSEL_PRE_CARRIAGE_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==71){
                $dataHit= array(
                    'VESSEL_MAIN_VESSEL_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==72){
                $dataHit= array(
                    'CARRIER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==73){
                $dataHit= array(
                    'MASTER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==74){
                $dataHit= array(
                    'CHARTERER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==75){
                $dataHit= array(
                    'OWNER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==76){
                $dataHit= array(
                    'AGENT_OF_CARRIER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==80){
                $dataHit= array(
                    'DELIVERY_AGENT_IN_TRANSPORT_DOC_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==81){
                $dataHit= array(
                    'SHIPPING_COMPANY_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==82){
                $dataHit= array(
                    'INSURANCE_COMPANY_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==83){
                $dataHit= array(
                    'AGENT_OF_INSURANCE_COMPANY_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==84){
                $dataHit= array(
                    'SETTLING_AGENT_OF_INSURANCE_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==85){
                $dataHit= array(
                    'ISSUER_OF_CERT_OF_ANALYSIS_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==86){
                $dataHit= array(
                    'ISSUER_OF_PACKING_LIST_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==87){
                $dataHit= array(
                    'ISSUER_OF_HEALTH_CERTIFICATE_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==88){
                $dataHit= array(
                    'MANUFACTURER_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }
            if ($h==90){
                $dataHit= array(
                    'OTHERS_HIT'=> 1,  
                );
                $this->db->where('REQUEST_ID', $id);
                $this->db->update($this->_table, $dataHit);
            }

          }
        
           
    }

    
}
