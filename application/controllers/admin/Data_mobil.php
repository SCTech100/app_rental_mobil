<?php

class Data_mobil extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if(empty($this->session->userdata('username'))){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth/login');
    }
    elseif($this->session->userdata('role_id') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }
  }

  public function index(){
    $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, tipe tp WHERE mb.id_tipe = tp.id_tipe")->result();
    //$data['mobil'] = $this->rental_model->get_data('mobil')->result();
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_mobil(){
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_mobil_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_mobil();
    }
    else{
      $id_tipe    = $this->input->post('id_tipe');   
      $status       = $this->input->post('status');
      $harga        = $this->input->post('harga'); 
      $gambar    = $_FILES['gambar']['name'];

      if($gambar=''){}
      else{
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
          echo "Gambar mobil gagal diupload";
        }
        else{
          $gambar = $this->upload->data('file_name');
        }
      }
      $data = array(
        'id_tipe'    => $id_tipe, 
        'status'       => $status,
        'harga'        => $harga, 
        'gambar'       => $gambar,
      ); 
      $this->rental_model->insert_data($data, 'mobil');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_mobil');
    }
  }

  public function update_mobil($id){
    $where = array('id_mobil' => $id);
    $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, tipe tp WHERE mb.id_tipe = tp.id_tipe AND mb.id_mobil = '$id'")->result();
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_mobil_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_mobil');
      $this->update_mobil($id);
    }
    else{
      $id           = $this->input->post('id_mobil');
      $id_tipe    = $this->input->post('id_tipe'); 
      $status       = $this->input->post('status');
      $harga        = $this->input->post('harga'); 
      $gambar    = $_FILES['gambar']['name'];

      if($gambar){
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('gambar')){
          $gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $gambar);
        }
        else{
          echo $this->upload->display_error();
        }
      }
      $data = array(
        'id_tipe'    => $id_tipe, 
        'status'       => $status,
        'harga'        => $harga,  
      );
      $where = array('id_mobil' => $id);

      $this->rental_model->update_data('mobil', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_mobil');
    }
  }

  public function detail_mobil($id){
    $data['detail'] = $this->rental_model->ambil_id_mobil($id);
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function delete_mobil($id){
    $where = array('id_mobil' => $id);

    $this->rental_model->delete_data($where, 'mobil');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_mobil');

  }

  public function _rules(){
    $this->form_validation->set_rules('id_tipe', 'Kode Tipe', 'required'); 
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    // $this->form_validation->set_rules('gambar', 'Gambar', 'required');
    // $this->form_validation->set_rules('denda', 'Denda', 'required');
    // $this->form_validation->set_rules('ac', 'AC', 'required');
    // $this->form_validation->set_rules('sopir', 'Sopir', 'required');
    // $this->form_validation->set_rules('mp3_player', 'MP3 Player', 'required');
    // $this->form_validation->set_rules('central_lock', 'Central Lock', 'required');
  }


}