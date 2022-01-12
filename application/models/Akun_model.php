<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model{
    // private $table = 'akun';
    private $table = 'akun_temp';
    private $tableunsur = 'unsur_laporan_keuangan';
    private $tablesubunsur = 'akun_temp';

    public function getAkun(){
        return $this->db->get($this->table)->result();
    }
    public function getUnsurAkun(){
        return $this->db->get($this->tableunsur)->result();
    }
    public function getSubUnsurAkun(){
        return $this->db->get($this->tablesubunsur)->result();
    }
    public function getAkunByUnsur($no_unsur){
        // return $this->db->where('no_unsur',$no_unsur)->get($this->tablesubunsur)->row();
        return $this->db->select('no_reff,nama_reff,saldo_normal,unsur_laporan_keuangan')
        ->where('unsur_laporan_keuangan',$no_unsur)
        ->from($this->tablesubunsur)
        ->get()
        ->result();
    }

    public function getAkunByMonthYear($bulan,$tahun){
        return $this->db->select('akun_temp.no_reff,akun_temp.nama_reff,akun_temp.keterangan,transaksi_temp.tgl_transaksi')
                        ->from($this->table)
                        ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
                        ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                        ->join('transaksi_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                        ->group_by('akun_temp.nama_reff')
                        ->order_by('akun_temp.no_reff')
                        ->get()
                        ->result();
    }

    public function countAtomicAkun() {
        return $this->db->where('akun_temp.is_atomic', '1')->get($this->table)->num_rows();
    }

    public function countAkunByNama($str){
        return $this->db->where('nama_reff',$str)->get($this->table)->num_rows();
    }

    public function countAkunByNoReff($str){
        return $this->db->where('no_reff',$str)->get($this->table)->num_rows();
    }

    public function countAkunIndukByNoReff($str){
        return $this->db->where('induk',$str)->get($this->table)->num_rows();
    }

    public function getAkunByNo($noReff){
        return $this->db->where('no_reff',$noReff)->get($this->table)->row();
    }

    public function insertAkun($data){
        if($this->input->post('is_atomic') == NULL){
            $atomic = 0;
        }else{
            $atomic = 1;
        }
        $data = array(  
                'no_reff'   => $this->input->post('unsur_laporan_keuangan').'-'.$this->input->post('no_reff'),
                'nama_reff' => $this->input->post('nama_reff'),
                'saldo_normal' => $this->input->post('saldo_normal'),
                'keterangan' => $this->input->post('keterangan'),
                'unsur_laporan_keuangan' => $this->input->post('unsur_laporan_keuangan'),
                'is_atomic' => $atomic
                );  
        //insert data into database table.  
        return $this->db->insert($this->table,$data);  
        //return $this->db->insert($this->table,$data);
    }

    public function updateAkun($noReff,$data){
        
        if($this->input->post('is_atomic') == NULL){
            $atomic = 0;
        }else{
            $atomic = 1;
        }
        $data = array(  
            'no_reff'   =>$this->input->post('no_reff'),
            'nama_reff' => $this->input->post('nama_reff'),
            'saldo_normal' => $this->input->post('saldo_normal'),
            'keterangan' => $this->input->post('keterangan'),
            'unsur_laporan_keuangan' => $this->input->post('unsur_laporan_keuangan'),
            'is_atomic' => $atomic
            ); 

        return $this->db->where('no_reff',$noReff)->update($this->table,$data);
    }

    public function deleteAkun($noReff){
        return $this->db->where('no_reff',$noReff)->delete($this->table);
    }

	/*
	 * Laporan Posisi Keuangan Section
	 * */
	/**
	 * @param $bulan
	 * @param $tahun
	 * @return mixed
	 */
	public function getAkunPKByMonthYear($bulan,$tahun){
		return $this->db->select('akun_temp.no_reff,akun_temp.nama_reff,akun_temp.keterangan,transaksi_temp.tgl_transaksi')
			->from($this->table)
			->where('month(transaksi_temp.tgl_transaksi)',$bulan)
			->where('year(transaksi_temp.tgl_transaksi)',$tahun)
			// ->where('transaksi_temp.no_reff<',400)
            ->like('transaksi_temp.no_reff','1-')
            ->or_like('transaksi_temp.no_reff','2-')
            ->or_like('transaksi_temp.no_reff','3-')
			->join('transaksi_temp','transaksi_temp.no_reff = akun_temp.no_reff')
			->group_by('akun_temp.nama_reff')
			->order_by('akun_temp.no_reff')
			->get()
			->result();
	}

    /*
	 * Laporan Posisi Keuangan Section
	 * */
	/**
	 * @param $bulan
	 * @param $tahun
	 * @return mixed
	 */
	public function getAkunLRByMonthYear($bulan,$tahun){
        $query= "SELECT `akun_temp`.`no_reff`, `akun_temp`.`nama_reff`, `akun_temp`.`keterangan`, `transaksi_temp`.`tgl_transaksi` FROM `akun_temp` JOIN `transaksi_temp` ON `transaksi_temp`.`no_reff` = `akun_temp`.`no_reff` 
        WHERE month(transaksi_temp.tgl_transaksi) = ".$bulan." AND year(transaksi_temp.tgl_transaksi) = ".$tahun." AND (akun_temp.no_reff LIKE '4-%' OR akun_temp.no_reff LIKE '5-%' OR akun_temp.no_reff LIKE '6-%')  
        GROUP BY `akun_temp`.`nama_reff` ORDER BY `akun_temp`.`no_reff`";
		return $this->db
            // ->select('akun_temp.no_reff,akun_temp.nama_reff,akun_temp.keterangan,transaksi_temp.tgl_transaksi')
			->from($this->table)
			->query($query)
			// ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
			// ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
			// ->like('transaksi_temp.no_reff','4-')
            // ->or_like('transaksi_temp.no_reff','5-')
            // ->or_like('transaksi_temp.no_reff','6-')
			// ->join('transaksi_temp','transaksi_temp .no_reff = akun_temp.no_reff')
			// ->group_by('akun_temp.nama_reff')
			// ->order_by('akun_temp.no_reff')
			// ->get()
			->result();
	}

    public function getDefaultValues(){
        return [
            'no_reff'=>'',
            'nama_reff'=>'',
            'keterangan'=>''
        ];
    }

    public function getValidationRules($type){
        if($type == 'Edit')
        {
            return [
                [
                    'field'=>'nama_reff',
                    'label'=>'Nama Reff',
                    'rules'=>'trim|required|callback_isNamaAkunThere'
                ],
                [
                    'field'=>'keterangan',
                    'label'=>'Keterangan',
                    'rules'=>'trim|required'
                ],
            ];
        }
        else
        {
            return [
                [
                    'field'=>'no_reff',
                    'label'=>'No.Reff',
                    'rules'=>'trim|required|numeric|callback_isNoAkunThere'
                ],
                [
                    'field'=>'nama_reff',
                    'label'=>'Nama Reff',
                    'rules'=>'trim|required|callback_isNamaAkunThere'
                ],
                [
                    'field'=>'keterangan',
                    'label'=>'Keterangan',
                    'rules'=>'trim|required'
                ],
            ];
        }
    }

    

    public function validate($type){
        $rules = $this->getValidationRules($type);
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:14px">','</span>');
        return $this->form_validation->run();
    }
}
