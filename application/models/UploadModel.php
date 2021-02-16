<?php
  
defined('BASEPATH') or exit('No direct script access allowed');
class UploadModel extends CI_Model{

  public function getData($table)
  {
    return $this->db->get($table);
  }
  public function insertData($data,$table)
  {
    $this->db->insert($table,$data);
  }
  public function hapus_gambar($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('upload_file');
  }

  public function get_id($id)
  {
    $this->db->where('id',$id);
    return $this->db->get('upload_file');
  }

  public function update_gambar($id,$data)
  {
    $this->db->where('id',$id);
    return $this->db->update('upload_file',$data);
  }


}//akhir class