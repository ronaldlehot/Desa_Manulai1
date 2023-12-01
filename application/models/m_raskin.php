<?php
class M_raskin extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table='reff_raskin';
	
    //get instance
    $this->CI = get_instance();
  }
	public function get_raskin_flexigrid()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
        $this->CI->flexigrid->build_query();

        //Get contents
        $return['records'] = $this->db->get();

        //Build count query
        $this->db->select("count(id_raskin) as record_count")->from($this->_table);
        $this->CI->flexigrid->build_query(FALSE);
        $record_count = $this->db->get();
        $row = $record_count->row();

        //Get Record Count
        $return['record_count'] = $row->record_count;

        //Return all
        return $return;
    }
  function insertRaskin($data)
  {
    $this->db->insert($this->_table, $data);
  }
  
  function deleteRaskin($id)
  {
    $this->db->where('id_raskin', $id);
    $this->db->delete($this->_table);
  }
  
  function getRaskinByIdraskin($id)
  {	
    return $this->db->get_where($this->_table,array('id_raskin' => $id))->row();
  }
  
  function updateRaskin($where, $data)
  {
    $this->db->where($where);
    $this->db->update($this->_table, $data);
    return $this->db->affected_rows();
  }
}
?>