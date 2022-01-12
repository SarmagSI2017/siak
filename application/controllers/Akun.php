<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url', 'form', 'sia', 'tgl_indo']);
    $this->load->library(['session', 'form_validation']);
    $this->load->model('Akun_model', 'akun', true);
    $this->load->model('Jurnal_model', 'jurnal', true);
    $this->load->model('User_model', 'user', true);
    $login = $this->session->userdata('login');
    if (!$login) {
      redirect('login');
    }
  }
  public function dataAkunUnsur()
  {
    $content = 'user/dataakun/data_akun_new';
    $titleTag = 'Data Akun Unsur Laporan';
    $dataAkun = $this->akun->getUnsurAkun();
    $this->load->view('template', compact('content', 'dataAkun', 'titleTag'));
  }
  public function all()
  {
    $content = 'user/dataakun/lihat_all_akun';
    $titleTag = 'Data Semua Akun';
    $dataAkun = $this->akun->getSubUnsurAkun();
    $this->load->view('template', compact('content', 'dataAkun', 'titleTag'));
  }
  // public function dataAkunSubUnsur()
  // {
  //   $content = 'user/dataakun/data_akun_unsur';
  //   $titleTag = 'Data Akun Unsur Laporan';
  //   $dataAkun = $this->akun->getSubUnsurAkun();
  //   $this->load->view('template', compact('content', 'dataAkun', 'titleTag'));
  // }
  public function dataAkunSubUnsur($no_unsur)
  {
    $title = 'Sub Unsur Data Akun';
    $titleTag = 'Sub Unsur Data Akun';
    $action = 'data_akun/detailunsur/' . $no_unsur;
    $content = 'user/dataakun/data_akun_unsur_aset';
    $dataAkun = $this->akun->getAkunByUnsur($no_unsur);
    $this->load->view('template', compact('content', 'dataAkun', 'titleTag','title','action'));
  }

  public function isNamaAkunThere($str)
  {

    $namaAkun = $this->akun->countAkunByNama($str);
    $similarAkun = $this->akun->getAkunByNo($this->input->post('no_reff'));
    if ($namaAkun >= 1 and strtolower($similarAkun->nama_reff) != strtolower($str)) {
      $this->form_validation->set_message('isNamaAkunThere', 'Nama Akun Sudah Ada');
      return false;
    }
    return true;
  }

  public function isNoAkunThere($str)
  {
    $noAkun = $this->akun->countAkunByNoReff($str);

    if ($noAkun >= 1) {
      $this->form_validation->set_message('isNoAkunThere', 'No.Reff Sudah Ada');
      return false;
    }
    return true;
  }

  public function createAkun()
  {
    $title = 'Tambah';
    $titleTag = 'Tambah Data Akun';
    $action = 'data_akun/tambah';
    $content = 'user/form_akun';
    $dataunsur = $this->akun->getUnsurAkun();

    if (!$_POST) {
      $data = (object) $this->akun->getDefaultValues();
    } else {
      $data = (object) $this->input->post(null, true);
      $data->id_user = $this->session->userdata('id');
    }

    if (!$this->akun->validate($title)) {
      $this->load->view('template', compact('content', 'title', 'action', 'data', 'titleTag', 'dataunsur'));
      return;
    }

    $this->akun->insertAkun($data);
    $this->session->set_flashdata('berhasil', 'Data Akun Berhasil Di Tambahkan');
    redirect('data_akun');
  }

  public function editAkun($no_reff = null)
  {
    $title = 'Edit';
    $titleTag = 'Edit Data Akun';
    $action = 'data_akun/edit/' . $no_reff;
    $content = 'user/form_akun';
    $dataunsur = $this->akun->getUnsurAkun();

    if (!$_POST) {
      $data = (object) $this->akun->getAkunByNo($no_reff);
    } else {
      $data = (object) $this->input->post(null, true);
      $data->id_user = $this->session->userdata('id');
    }

    if (!$this->akun->validate($title)) {
      $this->load->view('template', compact('content', 'title', 'action', 'data', 'titleTag','dataunsur'));
      return;
    }

    $this->akun->updateAkun($no_reff, $data);
    $this->session->set_flashdata('berhasil', 'Data Akun Berhasil Di Ubah');
    redirect('data_akun');
  }

  public function deleteAkun()
  {
    $id = $this->input->post('id', true);
    $noReffTransaksi = $this->jurnal->countJurnalNoReff($id);
    if ($noReffTransaksi > 0) {
      $this->session->set_flashdata('dataNull', 'No.Reff ' . $id . ' Tidak Bisa Di Hapus Karena Data Akun Ada Di Jurnal Umum');
      redirect('data_akun');
    }
    $this->akun->deleteAkun($id);
    $this->session->set_flashdata('berhasilHapus', 'Data akun dengan No.Reff ' . $id . ' berhasil di hapus');
    redirect('data_akun');
  }
}
