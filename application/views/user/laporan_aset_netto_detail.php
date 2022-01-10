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
                                <h2 class="mb-0"><b>LAPORAN ASET NETO</b></h2>
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
                                    </th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>ASET NETO TANPA PEMBATASAN DARI PEMBERI SUMBER DAYA</b>  </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php

                            ?>                            
                            <td>Saldo Awal</td>
                            <td><?= 'Rp. '.number_format($tanpaPembatasan,0,',','.') ?></td>
                            <td></td>
                            <?php

                            $totalPendapatan=0;
							$totalBeban=0;
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,2) == "4-") {?>
                                
                                    
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalPendapatan += $hasil;

									?>


                                    
                                
                                <?php } ?>
                                <?php endfor ; $hasil = 0;?>
                                
                                <!-- END OF PENDAPATAN -->

                                <!-- BEBAN -->

                                <?php
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,2) == "5-") {?>
                               
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalBeban += $hasil;
									?>

                                <?php } ?>
                                <?php endfor ?>
                                <tr>
                                    <?php 
									$surplus = $totalPendapatan - $totalBeban;

									if($surplus > 0){ ?>
                                    <td>Surplus(Defisit)</td>

                                    <td><?= 'Rp. '.number_format(abs($surplus),0,',','.') ?></td>
                                    <?php }else{ ?>
                                    <td>Surplus(Defisit)</td>

                                    <td>(<?= 'Rp. '.number_format(abs($surplus),0,',','.') ?>)</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>

                                
                            <tr style="background-color:aquamarine;">
                                <td>Total</td>
                                <?php
                                if($surplus+$tanpaPembatasan>=0){?>
                                <td><?= 'Rp. '.number_format(abs($surplus+$tanpaPembatasan),0,',','.') ?></td>
                                <?php } else{?>
                                <td>(<?= 'Rp. '.number_format(abs($surplus+$tanpaPembatasan),0,',','.') ?>)</td>
                                
                                <?php } ?>
                                <td></td>
                            </tr>


                            <tr>
                                <td><b>ASET NETO DENGAN PEMBATASAN DARI PEMBERI SUMBER DAYA</b></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php $surplus=0; ?>
                            <tr>
                                <td>Saldo Awal</td>
                                <td><?= 'Rp. '.number_format($denganPembatasan,0,',','.') ?></td>
                                <td></td>
                            </tr>
                            
                            <?php

                            $totalPendapatan=0;
							$totalBeban=0;
                            $hasil=0;
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,3) == "6-1" ) {?>
                                
                                    
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalPendapatan += $hasil;
									?>

                                    
                                
                                <?php } ?>
                                <?php endfor ; $hasil = 0;?>
                                
                                <!-- END OF PENDAPATAN -->

                                <!-- BEBAN -->

                                <?php
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,3) == "6-2") {?>
                               
                                    <?php
										for($j=0;$j<count($data[$i]);$j++):
											$hasil += $deb[$j]->saldo;
										endfor;
										$totalBeban += $hasil;
									?>

                                <?php } ?>
                                <?php endfor ?>
                                <tr>
                                    <?php 
									$surplus = $totalPendapatan - $totalBeban;

									if($surplus > 0){ ?>
                                    <td>Surplus(Defisit)</td>

                                    <td><?= 'Rp. '.number_format(abs($surplus),0,',','.') ?></td>
                                    <?php }else{ ?>
                                    <td>Surplus(Defisit)</td>

                                    <td>(<?= 'Rp. '.number_format(abs($surplus),0,',','.') ?>)</td>
                                    <?php } ?>
                                    <td></td>
                                </tr>

                            <tr>
                            </tr>
                            <tr style="background-color:aquamarine;">
                                <td>Total</td>
                                <?php
                                if($surplus+$tanpaPembatasan>=0){?>
                                <td><?= 'Rp. '.number_format(abs($surplus+$denganPembatasan),0,',','.') ?></td>
                                <?php } else{?>
                                <td>(<?= 'Rp. '.number_format(abs($surplus+$denganPembatasan),0,',','.') ?>)</td>
                                
                                <?php } ?>
                                <td></td>
                            </tr>


                            


                            </tbody>
                        </table>
                        
					</div>
				</div>
			</div>
		</div>
