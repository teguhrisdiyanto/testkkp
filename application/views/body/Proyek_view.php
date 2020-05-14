<div class="content-wrapper">
    <section class="content">
        <h3> Data Proyek</h3>



        <!-- <?php var_dump($proyek);
        ?> -->
        <?php //var_dump($this->CI->DescryptAes('nm_proyek')); 
        ?>

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
            <!-- <button class="btn btn-primary"><i class=" fa fa-plus"> Tabah Data Jenis Bangunan</i></button> -->
            <a href="<?php echo base_url(); ?>Proyek/form_tambah" class="btn btn-primary  btn-md active" role="button" aria-pressed="true"><i class=" fa fa-plus"> Tambah Data Proyek</i></a>

            <div class="box box-primary">
                <div class="card-header">
                    <!-- <h3>Lokasi</h3> -->
                </div>
                <div class="card-body"></div>
                <div class="box-body">
                    <table class="table table-hover table-bordered table-striped" id="example1">

                        <!-- field -->
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Proyek</th>
                                <th>Nama Proyek</th>
                                <th>Nilai Kontrak</th>
                                <th>Nilai DP</th>
                                <th>Sisa Bayar</th>
                                <th>Lokasi</th>
                                <th>Jenis Bangunan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <!-- <?php var_dump($proyek) ?> -->
                        <!-- record -->
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($proyek as $Prk) : ?>
                                <!-- ?php var_dump($this->CI->DescryptAes($Proyek->tgl_proyek)); ?> -->
                                <!-- ?php var_dump($Proyek->tgl_proyek); ?> -->
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td><?php
                                        // echo $Prk->tgl_proyek
                                        echo  $this->CI->DescryptAes($Prk->tgl_proyek)
                                        ?>
                                    </td>
                                    <td><?php
                                        echo  $this->CI->DescryptAes($Prk->nm_proyek)
                                        ?>
                                    </td>
                                    <td><?php
                                        echo  "Rp. " . $this->CI->DescryptAes($Prk->nilai_kontrak)
                                        ?>
                                    </td>
                                    <td><?php
                                        echo  "Rp. " . $this->CI->DescryptAes($Prk->nilai_dp)
                                        ?>
                                    </td>
                                    <td><?php
                                        echo  "Rp. " . $this->CI->DescryptAes($Prk->bayar)
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo  $this->CI->DescryptAes($Prk->nm_lokasi)
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo  $this->CI->DescryptAes($Prk->nm_jenis)
                                        ?>
                                    </td>
                                    <td>
                                        <!-- <a href="<?php echo base_url()  ?>" class=" btn btn-success" data-toggle="modal" data-target="#exampleModal">Ubah</a> -- -->
                                        <!-- onclick="javascript: return confirm('Anda yakin hapus?')" -->
                                        <a href="<?php echo base_url('Proyek/Cicilan/' . $Prk->kd_proyek)  ?>" class="btn btn-success">Input Cicilan</a>--
                                        <a href="<?php echo base_url('Proyek/hapus/' . $Prk->kd_proyek)  ?>" class="btn btn-danger tombol-hapus">Hapus</a>

                                    </td>
                                </tr>
                                <?php $i++; ?>

                            <?php endforeach; ?>

                            <!-- notiv -->
                            <?php echo $this->session->flashdata('msg'); ?>
                            <!-- notiv -->
                    </table>

                </div>
            </div>
        </div>
    </section>

</div>



<script>
    function cobaData(param) {
        alert("ini adalah data dari table = " + param)
    }

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
    // hapus
    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus data ini',
            text: "Data Proyek akan dihapus!",
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