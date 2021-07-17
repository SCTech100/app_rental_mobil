<?php

class Data_mobil extends CI_Controller{

  public function index(){
    // $data['mobil'] = $this->rental_model->get_data('mobil')->result();
    $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, tipe tp WHERE   mb.id_tipe=tp.id_tipe ")->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/data_mobil', $data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_mobil($id){
    $data['detail'] = $this->db->query("SELECT * FROM mobil mb, tipe tp WHERE   mb.id_tipe=tp.id_tipe AND mb.id_mobil = $id ")->result();
    //$data['detail'] = $this->rental_model->ambil_id_mobil($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_mobil', $data);
    $this->load->view('templates_customer/footer');
  }


}