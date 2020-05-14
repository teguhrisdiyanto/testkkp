<div class="content-wrapper">
    <section class="content">
        <h3 class="box-title">Tambah Data Jenis Proyek</h3>

        <!-- Input addon -->

        <div class="box box-info">

            <div class="box-header with-border">
                <!-- <h3 class="box-title">Input Addon</h3> -->
            </div>

            <!-- <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success"); ?>"></div> -->

            <!-- <?php echo base_url(); ?>Jenis_Proyek/tambah -->
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


                        <!-- <div class="form-group">
                            <label for="jenis">Jenis Poyek</label>
                            <input type="text" name="jenis" class="form-control" id="jenis" placeholder="jenis" autocomplete="off">
                        </div> -->

                        <label for="jenis">Jenis Proyek</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </div>
                            <input type="text" name="jenis" id="jenis" class="form-control pull-right" autocomplete="off">
                        </div><br>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url() . 'jenis_Proyek/index'  ?>" class="btn btn-danger tombol-hapus" onclick="javascript: return confirm('Anda yakin')">Kembali</a>
                        </div>

            </form>
        </div>
</div>

</section>
</div>