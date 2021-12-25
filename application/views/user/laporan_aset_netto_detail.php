<!-- Main content -->
<div class="main-content">
	<!-- Top navbar -->
	<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
		<div class="container-fluid">
			<!-- Brand -->
			<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Aset Netto</a>
			<!-- Form -->
			<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
				<div class="form-group mb-0">

				</div>
			</form>
			<!-- User -->
			<ul class="navbar-nav align-items-center d-none d-md-flex">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?= base_url('assets/img/theme/team-4-800x800.jpg') ?>">
                </span>
							<div class="media-body ml-2 d-none d-lg-block">
								<span class="mb-0 text-sm  font-weight-bold"><?= ucwords($this->session->userdata('username')) ?></span>
							</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
						<a href="<?= base_url('logout') ?>" class="dropdown-item">
							<i class="ni ni-user-run"></i>
							<span>Logout</span>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Header -->
	<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
		<div class="container-fluid">
			<div class="header-body">
			</div>
		</div>
	</div>
	<!-- Page content -->
	<div class="container-fluid mt--7">
		<div class="row">
			<div class="col-xl-8 mb-5 mb-xl-0">

			</div>
		</div>
		<div class="row mt-5">
			<div class="col mb-5 mb-xl-0">
				<div class="card shadow">
					<div class="card-header border-0">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="mb-0">Laporan Aset Netto</h3>
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
                            <td><?= 'Rp. '.number_format(abs($totalKas),0,',','.') ?></td>
                            <td></td>
                            <?php

                            $totalPendapatan=0;
							$totalBeban=0;
							for($i=0;$i<$jumlah;$i++) :
								$a++;
								$s=0;
								$deb = $saldo[$i];
								?>
                                <?php if( substr($data[$i][$s]->no_reff,0,1) == "4") {?>
                                
                                    
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
                                <?php if( substr($data[$i][$s]->no_reff,0,1) == "5") {?>
                               
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
                                if($surplus+$totalKas>=0){?>
                                <td><?= 'Rp. '.number_format(abs($surplus+$totalKas),0,',','.') ?></td>
                                <?php } else{?>
                                <td>(<?= 'Rp. '.number_format(abs($surplus+$totalKas),0,',','.') ?>)</td>
                                <?php } ?>
                                <td></td>
                            </tr>


                            <tr>
                                <td><b>ASET NETO DENGAN PEMBATASAN DARI PEMBERI SUMBER DAYA</b></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>Saldo Awal</td>
                                <td><?= 'Rp. '.number_format(0,0,',','.') ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Surplus(Defisit)</td>
                                <td><?= 'Rp. '.number_format(0,0,',','.') ?></td>
                                <td></td>
                            </tr>
                            <tr style="background-color:aquamarine;">
                                <td>Total</td>
                                <td><?= 'Rp. '.number_format(0,0,',','.') ?></td>
                                <td></td>
                            </tr>


                            


                            </tbody>
                        </table>
                        
					</div>
				</div>
			</div>
		</div>
