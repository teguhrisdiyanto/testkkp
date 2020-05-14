<div class="content-wrapper">
    <section class="content">
        <h3> Data Lokasi</h3>
        <!-- <?php var_dump($lokasi); ?> -->

        <div class="col col-md-12">




            <!-- notiv bootsrap-->
            <!-- <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div> -->
            <!-- notiv sweetAlert-->
            <?php if ($this->session->flashdata('msg')) : ?>
                <script>
                    Swal.fire({
                        title: "Done",
                        text: "<?php echo $this->session->flashdata('msg'); ?>",
                        timer: 1500,
                        showConfirmButton: false,
                        type: 'success'
                    });
                </script>
            <?php endif; ?>



            <!-- tombol tambah data -->
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Tambah Lokasi</i></!-->
            <a href="<?php echo base_url(); ?>Lokasi/form_tambah" class="btn btn-primary  btn-md active" role="button" aria-pressed="true"><i class=" fa fa-plus"> Tambah Data Lokasi</i></a>

            <div class="box box-primary">
                <div class="card-header">
                    <!-- <h3>Lokasi</h3> -->
                </div>
                <div class="box-body">
                    <table class="table table-hover table-bordered table-striped" id="example1">

                        <!-- field -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <!-- record -->
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lokasi as $Lok) : ?>
                                <tr>
                                    <td> <?= $i;  ?>
                                    </td>
                                    <td><?php echo $this->CI->DescryptAes($Lok->nm_lokasi) ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('Lokasi/ubah/' . $Lok->kd_lokasi)  ?>" class=" btn btn-success" id="UBAH">Ubah</a> --
                                        <a href="<?php echo base_url('Lokasi/hapus/' . $Lok->kd_lokasi)  ?>" class="btn btn-danger tombol-hapus" id="HAPUS">Hapus</a>
                                        <!-- onclick="javascript: return confirm('Anda yakin hapus?')" -->
                                        <!--  -->
                                    </td>
                                </tr>
                                <?php $i++; ?>

                            <?php endforeach; ?>


                    </table>

                </div>
            </div>
        </div>
    </section>



</div>

<!-- data picker -->
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>


<script>
    // ubah
    const ubah = document.querySelector('#UBAH');
    ubah.addEventListener('click', function() {
        Swal.fire({
            title: 'Done',
            text: "<?php echo $this->session->flashdata('msg'); ?>",
            type: 'success'
        });
    });

    // hapus
    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ini',
            text: "Data lokasi akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {

                document.location.href = href;

            }
        })

    });
</script>