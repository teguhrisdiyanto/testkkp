<div class="content-wrapper">
    <section class="content">
        <h3 class="box-title">Tambah Data Proyek</h3>

        <!-- Input addon -->

        <div class="box box-info">

            <div class="box-header with-border">
                <!-- <h3 class="box-title">Input Addon</h3> -->
            </div>

            <!-- <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success"); ?>"></div> -->

            <!-- <?php echo base_url(); ?>Proyek/tambah -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class=" box-body">

                    <!-- validasi -->
                    <div class="form-group">
                        <!-- validasi akan muncul ketika data tidak di isi -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif; ?>


                        <label for="datepicker">Tanggal Proyek</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tglProyek" class="form-control pull-right" id="datepicker" autocomplete="off">
                        </div><br>

                        <label for="nproyek">Nama Proyek</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bookmark"></i>
                            </div>
                            <input type="text" name="nmproyek" id="nproyek" class="form-control pull-right" autocomplete="off">
                        </div><br>

                        <label for="nkontrak">Nilai Kontak</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="">Rp. </i>
                            </div>
                            <input type="text" name="nkontrak" id="nkontrak" class="form-control pull-right" autocomplete="off">
                        </div><br>

                        <label for="nDP">Nilai Dp</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="">Rp. </i>
                            </div>
                            <input type="text" name="nDP" id="DP" class="form-control pull-right" autocomplete="off">
                        </div><br>

                        <label for="bayar">Sisa Bayar</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="">Rp. </i>
                            </div>
                            <input type="text" name="bayar" id="Bayar" class="form-control pull-right" autocomplete="off" readonly>
                        </div><br>

                        <!-- <div class="form-group">
                            <label for="nproyek">Nama Proyek</label>
                            <input type="text" name="nmproyek" class="form-control" id="nproyek" placeholder="Nama Proyek" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="nkontrak">Nilai Kontrak</label>
                            <input type="text" name="nkontrak" class="form-control" id="nkontrak" placeholder="Rp." autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="nDP">Nilai DP</label>
                            <input type="text" name="nDP" class="form-control" id="DP" placeholder="Rp." autocomplete="off">
                        </div>


                        <div class="form-group">
                            <label for="bayar">Sisa Bayar</label>
                            <input type="text" name="bayar" class="form-control" id="Bayar" placeholder="Rp." readonly>
                        </div> -->


                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" id="lokasi" name="lokasiProyek">
                                <option value="">pilih Lokasi</option>
                                <?php foreach ($lokasi as $lokasi1) : ?>
                                    <option value="<?php echo $lokasi1->kd_lokasi ?>"><?php echo $this->CI->DescryptAes($lokasi1->nm_lokasi) ?></option>


                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="jbangunan">Jenis Bangunan</label>
                            <select class="form-control" id="jbangunan" name="jenisProyek">
                                <option value="">pilih Jenis</option>
                                <?php foreach ($jenis as $jenis1) : ?>
                                    <option value="<?php echo $jenis1->kd_jenis ?>"><?php echo $this->CI->DescryptAes($jenis1->nm_jenis) ?></option>


                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url() . 'Proyek/index'  ?>" class="btn btn-danger tombol-hapus" onclick="javascript: return confirm('Anda yakin')">Kembali</a>
            </form>
        </div>
</div>

</section>
</div>

<script>
    $(function() {

        // data picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        $('#DP').change(function() {
            total_bayar();

        });

        function total_bayar() {
            var hargaobat = document.getElementById('nkontrak').value;
            var hargakonsul = document.getElementById('DP').value;

            var totalbayar = parseFloat(hargaobat) - parseFloat(hargakonsul);
            if (!isNaN(totalbayar)) {
                document.getElementById('Bayar').value = totalbayar;
            }

        }

    });
</script>