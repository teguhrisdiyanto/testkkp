<div class="content-wrapper">
    <section class="content">
        <h3 class="box-title">Ubah Data</h3>
        <!-- <?php var_dump($lokasi); ?> -->
        <!-- Input addon -->
        <div class="box box-info">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">Ubah Data</h3> -->
            </div>

            <!-- <?php echo base_url(); ?>Lokasi/update -->
            <?php foreach ($lokasi as $Lok) { ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class=" box-body">

                        <!-- validasi -->
                        <div class="form-group">
                            <!-- validasi akan muncul ketika data tidak di isi -->
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-warning" id="" role="alert">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <label for="lokasi">Lokasi Proyek</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map"></i>
                                </div>
                                <input type="hidden" name="id_lokasi" class="form-control" placeholder="Lokasi Proyek!" value="<?php echo $Lok->kd_lokasi ?>" />
                                <input type="text" name="lokasi_ubah" id="lokasi" class="form-control pull-right" placeholder="Lokasi Proyek!" autocomplete="off" value="<?php echo $this->CI->DescryptAes($Lok->nm_lokasi) ?>">
                            </div><br>

                            <!-- <label for="lokasi">Lokasi Proyek</label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="hidden" name="id_lokasi" class="form-control <?php echo form_error('lokasiPoyek') ? 'is invalid' : '' ?>" placeholder="Lokasi Proyek!" value="<?php echo $Lok->kd_lokasi ?>" />
                                <input type="text" name="lokasi" id="lokasi" class="form-control <?php echo form_error('lokasiPoyek') ? 'is invalid' : '' ?>" placeholder="Lokasi Proyek!" autocomplete="off" value="<?php echo $this->CI->DescryptAes($Lok->nm_lokasi) ?>" />
                            </div>
                            <br> -->


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url() . 'Lokasi/index'  ?>" class="btn btn-danger tombol-hapus" onclick="javascript: return confirm('Anda yakin')">Kembali</a>
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