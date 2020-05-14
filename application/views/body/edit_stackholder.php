<div class="content-wrapper">
    <section class="content">


        <!-- Input addon -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Input Addon</h3>
            </div>

            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success"); ?>"></div>







            <form action="<?php echo base_url(); ?>Input_stackholder/input_stackholder_save" method="post" ">
                <div class=" box-body">
                <label for="name">Pekerjaan Proyek</label>

                <div class="input-group">

                    <span class="input-group-addon">@</span>
                    <input type="text" name="pekerjaanProyek" class="form-control <?php echo form_error('pekerjaanProyek') ? 'is invalid' : '' ?>" placeholder="Proyek anda!" />
                </div>
                <div class="">
                    <?php echo form_error('pekerjaanProyek') ?>
                </div>
                <br>


                Lokasi Proyek
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" name="lokasiPoyek" class="form-control <?php echo form_error('lokasiPoyek') ? 'is invalid' : '' ?>" placeholder="Lokasi Proyek!" />
                </div>
                <div class="invalid-feedback">
                    <?php echo form_error('lokasiPoyek') ?>
                </div>
                <br>


                <!-- <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-addon"></span>
                </div>
                <br> -->

                Nilai Kontrak
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" name="nilaiKontrak" class="form-control <?php echo form_error('lnilaiKontrak') ? 'is invalid' : '' ?>"">
                    <span class=" input-group-addon">,00</span>
                </div>
                <div class="invalid-feedback">
                    <?php echo form_error('nilaiKontrak') ?>
                </div>
                <br>

                <div class="box-footer">
                    <input class="btn btn-success" type="submit" value="Simpan" />
                </div>
            </form>
    </section>
</div>