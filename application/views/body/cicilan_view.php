<div class="content-wrapper">
    <section class="content">
        <h3 class="box-title">Data Cicilan</h3>

        <!-- Input addon -->
        <div class="box box-info">
            <!-- <?php echo var_dump($cicilan) ?> -->

            <div class="row table table-bordered">
                <div class="col-md-7">
                    <!-- table proyek -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><u><b>Data Proyek</b></u></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th style="width: 10px">Tanggal</th>
                                <th>Nama Proyek</th>
                                <th>Nilai Kontrak</th>
                                <th>Nilai Dp</th>
                                <th>Sisa Bayar</th>
                                <th>Lokasi</th>
                                <th>Jenis Bangunan</th>

                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($proyek as $Prk) : ?>
                                <tr>
                                    <td><?php echo $this->CI->DescryptAes($Prk->tgl_proyek) ?></td>
                                    <td><?php echo $this->CI->DescryptAes($Prk->nm_proyek) ?></td>
                                    <td><?php echo "Rp." . $this->CI->DescryptAes($Prk->nilai_kontrak) ?></td>
                                    <td><?php echo "Rp." . $this->CI->DescryptAes($Prk->nilai_dp) ?></td>
                                    <td><?php echo "Rp." . $this->CI->DescryptAes($Prk->bayar) ?></td>
                                    <td><?php echo $Prk->lokasi_kd_lokasi ?></td>
                                    <td><?php echo $Prk->jenis_kd_jenis ?></td>

                                </tr>

                                <?php $i++; ?>

                            <?php endforeach; ?>


                        </table>
                    </div>
                    <!-- table proyek -->
                </div>


                <div class="col-md-5">
                    <!-- table cicilan -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><u><b>Input Cicilan</b></u></h3>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <?php foreach ($proyek as $Prk) { ?>

                                <form action="<?php echo base_url(); ?>cicilan/tambah" method="post" enctype="multipart/form-data">
                                    <div class=" box-body">



                                        <div class="box-footer">

                                            <!-- <input class="btn btn-primary" type="submit" value="Simpan" /> -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSimpan">
                                                Input Cicilan disini!
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalSimpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- form -->
                                                            <label for="datepicker">Tanggal Cicilan</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text" name="tgl_cicilan" class="form-control pull-right" id="datepicker" placeholder="tanggal" autocomplete="off" required>
                                                            </div><br>

                                                            <label for="nkontrak">Nominal Yang Akan Dibayarkan</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="">Rp. </i>
                                                                </div>
                                                                <input type="hidden" name="dari_kd_proyek" class="form-control" value="<?php echo $Prk->kd_proyek ?>" placeholder="Nama Proyek">
                                                                <input type="text" name="cicilan" class="form-control pull-right" id="cicilan" autocomplete="off" placeholder="nominal" required>
                                                            </div><br>

                                                            <!-- <div class="input-group">
                                                                <div class="form-group">
                                                                    <label for="cicilan">Nominal</label>
                                                                    <input type="hidden" name="dari_kd_proyek" class="form-control" value="<?php echo $Prk->kd_proyek ?>" placeholder="Nama Proyek">
                                                                    <input type="text" name="cicilan" class="form-control" id="cicilan" placeholder="nominal" autocomplete="off" required>
                                                                </div>
                                                            </div> -->

                                                            <label for="nkontrak">Nominal Yang Harus Dibayarkan</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="">Rp. </i>
                                                                </div>
                                                                <b><input type="text" name="bayar" class="form-control pull-right" id="bayar" autocomplete="off" value="<?php echo $this->CI->DescryptAes($Prk->bayar) ?>" readonly></b>
                                                            </div><br>

                                                            <!-- <div class="input-group">
                                                                <div class="form-group">
                                                                    <label for="bayar">Bayar</label>
                                                                    <input type="text" name="bayar" class="form-control" id="bayar" value="<?php echo $this->CI->DescryptAes($Prk->bayar) ?>" id="bayar" readonly>
                                                                </div>
                                                            </div> -->

                                                            <label for="nkontrak">Sisa Bayar</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="">Rp. </i>
                                                                </div>
                                                                <input type="text" name="total" class="form-control pull-right" id="total" autocomplete="off" readonly>
                                                            </div><br>

                                                            <!-- <div class="input-group">
                                                                <div class="form-group">
                                                                    <label for="total">Sisa Bayar</label>
                                                                    <input type="text" name="total" class="form-control" id="total" readonly>
                                                                </div>
                                                            </div> -->
                                                            <!-- form -->
                                                            <div class="modal-body">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input name="check" type="checkbox" value="1"> Pengisian Data Sudah benar?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input class="btn btn-primary" type="submit" value="Simpan" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <input href="" class="btn btn-danger" type="text" value="Batal" /> -->
                                        </div>
                                    </div>

                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- table cicilan -->
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="box-header with-border">
                        <h3 class="box-title"><u><b>Data Cicilan</b></u></h3>
                    </div>
                    <div class="col-md-10">
                        <div class="box-body">
                            <table class="table table-hover table-bordered" id="example1">

                                <!-- field -->
                                <thead>
                                    <tr>
                                        <th>No. Cicilan</th>
                                        <th>Tanggal Cicilan</th>
                                        <th>Nominal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <!-- record -->
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($cicilan as $cicil) : ?>
                                        <!-- ?php var_dump($this->CI->DescryptAes($Proyek->tgl_proyek)); ?> -->
                                        <!-- ?php var_dump($Proyek->tgl_proyek); ?> -->
                                        <tr>
                                            <td>
                                                <?php echo "Cicilan Ke-" . $i; ?>
                                            </td>
                                            <td>
                                                <?php
                                                // echo $this->CI->DescryptAes($cicil->tgl_cicilan)
                                                echo  $this->CI->DescryptAes($Prk->tgl_proyek)
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo "Rp." . $this->CI->DescryptAes($cicil->nominal) ?>
                                                <?php $qwe = $this->CI->DescryptAes($cicil->nominal); ?>
                                                <?php $asd = $cicil->no_cicilan; ?>
                                            </td>
                                            <td>
                                                <!-- <span data-toggle="modal" title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="#"><span class="glyphicon glyphicon-trash"></span></a> -->
                                                <?php if ($cicil->is_draf == 0) { ?>
                                                    <a href="javascript:void(0)" class="btn btn-warning tombol-hapus" id="cicilan2" onclick="showModalCicilan(<?php echo $qwe; ?>, <?php echo $asd; ?>)">Edit</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-info tombol-hapus" disabled>Terbayar</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-weight:bold"><span class="glyphicon glyphicon-info-sign" style="color:#FFFFFF; font-size:24px"></span>Konfirmasi </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo base_url(); ?>cicilan/edit" method="post" enctype="multipart/form-data">
                        <div class=" box-body">
                            <div class="modal-body">

                                <!-- form -->

                                <div class="input-group">



                                    <label for="nkontrak">Nominal Yang Akan Dibayarkan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="">Rp. </i>
                                        </div>
                                        <input style="display: none;" type="text" name="dari_kd_proyek_modal" class="form-control" value="<?php echo $Prk->kd_proyek ?>">
                                        <input style="display: none;" type="text" name="nocicilan_modal" id="nocicilan_modal" class="form-control" value="<?php echo $cicil->no_cicilan ?>">
                                        <input onkeyup="calculation()" name="nominal_modal" type="text" id="cicilan_id" value="<?php echo $this->CI->DescryptAes($cicil->nominal)  ?>" class="form-control" placeholder="nominal">
                                    </div><br>

                                    <!-- <div class="form-group">
                                        <label for="cicilan">nominal</label>
                                        <input style="display: none;" type="text" name="dari_kd_proyek_modal" class="form-control" value="<?php echo $Prk->kd_proyek ?>">
                                        <input style="display: none;" type="text" name="nocicilan_modal" id="nocicilan_modal" class="form-control" value="<?php echo $cicil->no_cicilan ?>">
                                        <input onkeyup="calculation()" name="nominal_modal" type="text" id="cicilan_id" value="<?php echo $this->CI->DescryptAes($cicil->nominal)  ?>" class="form-control" placeholder="nominal">
                                    </div> -->

                                    <!-- asd -->
                                    <label for="nkontrak">Nominal Yang Harus Dibayarkan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="">Rp. </i>
                                        </div>
                                        <b><input type="text" name="bayar_modal" class="form-control" id="bayar_modal" value="<?php echo $this->CI->DescryptAes($Prk->bayar); ?>" readonly></b>
                                    </div><br>

                                    <!-- <div class="input-group">
                                        <div class="form-group">
                                            <label for="bayar">Bayar</label>
                                            <input type="text" name="bayar_modal" class="form-control" id="bayar_modal" value="<?php echo $this->CI->DescryptAes($Prk->bayar); ?>" readonly>
                                        </div>
                                    </div> -->

                                    <label for="nkontrak">Sisa Bayar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="">Rp. </i>
                                        </div>
                                        <input type="text" name="total_modal" class="form-control" id="total_modal" value="<?php echo (intval($this->CI->DescryptAes($Prk->bayar)) - intval($this->CI->DescryptAes($cicil->nominal))) ?>" readonly>
                                    </div><br>

                                    <!-- <div class="input-group">
                                        <div class="form-group">
                                            <label for="total_modal">Sisa Bayar</label>
                                            <input type="text" name="total_modal" class="form-control" id="total_modal" value="<?php echo (intval($this->CI->DescryptAes($Prk->bayar)) - intval($this->CI->DescryptAes($cicil->nominal))) ?>" readonly>
                                        </div>
                                    </div> -->

                                    <div class="checkbox">
                                        <label>
                                            <input name="check_id" id="check_id" type="checkbox" value="1" onclick="isDraf()"> Pengisian Data Sudah benar?
                                        </label>
                                    </div>

                                </div>

                                <!-- <div class="input-group">
                                <div class="form-group">
                                    <label for="bayar">Bayar</label>
                                    <input type="text" name="bayar" class="form-control" id="bayar" value="<?php echo $this->CI->DescryptAes($Prk->bayar) ?>" id="bayar2" readonly>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="form-group">
                                    <label for="total">Sisa Bayar</label>
                                    <input type="text" name="total" class="form-control" id="total2" readonly>
                                </div>
                            </div> -->

                                <div class="box-footer">
                                    <input class="btn btn-primary" type="submit" value="Simpan" />
                                    <!-- <input href="" class="btn btn-danger" type="text" value="Batal" /> -->
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


</div>
<!-- /.box -->




<script>
    function showModalCicilan(nominal, no_cicilan) {

        $('#exampleModal').modal('show');

        document.getElementById('cicilan_id').value = nominal;
        document.getElementById('nocicilan_modal').value = no_cicilan;


    }


    function isDraf() {
        document.getElementById('cicilan_id').readOnly = false;
        if (document.getElementById('check_id').checked) {
            document.getElementById('cicilan_id').readOnly = true;
        }
    }

    function calculation() {
        document.getElementById('total_modal').value = document.getElementById('bayar_modal').value - document.getElementById('cicilan_id').value;
    }

    $(function() {
        var _nominal = "";
        var _no_cicilan = "";

        // data picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        $('#cicilan').change(function() {
            total_bayar();

        });

        function total_bayar() {
            var hargaobat = document.getElementById('bayar').value;
            var hargakonsul = document.getElementById('cicilan').value;

            var totalbayar = parseFloat(hargaobat) - parseFloat(hargakonsul);
            if (!isNaN(totalbayar)) {
                document.getElementById('total').value = totalbayar;
            }

        }


        $('#cicilan2').change(function() {
            hapus_totalBayar();
        });

        function hapus_totalBayar() {
            var bayar_dong = document.getElementById('bayar2').value;
            var bayar_ding = document.getElementById('cicilan2').value;

            var hasil = parseFloat(bayar_dong) + parseFloat(bayar_ding);
            if (!isNaN(hasil)) {
                document.getElementById('total2').value = hasil;
            }
        }

    });
</script>