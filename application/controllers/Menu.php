<?php

defined('BASEPATH') or exit('No direct script access allowed');

  class Menu extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Arsip_model');
    }

    public function index()
    {
      $search = $this->input->post('search');

      if ($search) {
        $data = array(
          'title' => 'Arsip Surat | Arsip',
          'dataSurat' => $this->Arsip_model->search($search),
          'searchVal' => $search
        );
      } else {
        $data = array(
          'title' => 'Arsip Surat | Arsip',
          'dataSurat' => $this->Arsip_model->get(),
          'searchVal' => ''
        );
      }

      $this->load->view('template/Header.php', $data);
      $this->load->view('template/Sidebar.php');
      $this->load->view('pages/arsip/index.php');
      $this->load->view('template/Footer.php');
    }

      public function add()
      {
        $data = array(
          'title' => 'Arsip Surat | Tambah Arsip',
        );

        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');


        if ($this->form_validation->run() == FALSE) {
          $this->load->view('template/Header.php', $data);
          $this->load->view('template/Sidebar.php');
          $this->load->view('pages/arsip/Add.php');
          $this->load->view('template/Footer.php');
        } else {
          $filename = $this->input->post('nomor_surat') . ' - ' . $this->input->post('kategori') . ' - ' . $this->input->post('judul');

          $upload = $this->Arsip_model->upload($filename);
          if ($upload['result'] == 'success') {
            $this->Arsip_model->add($upload);
            $this->session->set_flashdata(
              'pesan',
              '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Surat Berhasil di arsipkan
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>'
          );
            redirect('menu');
          } else {
            echo $upload['error'];
          }
        }
      }

      public function update($id)
      {
        $data = array(
          'title' => 'Arsip Surat | Ubah Arsip',
          'dataSurat' => $this->Arsip_model->get($id),
        );

        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');


        if ($this->form_validation->run() == FALSE) {
          $this->load->view('template/Header.php', $data);
          $this->load->view('template/Sidebar.php');
          $this->load->view('pages/arsip/edit.php');
          $this->load->view('template/Footer.php');
        } else {
          $filename = $this->input->post('nomor_surat') . ' - ' . $this->input->post('kategori') . ' - ' . $this->input->post('judul');

          $upload = $this->Arsip_model->upload($filename);
          if ($upload['result'] == 'success') {
            $this->Arsip_model->update($id, $upload);
            $this->session->set_flashdata(
              'pesan',
              '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Data berhasil di edit ! 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>'
          );
            redirect('menu');
          } else {
            echo $upload['error'];
          }
        }
      }

      public function detail($id)
      {
        $data = array(
          'title' => 'Arsip Surat | Lihat Arsip',
          'dataSurat' => $this->Arsip_model->get($id),
        );
        $this->load->view('template/Header.php', $data);
        $this->load->view('template/Sidebar.php');
        $this->load->view('pages/arsip/detail.php');
        $this->load->view('template/Footer.php');
      }

      public function delete($id)
      {
        $this->Arsip_model->delete($id);
        $this->session->set_flashdata(
          'pesan',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil di hapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
          </button>
          </div>'
      );
      redirect('Menu');
      }

      public function download($id)
      {
        $file = $this->Arsip_model->get($id);

        force_download(FCPATH . 'assets/uploads/pdf/' . $file[0]->file, NULL);
      }

      public function about()
      {
        
        $data['title'] = 'Arsip Surat | About';
        $this->load->view('template/Header.php', $data);
        $this->load->view('template/Sidebar.php');
        $this->load->view('pages/about/index.php');
        $this->load->view('template/Footer.php');
      }
}

/* End of file Main.php */