<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','form','sia','tgl_indo']);
        $this->load->library(['session','form_validation']);
        $this->load->model('Akun_model','akun',true);
        $this->load->model('Jurnal_model','jurnal',true);
        $this->load->model('User_model','user',true);
        $login = $this->session->userdata('login');
        if(!$login){
            redirect('login');
        }
    }

    public function index(){
        $titleTag = 'Dashboard';
        $content = 'user/dashboard';
        $jumlahAkun = $this->akun->countAtomicAkun();
        $jumlahJurnal = $this->jurnal->countJurnal();

        $this->load->view('template',compact('content','titleTag','jumlahAkun','jumlahJurnal'));
    }

    public function dataAkun(){
        $content = 'user/data_akun';
        $titleTag = 'Data Akun';
        $dataAkun = $this->akun->getAkun();
        $this->load->view('template',compact('content','dataAkun','titleTag'));
    }

    public function isNamaAkunThere($str){
        
        $namaAkun = $this->akun->countAkunByNama($str);
        $similarAkun = $this->akun->getAkunByNo($this->input->post('no_reff'));
        if($namaAkun >= 1 and strtolower($similarAkun->nama_reff) != strtolower($str)){
            $this->form_validation->set_message('isNamaAkunThere', 'Nama Akun Sudah Ada');
            return false;
        }
        return true;
    }

    public function isNoAkunThere($str){
        $noAkun = $this->akun->countAkunByNoReff($str);

        if($noAkun >= 1){
            $this->form_validation->set_message('isNoAkunThere', 'No.Reff Sudah Ada');
            return false;
        }
        return true;
    }

    public function createAkun(){
        $title = 'Tambah';
        $titleTag = 'Tambah Data Akun';
        $action = 'data_akun/tambah';
        $content = 'user/form_akun';

        if(!$_POST){
            $data = (object) $this->akun->getDefaultValues();
        }else{
            $data = (object) $this->input->post(null,true);
            $data->id_user = $this->session->userdata('id');
        }

        if(!$this->akun->validate($title)){
            $this->load->view('template',compact('content','title','action','data','titleTag'));
            return;
        }
        
        $this->akun->insertAkun($data);
        $this->session->set_flashdata('berhasil','Data Akun Berhasil Di Tambahkan');
        redirect('data_akun');
    }

    public function editAkun($no_reff = null){
        $title = 'Edit';
        $titleTag = 'Edit Data Akun';
        $action = 'data_akun/edit/'.$no_reff;
        $content = 'user/form_akun';

        if(!$_POST){
            $data = (object) $this->akun->getAkunByNo($no_reff);
        }else{
            $data = (object) $this->input->post(null,true);
            $data->id_user = $this->session->userdata('id');
        }

        if(!$this->akun->validate($title)){
            $this->load->view('template',compact('content','title','action','data','titleTag'));
            return;
        }
        
        $this->akun->updateAkun($no_reff,$data);
        $this->session->set_flashdata('berhasil','Data Akun Berhasil Di Ubah');
        redirect('data_akun');
    }

    public function deleteAkun(){
        $id = $this->input->post('id',true);
        $noReffTransaksi = $this->jurnal->countJurnalNoReff($id);
        if($noReffTransaksi > 0 ){
            $this->session->set_flashdata('dataNull','No.Reff '.$id.' Tidak Bisa Di Hapus Karena Data Akun Ada Di Jurnal Umum');
            redirect('data_akun');
        }
        $this->akun->deleteAkun($id);
        $this->session->set_flashdata('berhasilHapus','Data akun dengan No.Reff '.$id.' berhasil di hapus');
        redirect('data_akun');
    }

    public function jurnalUmum(){
        $titleTag = 'Rekam Transaksi';
        $content = 'user/jurnal_umum_main';
        $listJurnal = $this->jurnal->getJurnalByYearAndMonth();
        $tahun = $this->jurnal->getJurnalByYear();
        $this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
    }

    public function jurnalUmumDetail(){
        $content = 'user/jurnal_umum';
        $titleTag = 'Rekam Transaksi';

        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);
        $jurnals = null;

        if(empty($bulan) || empty($tahun)){
            redirect('jurnal_umum');
        }

        $jurnals = $this->jurnal->getJurnalJoinAkunDetail($bulan,$tahun);
        $totalDebit = $this->jurnal->getTotalSaldoDetail('debit',$bulan,$tahun);
        $totalKredit = $this->jurnal->getTotalSaldoDetail('kredit',$bulan,$tahun);

        if($jurnals==null){
            $this->session->set_flashdata('dataNull','Data Jurnal Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('jurnal_umum');
        }

        $this->load->view('template',compact('content','jurnals','totalDebit','totalKredit','titleTag'));
    }

    public function createJurnal(){
        $title = 'Tambah'; 
        $content = 'user/form_jurnal'; 
        $action = 'jurnal_umum/tambah'; 
        $tgl_input = date('Y-m-d H:i:s'); 
        $id_user = $this->session->userdata('id'); 
        $titleTag = 'Tambah Rekam Transaksi';

        if(!$_POST){
            $data = (object) $this->jurnal->getDefaultValues();
        }else{

            
            for($i=0;$i<count($_POST['no_reff']);$i++)
            {
                $data = (object) [
                    'id_user'=>$id_user,
                    'no_reff'=>$this->input->post('no_reff[' . $i . ']',true),
                    'tgl_input'=>$tgl_input,
                    'tgl_transaksi'=>$this->input->post('tgl_transaksi',true),
                    'jenis_saldo'=>$this->input->post('jenis_saldo[' . $i . ']',true),
                    'saldo'=>$this->input->post('saldo[' . $i . ']',true),
                    'keterangan'=>$this->input->post('keterangan[' . $i . ']',true)
                ];
                $this->jurnal->insertJurnal($data);
            }
            
        }

        
        if(!$this->jurnal->validateJurnalCreation()){
            $this->load->view('template',compact('content','title','action','data','titleTag'));
            return;
        }
        
        $this->session->set_flashdata('berhasil','Data Jurnal Berhasil Di Tambahkan');
        redirect('jurnal_umum');    
    }

    public function editForm(){
        if($_POST){
            $id = $this->input->post('id',true);
            $title = 'Edit'; $content = 'user/form_jurnal'; $action = 'jurnal_umum/edit'; $titleTag = 'Edit Jurnal Umum';

            $data = (object) $this->jurnal->getJurnalById($id);

            $this->load->view('template',compact('content','title','action','data','id','titleTag'));
        }else{
            redirect('jurnal_umum');
        }
    }

    public function editJurnal(){
        $title = 'Edit'; $content = 'user/form_jurnal'; $action = 'jurnal_umum/edit'; $tgl_input = date('Y-m-d H:i:s'); $id_user = $this->session->userdata('id'); $titleTag = 'Edit Jurnal Umum';
        
        if($_POST){
            $data = (object) [
                'id_user'=>$id_user,
                'no_reff'=>$this->input->post('no_reff[0]',true),
                'tgl_input'=>$tgl_input,
                'tgl_transaksi'=>$this->input->post('tgl_transaksi',true),
                'jenis_saldo'=>$this->input->post('jenis_saldo[0]',true),
                'saldo'=>$this->input->post('saldo[0]',true),
                'keterangan'=>$this->input->post('keterangan[0]',true)
            ];
            $id = $this->input->post('id',true);
        }


        if(!$this->jurnal->validateJurnalCreation()){
            $this->load->view('template',compact('content','title','action','data','id','titleTag'));
            return;
        }
        
        $this->jurnal->updateJurnal($id,$data);
        $this->session->set_flashdata('berhasil','Data Jurnal Berhasil Di Ubah');
        redirect('jurnal_umum');    
    }

    public function deleteJurnal(){
        $id = $this->input->post('id',true);
        $this->jurnal->deleteJurnal($id);
        $this->session->set_flashdata('berhasilHapus','Data Jurnal berhasil di hapus');
        redirect('jurnal_umum');
    }

    public function bukuBesar(){
        $titleTag = 'Buku Besar';
        $content = 'user/buku_besar_main';
        $listJurnal = $this->jurnal->getJurnalByYearAndMonth();
        $tahun = $this->jurnal->getJurnalByYear();
        $this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
    }

    public function bukuBesarDetail(){
        $content = 'user/buku_besar';
        $titleTag = 'Buku Besar';
        
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);

        if(empty($bulan) ||empty($tahun)){
            redirect('buku_besar');
        }
        
        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);
        $data = null;
        $saldo = null;

        foreach($dataAkun as $row){
            $data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            $saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Data Buku Besar Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('buku_besar');
        }
        $jumlah = count($data);

        $this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo'));
        

        
    }

    public function neracaSaldo(){
        $titleTag = 'Neraca Saldo';
        $content = 'user/neraca_saldo_main';
        $listJurnal = $this->jurnal->getJurnalByYearAndMonth();
        $tahun = $this->jurnal->getJurnalByYear();
        $this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
    }

    public function neracaSaldoDetail(){
        $content = 'user/neraca_saldo';
        $titleTag = 'Neraca Saldo';

        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);

        if(empty($bulan) || empty($tahun)){
            redirect('neraca_saldo');
        }

        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);
        $data = null;
        $saldo = null;
        
        foreach($dataAkun as $row){
            $data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            $saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);

            
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Neraca Saldo Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('neraca_saldo');
        }

        $jumlah = count($data);

        $this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo'));
    }

    public function laporan(){
        $titleTag = 'Laporan';
        $content = 'user/laporan_main';
        $listJurnal = $this->jurnal->getJurnalByYearAndMonth();
        $tahun = $this->jurnal->getJurnalByYear();
        $this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
    }

    public function laporanCetak(){
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);
        $titleTag = 'Laporan '.bulan($bulan).' '.$tahun;

        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);

        $jurnals = $this->jurnal->getJurnalJoinAkunDetail($bulan,$tahun);
        $totalDebit = $this->jurnal->getTotalSaldoDetail('debit',$bulan,$tahun);
        $totalKredit = $this->jurnal->getTotalSaldoDetail('kredit',$bulan,$tahun);

        $data = null;
        $saldo = null;
        foreach($dataAkun as $row){
            $data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            $saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Laporan Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('laporan');
        }

        $jumlah = count($data);

        $data = $this->load->view('user/laporan',compact('titleTag','dataAkun','bulan','tahun','jurnals','totalDebit','totalKredit','data','saldo','jumlah'),true);
        // echo $data;
        // die();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_".bulan($bulan).'_'.$tahun;
        $this->pdf->load_view('user/laporan', $data);
    }

	/*
	 * Start Laporan Posisi Keuangan Section
	 * */
	/**
	 * Function to Render Laporan Posisi Keuangan Template
	 * @return void
	 */
    public function laporan_pk() {
        $titleTag = 'Laporan Posisi Keuangan';
		$content = 'user/laporan_pk';
		$listJurnal = $this->jurnal->getJurnalByYearAndMonth();
		$tahun = $this->jurnal->getJurnalByYear();
		$this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
	}

	public function laporanPKDetail() {
		$content = 'user/laporan_pk_detail';
        
        
		$bulan = $this->input->post('bulan',true);
		$tahun = $this->input->post('tahun',true);
		$titleTag = 'Laporan Posisi Keuangan  | '.bulan($bulan).' Tahun '.date('Y',strtotime($tahun));;

		if(empty($bulan) || empty($tahun)){
			redirect('laporan_pk');
		}

		$dataAkun = $this->akun->getAkunPKByMonthYear($bulan,$tahun);
        $dataAkunAN = $this->akun->getAkunLRByMonthYear($bulan,$tahun);
		$data = null;
        $dataAN = null;
		$saldo = null;
        $saldoAN = null;
        $periode= bulan($bulan).' Tahun '.$tahun;
        $kas = $this->jurnal->getLastMonthCash($bulan,$tahun); //jangan dihapus "i have no fuckin idea why deleting this shit causing SQL error"

        $tanpaPembatasan =$this->jurnal->getLastNetoTanpaPembatasan($bulan,$tahun);
        $denganPembatasan =$this->jurnal->getLastNetoDenganPembatasan($bulan,$tahun);

		foreach($dataAkun as $row){
			$data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
			$saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
		}

        foreach($dataAkunAN as $row){
			$dataAN[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
			$saldoAN[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
		}

		if($data == null || $saldo == null){
			$this->session->set_flashdata('dataNull','Laporan Posisi Keuangan pada Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
			redirect('laporan_pk');
		}

		$jumlah = count($data);
        $jumlahAN = count($dataAN);

        $totalTanpaPembatasan = 0;
        $totalDenganPembatasan = 0;
        $totalPendapatan = 0;
        $totalBeban = 0;
        $totalPendapatanBatas = 0;
        $totalBebanBatas = 0;
        $hasilPendapatanPembatasan = 0;
        $hasilBebanPembatasan = 0;
        $hasilPendapatanTanpaPembatasan = 0;
        $hasilBebanTanpaPembatasan = 0;
        
        for($i=0; $i<$jumlahAN; $i++) {
            $s = 0;
            $deb = $saldoAN[$i];
            if (substr($dataAN[$i][$s]->no_reff,0,2) == "4-") {
                for($j=0;$j<count($dataAN[$i]);$j++) {
                    $hasilPendapatanTanpaPembatasan += $deb[$j]->saldo;
                }
                $totalPendapatan += $hasilPendapatanTanpaPembatasan;
            }

            if (substr($dataAN[$i][$s]->no_reff,0,2) == "5-") {
                for($j=0;$j<count($dataAN[$i]);$j++) {
                    $hasilBebanTanpaPembatasan += $deb[$j]->saldo;
                }
                $totalBeban += $hasilBebanTanpaPembatasan;
            }
            
            if (substr($dataAN[$i][$s]->no_reff,0,3) == "6-1") {
                for($j=0;$j<count($dataAN[$i]);$j++) {
                    $hasilPendapatanPembatasan += $deb[$j]->saldo;
                }
                $totalPendapatanBatas += $hasilPendapatanPembatasan;
            }
            
            if (substr($dataAN[$i][$s]->no_reff,0,3) == "6-2") {
                for($j=0;$j<count($dataAN[$i]);$j++) {
                    $hasilBebanPembatasan += $deb[$j]->saldo;
                }
                $totalBebanBatas += $hasilBebanPembatasan;
            }
        }

        $totalTanpaPembatasan = $tanpaPembatasan + ($totalPendapatan - $totalBeban);
        $totalDenganPembatasan = $denganPembatasan + ($totalPendapatanBatas - $totalBebanBatas);

		$this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo','periode','totalTanpaPembatasan','totalDenganPembatasan'));

	}

	/*
	 * End Laporan Posisi Keuangan Section
	 * */

    /*
	 * Start Laporan LabaRugi Section
	 * */
	/**
	 * Function to Render Laporan LabaRugi Template
	 * @return void
	 */
	public function laporan_kompre() {
		$titleTag = 'Laporan Komprehensif';
		$content = 'user/laporan_kompre';
		$listJurnal = $this->jurnal->getJurnalByYearAndMonth();
		$tahun = $this->jurnal->getJurnalByYear();
		$this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
	}

	public function laporan_kompre_detail() {
		$content = 'user/laporan_kompre_detail';

		$bulan = $this->input->post('bulan',true);
		$tahun = $this->input->post('tahun',true);

		$titleTag = 'Laporan Komprehensif | '.bulan($bulan).' Tahun '.date('Y',strtotime($tahun));
        
		if(empty($bulan) || empty($tahun)){
			redirect('laporan_kompre');
		}

		$dataAkun = $this->akun->getAkunLRByMonthYear($bulan,$tahun);
		$data = null;
		$saldo = null;
        $periode= bulan($bulan).' Tahun '.date('Y',strtotime($tahun));

        $kas = $this->jurnal->getLastMonthCash($bulan,$tahun); //jangan dihapus "i have no fuckin idea why deleting this shit causing SQL error"


		foreach($dataAkun as $row){
			$data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
			$saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
            $header[] = (array) $this->akun->countAkunIndukByNoReff($row->no_reff);
		}


        $jumlah = count($data);

		if($data == null || $saldo == null){
			$this->session->set_flashdata('dataNull','Laporan Laba Rugi pada Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
			redirect('laporan_kompre');
		}

		

		$this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo', 'periode','header'));

	}

	/*
	 * End Laporan Aset Netto Section
	 * */
    /*
	 * Start Laporan Aset Netto Section
	 * */
	/**
	 * Function to Render Laporan Aset Netto Template
	 * @return void
	 */
	public function laporan_aset_netto() {
		$titleTag = 'Laporan Aset Netto';
		$content = 'user/laporan_aset_netto';
		$listJurnal = $this->jurnal->getJurnalByYearAndMonth();
		$tahun = $this->jurnal->getJurnalByYear();
		$this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
	}

	public function laporan_aset_netto_detail() {
		$content = 'user/laporan_aset_netto_detail';

		$bulan = $this->input->post('bulan',true);
		$tahun = $this->input->post('tahun',true);

		$titleTag = 'Laporan Aset Netto |'.bulan($bulan).' Tahun '.date('Y',strtotime($tahun));

		if(empty($bulan) || empty($tahun)){
			redirect('laporan_aset_netto');
		}

		$dataAkun = $this->akun->getAkunLRByMonthYear($bulan,$tahun);
		$data = null;
		$saldo = null;
        $periode = bulan($bulan).' Tahun '.date('Y',strtotime($tahun));

        $kas = $this->jurnal->getLastMonthCash($bulan,$tahun);    //jangan dihapus "i have no fuckin idea why deleting this shit causing SQL error"

        $tanpaPembatasan =$this->jurnal->getLastNetoTanpaPembatasan($bulan,$tahun);
        $denganPembatasan =$this->jurnal->getLastNetoDenganPembatasan($bulan,$tahun);

        

        $totalKas=0;
        $totalSurplus=0;

		foreach($dataAkun as $row){
			$data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
			$saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
		}

        $jumlah = count($data);

		if($data == null || $saldo == null){
			$this->session->set_flashdata('dataNull','Laporan Aset Netto pada Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
			redirect('laporan_aset_netto');
		}

        

		

		$this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo','periode','tanpaPembatasan','denganPembatasan'));

	}


    /*
	 * Start Laporan Analisis Rasio Section
	 * */

    public function laporan_analisis_rasio() {
        $titleTag = 'Laporan Analisis Rasio';
		$content = 'user/laporan_analisis_rasio';
        $periode = date('Y', strtotime('-5 years')).' - '.date('Y', strtotime('-1 years'));
        
        
        $dataQR = null;
        $dataCash = null;
        $dataNPM = null;
        $dataROT = null;

        for($i=5; $i>=1; $i--) {
            $aktivaLancar = $this->jurnal->getSumCurrentAssets(date('Y', strtotime("-".$i." years")));
            $persediaan = $this->jurnal->getSumStock(date('Y', strtotime("-".$i." years")));
            $utangLancar = $this->jurnal->getSumCurrentDebt(date('Y', strtotime("-".$i." years")));
            $kasDanSetaraKas = $this->jurnal->getSumCashAndEquivalent(date('Y', strtotime("-".$i." years")));
            $totalAset = $this->jurnal->getSumAllAssets(date('Y', strtotime("-".$i." years")));
            $penjualan = $this->jurnal->getSumSales(date('Y', strtotime("-".$i." years")));
            $labaneto = $this->jurnal->getLabaNetto(date('Y', strtotime("-".$i." years")));
            
            // Rasio Likuiditas
            // Quick Ratio
            if ($utangLancar == 0) $dataQR[$i] = 0;
            else $dataQR[$i] = ($aktivaLancar-$persediaan)/$utangLancar;
            
            // Rasio Profitabilitas
            if ($utangLancar == 0) $dataCash[$i] = 0;
            else $dataCash[$i] = $kasDanSetaraKas/$utangLancar;

            // Profitabilitas
            // Net Profit Margin
            if ($penjualan == 0 && $labaneto == 0) $dataNPM[$i] = 0;
            else $dataNPM[$i] = $labaneto / $penjualan;

            // Return on Total Assets
            if ($totalAset == 0 && $labaneto == 0) $dataROT[$i] = 0;
            else $dataROT[$i] = $labaneto / $totalAset;
        }

		$this->load->view('template',compact('content','titleTag','periode','dataQR','dataCash', 'dataNPM', 'dataROT'));
    }

    /*
	 * End Laporan Analisis Rasio Section
	 * */

    public function logout(){
        $this->user->logout();
        redirect('');
    }
}