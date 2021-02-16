<?php
  
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller{
  public function index()
  {
    $data['data'] = $this->UploadModel->getData('upload_file')->result();
    $this->load->view('index',$data);
  }
  public function aksiUpload()
  {
    $data = [
      'judul' => htmlspecialchars($this->input->post('judul')),
      'gambar' => $_FILES['gambar']
    ];
    if ($data['gambar']='') {

    }else{
      $config['upload_path']          = './assets/upload_gambar/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = $data['judul'].'-'.time();
      $config['overwrite']            = TRUE;

      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('gambar')){
          echo "Gagal";
      }else{
        $data['gambar'] = $this->upload->data('file_name');
      }
    }
    
    $this->UploadModel->insertData($data,'upload_file');
    redirect('');
  }

  public function hapus($id)
  {

    // tampung data gambar dari id
    $idGambar = $this->UploadModel->get_id($id)->row();
    $data = './assets/upload_gambar/'. $idGambar->gambar;
    // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
    if(is_readable($data) && unlink($data)){
       // hapus file di database
      $hapus = $this->UploadModel->hapus_gambar($id);
      redirect('');
    }else{
      echo "gagal hapus";
    }
    
  }

  public function edit_data($id)
  {
    $data['data'] = $this->UploadModel->get_id($id)->row();
    $this->load->view('edit',$data);
  }

  public function edit_aksi()
  {
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    // tampung data gambar dari id
    $idGambar = $this->UploadModel->get_id($id)->row();
    $data = './assets/upload_gambar/'. $idGambar->gambar;

    if(is_readable($data)){
      $config['upload_path']          = './assets/upload_gambar/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['file_name']            = $judul.'-'.time();

      $this->load->library('upload', $config);

      if($this->upload->do_upload('gambar')) {
        // eidt gambar dan judul, maka unlink gambar lama
        $upload_data = $this->upload->data();
        $name = $upload_data['file_name'];
        $data = [
          'judul' => $this->input->post('judul'),
          'gambar' => $name
        ];
        unlink('./assets/upload_gambar/'.$this->input->post('gambarLama',true));
        // update file di database
        
        $update = $this->UploadModel->update_gambar($id,$data);
        if ($update) {
          $this->session->set_flashdata('pesan','Data berhasil di update');
          redirect();
        } else {
          echo "gagal";
        }        
      }else{
        // $upload_data = $this->upload->data();
        // $name = $upload_data['file_name'];
        // $config['file_name'] = $judul;
        $data = [
          'judul' => $this->input->post('judul'),
          // 'gambar' => $name
        ];
        
        // update file di database
        $update = $this->UploadModel->update_gambar($id,$data);
        if ($update) {
          $this->session->set_flashdata('pesan','Data berhasil di update');
          redirect();
        } else {
          echo "gagal";
        }        
      }    
    }else{
      echo "gagal";
    }
    
  }
  
  public function edit_aksi_()
  {
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    // tampung data gambar dari id
    $idGambar = $this->UploadModel->get_id($id)->row();
    $data = './assets/upload_gambar/'. $idGambar->gambar;
    
    // update file dulu di dalam folder, jika berhasil update di databasenya
    if(is_readable($data) && unlink($data)){
      
      $config['upload_path']          = './assets/upload_gambar/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = $judul;
      $config['overwrite']            = TRUE;

      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('gambar')){
        echo "Gagal";
      }else{
        $upload_data = $this->upload->data();
        $name = $upload_data['file_name'];

        $data = [
          'judul' => $this->input->post('judul'),
          'gambar' => $name
        ];
        // update file di database
        $update = $this->UploadModel->update_gambar($id,$data);
        if ($update) {
          redirect();
        } else {
          echo "gagal";
        }        
      }
    }else{
      echo "gagal hapus";
    }
    
  }

  

} // akhir class