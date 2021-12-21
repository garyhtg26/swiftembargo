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
        $sql = "SELECT REQUEST_ID,STATUS,USER_ID,CREATED_TIMESTAMP FROM TRADE_EMB_NEW WHERE (STATUS = 'GO' OR STATUS ='HOLD') ORDER BY CREATED_TIMESTAMP DESC"; 
        return $this->db->query($sql)->result();
    }
   
    public function getAllCountry()
    {
        return $this->db->get($this->_tablecountry)->result();
    }
    public function getCountryById($id)
    {
        return $this->db->get_where($this->_tablecountry, ["CODE" => $id])->row();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["REQUEST_ID" => $id])->row();
    }

    function generateId() {
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = date('ymdHis');
        $incrementid = $this->db->query("select LPAD(1+to_number(substr(NVL(MAX(REQUEST_ID),'YYMMDDHHMMSS0000'),-4)),4,'0') as REQUEST_ID FROM trade_emb_new where REQUEST_ID LIKE 'TS".$currentDate."%'");
        $hasil = "";
        foreach ($incrementid->result_array() as $row)
            $hasil = $row['REQUEST_ID'];
        
        $ids = "{$currentDate}{$hasil}" ;
        return $ids;
    }

    public function save($datas,$id)
    {  
        $data = $datas;
        $this->db->where('REQUEST_ID', $id);
        $this->db->update($this->_table, $data);   
    }
    public function bookid($id)
    {   
        $this->REQUEST_ID = $id;
        $this->db->insert($this->_table,$this); 
    }
}
