<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends CI_Model{
    private $table = 'transaksi_temp';
    

    public function getJurnal(){
        return $this->db->get($this->table)->result();
    }

    public function getJurnalById($id){
        return $this->db->where('id_transaksi',$id)->get($this->table)->row();
    }

    public function countJurnalNoReff($noReff){
        return $this->db->where('no_reff',$noReff)->get($this->table)->num_rows();
    }

    public function getJurnalByYear(){
        return $this->db->select('tgl_transaksi')
                        ->from($this->table)
                        ->group_by('year(tgl_transaksi)')
                        ->get()
                        ->result();
    }

    public function getJurnalByYearAndMonth(){
        return $this->db->select('tgl_transaksi')
                        ->from($this->table)
                        ->group_by('month(tgl_transaksi)')
                        ->group_by('year(tgl_transaksi)')
                        ->get()
                        ->result();
    }

    public function getAkunInJurnal(){
        return $this->db->select('transaksi_temp.no_reff,akun_temp.no_reff,akun_temp.nama_reff')
                    ->from($this->table)            
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff','ASC')
                    ->group_by('akun_temp.nama_reff')
                    ->get()
                    ->result();
    }

    public function countAkunInJurnal(){
        return $this->db->select('transaksi_temp.no_reff,akun_temp.no_reff,akun_temp.nama_reff')
                    ->from($this->table)            
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff','ASC')
                    ->group_by('akun_temp.nama_reff')
                    ->get()
                    ->num_rows();
    }

    public function getJurnalByNoReff($noReff){
        return $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.tgl_transaksi,akun_temp.nama_reff,transaksi_temp.no_reff,transaksi_temp.jenis_saldo,transaksi_temp.saldo,transaksi_temp.tgl_input')
                    ->from($this->table)            
                    ->where('transaksi_temp.no_reff',$noReff)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('tgl_transaksi','ASC')
                    ->get()
                    ->result();
    }

    public function getJurnalByNoReffMonthYear($noReff,$bulan,$tahun){
        return $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.tgl_transaksi,akun_temp.nama_reff,transaksi_temp.no_reff,transaksi_temp.jenis_saldo,transaksi_temp.saldo,transaksi_temp.tgl_input,akun_temp.keterangan,akun_temp.induk')
                    ->from($this->table)            
                    ->where('transaksi_temp.no_reff',$noReff)
                    ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('tgl_transaksi','ASC')
                    ->get()
                    ->result();
    }

    public function getLastMonthCash($bulan,$tahun){
        $where=$tahun.'-'.$bulan.'-01';
        return $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.tgl_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo')
                    ->from($this->table)            
                    ->where('transaksi_temp.no_reff','111')
                    ->where('transaksi_temp.tgl_transaksi <=',$where)
                    ->get()
                    ->result();
    }

    public function getLastMonthSmallCash($bulan,$tahun) {
        $date=$tahun.'-'.$bulan.'-01';
        return $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.tgl_transaksi,transaksi_temp.no_reff,transaksi_temp.jenis_saldo,transaksi_temp.saldo,transaksi_temp.tgl_input,akun_temp.nama_reff,akun_temp.keterangan,akun_temp.induk')
                    ->from($this->table)
                    ->like('transaksi_temp.no_reff','1-11')
                    ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff=akun_temp.no_reff')
                    ->order_by('tgl_transaksi','ASC')
                    ->get()
                    ->result();
    }
    

    public function getJurnalByNoReffSaldo($noReff){
        return $this->db->select('transaksi_temp.jenis_saldo,transaksi_temp.saldo')
                    ->from($this->table)            
                    ->where('transaksi_temp.no_reff',$noReff)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('tgl_transaksi','ASC')
                    ->get()
                    ->result();
    }

    public function getJurnalByNoReffSaldoMonthYear($noReff,$bulan,$tahun){
        return $this->db->select('transaksi_temp.jenis_saldo,transaksi_temp.saldo')
                    ->from($this->table)            
                    ->where('transaksi_temp.no_reff',$noReff)
                    ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('tgl_transaksi','ASC')
                    ->get()
                    ->result();
                    
                    
        // return $this->db->query($query)
        //             ->result();
    }

    public function getJurnalJoinAkun(){
        return $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.tgl_transaksi,akun_temp.nama_reff,transaksi_temp.no_reff,transaksi_temp.jenis_saldo,transaksi_temp.saldo,transaksi_temp.tgl_input')
                        ->from($this->table)
                        ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                        ->order_by('tgl_transaksi','ASC')
                        ->order_by('tgl_input','ASC')
                        ->order_by('jenis_saldo','ASC')
                        ->get()
                        ->result();
    }

    public function getJurnalJoinAkunDetail($bulan,$tahun){
        return $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.tgl_transaksi,akun_temp.nama_reff,transaksi_temp.no_reff,transaksi_temp.jenis_saldo,transaksi_temp.saldo,transaksi_temp.tgl_input')
                        ->from($this->table)
                        ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
                        ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                        ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                        ->order_by('tgl_transaksi','ASC')
                        ->order_by('tgl_input','ASC')
                        ->order_by('jenis_saldo','ASC')
                        ->get()
                        ->result();
    }

    public function getTotalSaldoDetail($jenis_saldo,$bulan,$tahun){
        return $this->db->select_sum('saldo')
                        ->from($this->table)
                        ->where('month(transaksi_temp.tgl_transaksi)',$bulan)
                        ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                        ->where('jenis_saldo',$jenis_saldo)
                        ->get()
                        ->row();
    }

    public function getTotalSaldo($jenis_saldo){
        return $this->db->select_sum('saldo')
                        ->from($this->table)
                        ->where('jenis_saldo',$jenis_saldo)
                        ->get()
                        ->row();
    }

    public function getLastNetoTanpaPembatasan($bulan,$tahun){
        $where=$tahun.'-'.$bulan.'-01';
        $total=0;
        $pendapatan = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','4-')
                    ->where('transaksi_temp.tgl_transaksi <',$where)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->group_by('akun_temp.nama_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();
        $beban = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','5-')
                    ->where('transaksi_temp.tgl_transaksi <',$where)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->group_by('akun_temp.nama_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();
        
        foreach($pendapatan as $temp)
            {
                if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
                else $total-=$temp->saldo;
            }
        foreach($beban as $temp)
            {
                if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total-=$temp->saldo;
                else $total+=$temp->saldo;
            }
        return $total;
    }

    public function getLastNetoDenganPembatasan($bulan,$tahun){
        $where=$tahun.'-'.$bulan.'-01';
        $total=0;
        $pendapatan = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','6-1')
                    ->where('transaksi_temp.tgl_transaksi <',$where)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->group_by('akun_temp.nama_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();
        $beban = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','6-2')
                    ->where('transaksi_temp.tgl_transaksi <',$where)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->group_by('akun_temp.nama_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();
        
        foreach($pendapatan as $temp)
            {
                if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
                else $total-=$temp->saldo;
            }
        foreach($beban as $temp)
            {
                if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total-=$temp->saldo;
                else $total+=$temp->saldo;
            }
        return $total;
    }

    public function getSumCurrentAssets($tahun) {
        $total = 0;
        $currAssets = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','1-')
                    ->not_like('transaksi_temp.no_reff','1-2000')
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();

        foreach($currAssets as $temp)
        {
            if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
            else $total-=$temp->saldo;
        }

        return $total;
    }

    public function getSumStock($tahun) {
        $total = 0;
        $stock = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->where('transaksi_temp.no_reff','1-2000')
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();

        foreach($stock as $temp)
        {
            if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
            else $total-=$temp->saldo;
        }

        return $total;
    }

    public function getSumCurrentDebt($tahun) {
        $total = 0;
        $currDebt = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','2-1')
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();

        foreach($currDebt as $temp)
        {
            if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
            else $total-=$temp->saldo;
        }

        return $total;
    }

    public function getSumCashAndEquivalent($tahun) {
        $total = 0;
        $cash = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','1-1')
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();

        foreach($cash as $temp)
        {
            if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
            else $total-=$temp->saldo;
        }

        return $total;
    }

    public function getSumAllAssets($tahun) {
        $total = 0;
        $assets = $this->db->select('transaksi_temp.id_transaksi,transaksi_temp.jenis_saldo,transaksi_temp.saldo,akun_temp.saldo_normal')
                    ->from($this->table)            
                    ->like('transaksi_temp.no_reff','1-')
                    ->where('year(transaksi_temp.tgl_transaksi)',$tahun)
                    ->join('akun_temp','transaksi_temp.no_reff = akun_temp.no_reff')
                    ->order_by('akun_temp.no_reff')
                    ->get()
                    ->result();

        foreach($assets as $temp)
        {
            if(strtolower($temp->jenis_saldo)==strtolower($temp->saldo_normal)) $total+=$temp->saldo;
            else $total-=$temp->saldo;
        }

        return $total;
    }

    public function insertJurnal($data){
        return $this->db->insert($this->table,$data);
    }

    public function updateJurnal($id,$data){
        return $this->db->where('id_transaksi',$id)->update($this->table,$data);
    }

    public function deleteJurnal($id){
        return $this->db->where('id_transaksi',$id)->delete($this->table);
    }

    public function getDefaultValues(){
        return [
            'tgl_transaksi'=>date('Y-m-d'),
            'no_reff'=>'',
            'jenis_saldo'=>'',
            'saldo'=>'',
        ];
    }

    public function getValidationRules(){
        return [
            [
                'field'=>'tgl_transaksi',
                'label'=>'Tanggal Transaksi',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'no_reff',
                'label'=>'Nama Akun',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'jenis_saldo',
                'label'=>'Jenis Saldo',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'saldo',
                'label'=>'Saldo',
                'rules'=>'trim|required|numeric'
            ],
        ];
    }

    public function getJurnalValidationRules(){
        return [
            [
                'field'=>'tgl_transaksi',
                'label'=>'Tanggal Transaksi',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'no_reff[]',
                'label'=>'Nama Akun',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'jenis_saldo[]',
                'label'=>'Jenis Saldo',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'saldo[]',
                'label'=>'Saldo',
                'rules'=>'trim|required|numeric'
            ],
        ];
    }

    public function validate(){
        $rules = $this->getValidationRules();
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:14px">','</span>');
        return $this->form_validation->run();
    }

    public function validateJurnalCreation(){
        $rules = $this->getJurnalValidationRules();
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:14px">','</span>');
        return $this->form_validation->run();
    }
}