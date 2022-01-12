<!-- 
	TODO : 
	- Cek perhitungannya sudah bener apa belum
	- Tombol untuk print ke PDF
-->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4 text-primary">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                          <li class="breadcrumb-item text-black"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home text-black"></i></a></li>
                          <li class="breadcrumb-item active text-black" aria-current="page">Detail Laporan Komprehensif</li>
                        </ol>
                      </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">
                                <h2 class="mb-0"><b>LAPORAN KOMPREHENSIF</b></h2>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">
                                <h4 class="mb-0"><b>Per-<?= $periode ?> </b></h4>
                            </div>
                        </div>
                    </div>

                <!-- -->
                <div class="table-responsive">
                    <?php
                    $a = 0;
                    $debit = 0;
                    $kredit = 0;
                    $hasil = 0;
                    $totalKompre =0;
                    ?>
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    <!-- No. Akun -->
                                </th>
                                <th></th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Keterangan</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <td><b>TANPA PEMBATASAN DARI PEMBERI SUMBER DAYA</b></td>
                            <td></td>
                            <td></td>
                            
                            <!-- PENDAPATAN -->
                            <tr>
                                <td>Pendapatan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            $totalPendapatan = 0;
                            $totalBeban = 0;
                            for ($i = 0; $i < $jumlah; $i++) :
                                $a++;
                                $s = 0;
                                $deb = $saldo[$i];
                            ?>
                                <?php if (substr($data[$i][$s]->no_reff, 0, 2) == "4-") { ?>
                                    <tr>
                                        <td>
                                            <!-- <?= $header[$i][$s] ?> -->
                                            &emsp;<?= $data[$i][$s]->nama_reff ?>
                                        </td>
                                        <td></td>
                                        
                                        <?php
                                        for ($j = 0; $j < count($data[$i]); $j++) :
                                            $hasil += $deb[$j]->saldo;
                                        endfor;
                                        $totalPendapatan += $hasil;
                                        ?>
                                        

                                        <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            <?php $hasil = 0; endfor; ?>
                            <tr style="background-color:aquamarine;">
                                <td>Total Pendapatan</td>
                                <td></td>
                                
                                <td><?= 'Rp. ' . number_format($totalPendapatan, 0, ',', '.') ?></td>
                                <td></td>
                            </tr>
                            <!-- END OF PENDAPATAN -->

                            <!-- BEBAN -->
                            <tr>
                                <td>Beban</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            for ($i = 0; $i < $jumlah; $i++) :
                                $a++;
                                $s = 0;
                                $deb = $saldo[$i];
                            ?>
                                <?php if (substr($data[$i][$s]->no_reff, 0, 2) == "5-") { ?>
                                    <tr>
                                        <td>
                                            <!-- <?= $data[$i][$s]->no_reff ?> -->
                                            &emsp;<?= $data[$i][$s]->nama_reff ?>
                                            
                                        </td>
                                        <td></td>
                                        
                                        <?php
                                        for ($j = 0; $j < count($data[$i]); $j++) :
                                            $hasil += $deb[$j]->saldo;
                                        endfor;
                                        $totalBeban += $hasil;
                                        ?>

                                        <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            <?php $hasil = 0; endfor; ?>
                            <tr style="background-color:aquamarine;">
                                <td>Total Beban</td>
                                <td></td>
                                
                                <td><?= 'Rp. ' . number_format($totalBeban, 0, ',', '.') ?></td>
                                <td></td>
                            </tr>
                            <!-- END OF BEBAN -->

                            <tr style="background-color:bisque;">
                                <?php
                                $surplus = $totalPendapatan - $totalBeban;
                                $totalKompre += $surplus;

                                if ($surplus > 0) { ?>
                                    <td>Surplus(Defisit)</td>
                                    <td></td>
                                    
                                    <td><?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?></td>
                                    <td></td>
                                <?php } else { ?>
                                    <td>Surplus(Defisit)</td>
                                    <td></td>
                                    
                                    <td>(<?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?>)</td>
                                    <td></td>
                                <?php } ?>
                            </tr>


                            <!-- END TANPA PEMBATASAN -->

                            <td><b>DENGAN PEMBATASAN DARI PEMBERI SUMBER DAYA</b></td>
                            <td></td>
                            <td></td>
                            
                            <!-- PENDAPATAN -->
                            <tr>
                                <td>Pendapatan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            $totalPendapatan = 0;
                            $totalBeban = 0;
                            $hasil = 0;
                            for ($i = 0; $i < $jumlah; $i++) :
                                $a++;
                                $s = 0;
                                $deb = $saldo[$i];
                            ?>
                                <?php if (substr($data[$i][$s]->no_reff, 0, 3) == "6-1") { ?>
                                    <tr>
                                        <td>
                                            <!-- <?= $header[$i][$s] ?> -->
                                            &emsp;<?= $data[$i][$s]->nama_reff ?>
                                        </td>
                                        <td></td>
                                        
                                        <?php
                                        for ($j = 0; $j < count($data[$i]); $j++) :
                                            $hasil += $deb[$j]->saldo;
                                        endfor;
                                        $totalPendapatan += $hasil;
                                        ?>
                                        

                                        <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            <?php $hasil = 0; endfor; ?>
                            <tr style="background-color:aquamarine;">
                                <td>Total Pendapatan</td>
                                <td></td>
                                
                                <td><?= 'Rp. ' . number_format($totalPendapatan, 0, ',', '.') ?></td>
                                <td></td>
                            </tr>
                            <!-- END OF PENDAPATAN -->

                            <!-- BEBAN -->
                            <tr>
                                <td>Beban</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            for ($i = 0; $i < $jumlah; $i++) :
                                $a++;
                                $s = 0;
                                $deb = $saldo[$i];
                            ?>
                                <?php if (substr($data[$i][$s]->no_reff, 0, 3) == "6-2") { ?>
                                    <tr>
                                        <td>
                                            <!-- <?= $data[$i][$s]->no_reff ?> -->
                                            &emsp;<?= $data[$i][$s]->nama_reff ?>
                                            
                                        </td>
                                        <td></td>
                                        
                                        <?php
                                        for ($j = 0; $j < count($data[$i]); $j++) :
                                            $hasil += $deb[$j]->saldo;
                                        endfor;
                                        $totalBeban += $hasil;
                                        ?>

                                        <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            <?php $hasil = 0; endfor ?>
                            <tr style="background-color:aquamarine;">
                                <td>Total Beban</td>
                                <td></td>
                                
                                <td><?= 'Rp. ' . number_format($totalBeban, 0, ',', '.') ?></td>
                                <td></td>
                            </tr>
                            <!-- END OF BEBAN -->

                            <tr style="background-color:bisque;">
                                <?php
                                $surplus = $totalPendapatan - $totalBeban;
                                $totalKompre += $surplus;

                                if ($surplus > 0) { ?>
                                    <td>Surplus(Defisit)</td>
                                    <td></td>
                                    
                                    <td><?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?></td>
                                    <td></td>
                                <?php } else { ?>
                                    <td>Surplus(Defisit)</td>
                                    <td></td>
                                    
                                    <td>(<?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?>)</td>
                                    <td></td>
                                <?php } ?>
                            </tr>

                            <tr style="background-color:#A0E7E5;">
                                <?php

                                if ($totalKompre > 0) { ?>
                                    <td><b>TOTAL PENGHASILAN KOMPREHENSIF</b></td>
                                    <td></td>
                                    
                                    <td><?= 'Rp. ' . number_format(abs($totalKompre), 0, ',', '.') ?></td>
                                    <td></td>
                                <?php } else { ?>
                                    <td><b>TOTAL PENGHASILAN KOMPREHENSIF</td>
                                    <td></td>
                                    
                                    <td>(<?= 'Rp. ' . number_format(abs($totalKompre), 0, ',', '.') ?>)</td>
                                    <td></td>
                                <?php } ?>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>