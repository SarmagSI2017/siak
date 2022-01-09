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
                    ?>
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    <!-- No. Akun -->
                                </th>
                                <th scope="col">Nama Akun</th>
                                <th scope="col">Nilai</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <!-- PENDAPATAN -->
                            <tr>
                                <td>Pendapatan</td>
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
                                        </td>
                                        <td>
                                            <?= $data[$i][$s]->nama_reff ?>
                                        </td>
                                        <?php
                                        for ($j = 0; $j < count($data[$i]); $j++) :
                                            $hasil += $deb[$j]->saldo;
                                        endfor;
                                        $totalPendapatan += $hasil;
                                        ?>

                                        <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                                    </tr>
                                <?php } ?>
                            <?php endfor;
                            $hasil = 0; ?>
                            <tr style="background-color:aquamarine;">
                                <td>Total Pendapatan</td>
                                <td></td>
                                <td><?= 'Rp. ' . number_format($totalPendapatan, 0, ',', '.') ?></td>
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
                                            
                                        </td>
                                        <td>
                                            <?= $data[$i][$s]->nama_reff ?>
                                        </td>
                                        <?php
                                        for ($j = 0; $j < count($data[$i]); $j++) :
                                            $hasil += $deb[$j]->saldo;
                                        endfor;
                                        $totalBeban += $hasil;
                                        ?>

                                        <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                                    </tr>
                                <?php } ?>
                            <?php endfor ?>
                            <tr style="background-color:aquamarine;">
                                <td>Total Beban</td>
                                <td></td>
                                <td><?= 'Rp. ' . number_format($totalBeban, 0, ',', '.') ?></td>
                            </tr>
                            <!-- END OF BEBAN -->

                            <tr style="background-color:bisque;">
                                <?php
                                $surplus = $totalPendapatan - $totalBeban;

                                if ($surplus > 0) { ?>
                                    <td>Surplus(Defisit)</td>
                                    <td></td>
                                    <td><?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?></td>
                                <?php } else { ?>
                                    <td>Surplus(Defisit)</td>
                                    <td></td>
                                    <td>(<?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?>)</td>
                                <?php } ?>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>