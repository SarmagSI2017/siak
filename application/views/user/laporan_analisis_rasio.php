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
                            <h2 class="mb-0"><b>LAPORAN ANALISIS RASIO</b></h2>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col d-flex justify-content-center">
                            <!-- Ubah tglnya -->
                            <h4 class="mb-0"><b>Periode <?= $periode ?> </b></h4>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" rowspan="2">Keterangan</th>
                                    <th scope="col" class="text-center" colspan="6">Tahun</th>
                                </tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <?php 
                                            $year="";
                                            for($i=5;$i>=1;$i--):
                                                $year="-".$i." years";
                                                $year=date('Y', strtotime($year)); 
                                        ?>
                                        <th scope="col"><?php echo $year ?></th>
                                        <?php
                                            endfor;
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col">Quick Ratio</td>
                                    <td scope="col">
                                        <?php 
                                            for($i=5;$i>=1;$i--):
                                        ?>
                                        <td scope="col"><?= $dataQR[$i] ?></td>
                                        <?php
                                            endfor;
                                        ?>
                                    </td>
                                </tr>   
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col">Cash</td>
                                    <td scope="col">
                                        <?php 
                                            for($i=5;$i>=1;$i--):
                                        ?>
                                        <td scope="col"><?= $dataCash[$i] ?></td>
                                        <?php
                                            endfor;
                                        ?>
                                    </td>
                                </tr> 
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col">Net Profit Margin</td>
                                    <td scope="col">
                                        <?php 
                                            for($i=5;$i>=1;$i--):
                                        ?>
                                        <td scope="col"><?= $dataQR[$i] ?></td>
                                        <?php
                                            endfor;
                                        ?>
                                    </td>
                                </tr> 
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col">Return on Total Assets</td>
                                    <td scope="col">
                                        <?php 
                                            for($i=5;$i>=1;$i--):
                                        ?>
                                        <td scope="col"><?= $dataQR[$i] ?></td>
                                        <?php
                                            endfor;
                                        ?>
                                    </td>
                                </tr>     
                            </tbody>
                        </table>
					</div>
            </div>
        </div>
    </div>
</div>
