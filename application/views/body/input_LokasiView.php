<div class="content-wrapper">
    <section class="content">


        <!-- Input addon -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Input Addon</h3>
            </div>

            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success"); ?>"></div>



            <form action="<?php echo base_url(); ?>input_Lokasi/input_Lokasi_Save" method="post" ">
                <div class=" box-body">

                <label for="lokasi">Lokasi Proyek</label>
                <div class="input-group">
                    <span class="input-group-addon" for="lokasi">@</span>
                    <input type="text" id="lokasi" name="nm_lokasi" class="form-control <?php echo form_error('nm_lokasi') ? 'is invalid' : '' ?>" placeholder="Lokasi anda!" />
                </div>
                <div class="">
                    <?php echo form_error('nm_lokasi') ?>
                </div>
                <br>

                <br>

                <div class="box-footer">
                    <input class="btn btn-success" type="submit" value="Simpan" />
                </div>
            </form>
    </section>
</div>