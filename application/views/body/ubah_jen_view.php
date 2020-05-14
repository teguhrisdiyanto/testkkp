<div class="content-wrapper">
    <section class="content">
        <h3 class="box-title">Ubah Data</h3>
        <!-- <?php var_dump($jenis); ?> -->
        <!-- Input addon -->
        <div class="box box-info">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">Ubah Data</h3> -->
            </div>

            <!-- <?php echo base_url(); ?>Jenis_Proyek/update -->
            <?php foreach ($jenis as $Jen) { ?>
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


                            <label for="jenis">Jenis Proyek</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <input type="hidden" name="id_jenis" class="form-control  placeholder=" Lokasi Proyek!" value="<?php echo $Jen->kd_jenis ?>" />
                                <input type="text" name="jenis_ubah" class="form-control  placeholder=" Lokasi Proyek!" value="<?php echo $this->CI->DescryptAes($Jen->nm_jenis) ?>" />
                            </div><br>


                            <!-- Lokasi Proyek
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="hidden" name="id_jenis" class="form-control <?php echo form_error('lokasiPoyek') ? 'is invalid' : '' ?>" placeholder="Lokasi Proyek!" value="<?php echo $Jen->kd_jenis ?>" />
                            <input type="text" name="jenis" class="form-control <?php echo form_error('lokasiPoyek') ? 'is invalid' : '' ?>" placeholder="Lokasi Proyek!" value="<?php echo $this->CI->DescryptAes($Jen->nm_jenis) ?>" />
                        </div>
                        <br> -->


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url() . 'jenis_Proyek/index'  ?>" class="btn btn-danger tombol-hapus" onclick="javascript: return confirm('Anda yakin')">Kembali</a>
                            </div>
                        </div>
                </form>
            <?php } ?>
    </section>
</div>

<script>
    const ubah = document.querySelector('#UBAH');
    ubah.addEventListener('click', function() {
        Swal.fire({
            title: 'Done',
            text: "<?php echo $this->session->flashdata('msg'); ?>",
            type: 'success'
        });
    });
</script>