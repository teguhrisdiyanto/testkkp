<div class="content-wrapper">
    <section class="content">
        <h3 class="box-title">Tambah Data Lokasi</h3>

        <!-- Input addon -->

        <div class="box box-info">

            <div class="box-header with-border">
                <!-- <h3 class="box-title">Input Addon</h3> -->
            </div>

            <!-- <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success"); ?>"></div> -->

            <!-- <?php echo base_url(); ?>Lokasi/tambah -->
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

                        <label for="lokasi">Lokasi Proyek</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <input type="text" name="lokasi" id="lokasi" class="form-control pull-right" autocomplete="off">
                        </div><br>


                        <!-- <label for="lokasi">Nama Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi" autocomplete="off" placeholder="lokasi">
                    </div> -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url() . 'Lokasi/index'  ?>" class="btn btn-danger tombol-hapus" onclick="javascript: return confirm('Anda yakin')">Kembali</a>
                        </div>

            </form>
        </div>
</div>

</section>
</div>