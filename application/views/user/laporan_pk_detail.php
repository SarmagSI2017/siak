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
                                <h2 class="mb-0"><b>LAPORAN POSISI KEUANGAN</b></h2>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col d-flex justify-content-center">
                                <!-- Ubah tglnya -->
                                <h4 class="mb-0"><b>Per-<?= $periode ?> </b></h4>
                            </div>
                        </div>
                    </div>
					<div class="table-responsive">
						<?php
						$a=0;
						$debit=0;
						$kredit=0;
						$hasil=0;
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
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ASET -->
                                <tr>
                                    <td>Aset</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
							$totalAset=0;
							$totalLiabilitas=0;
							$totalAsetNeto=0;
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,1) == "1") {?>
                                <tr>
                                    <td>
                                        <!-- <?= $data[$i][$s]->no_reff ?> -->
                                    </td>
                                    <td>
                                        <?= $data[$i][$s]->nama_reff ?>
                                    </td>
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalAset += $hasil;
									?>

                                    <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                    <td><?= $data[$i][$s]->keterangan ?></td>
                                </tr>
                                <?php } ?>
                                <?php endfor ; $hasil = 0;?>
                                <tr style="background-color:aquamarine;">
                                    <td>Total Aset</td>
                                    <td></td>
                                    <td><?= 'Rp. '.number_format($totalAset,0,',','.') ?></td>
                                    <td></td>
                                </tr>
                                <!-- END OF ASET -->

                                <!-- LIABILITAS -->
                                <tr>
                                    <td>Liabilitas</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,1) == "2") {?>
                                <tr>
                                    <td>
                                        <!-- <?= $data[$i][$s]->no_reff ?> -->
                                    </td>
                                    <td>
                                        <?= $data[$i][$s]->nama_reff ?>
                                    </td>
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalLiabilitas += $hasil;
									?>

                                    <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <?php endfor ?>
                                <tr style="background-color:aquamarine;">
                                    <td>Total Liabilitas</td>
                                    <td></td>
                                    <td><?= 'Rp. '.number_format($totalLiabilitas,0,',','.') ?></td>
                                    <td></td>
                                </tr>
                                <!-- END OF LIABILITAS -->

								<!-- ASET NETO -->
                                <tr>
                                    <td>Aset Neto</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,1) == "3") {?>
                                <tr>
                                    <td>
                                        <!-- <?= $data[$i][$s]->no_reff ?> -->
                                    </td>
                                    <td>
                                        <?= $data[$i][$s]->nama_reff ?>
                                    </td>
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalAsetNeto += $hasil;
									?>

                                    <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                <?php endfor ?>
                                <tr style="background-color:aquamarine;">
                                    <td>Total Aset Neto</td>
                                    <td></td>
                                    <td><?= 'Rp. '.number_format($totalAsetNeto,0,',','.') ?></td>
                                    <td></td>
                                </tr>
                                <!-- END OF ASET NETO -->
                                <?php $surplus = $totalAsetNeto + $totalLiabilitas ?>
                                <?php if($surplus == $totalAset){ ?>
                                <tr  class="text-center bg-danger ">
                                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
                                </tr>
                                <?php }else{  ?>
                                <tr class="text-center bg-success">
                                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
