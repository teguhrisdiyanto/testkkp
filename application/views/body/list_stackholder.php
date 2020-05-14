<div class="content-wrapper">
	<section class="content">

		<div class="col col-md-12">
			<!-- <button name="#">Tambah Data</button> -->



			<a href="<?php echo base_url(); ?>Input_stackholder/input_stackholder_list">
				<div class="btn btn-success">
					<i class="fa fa-th"></i> <span>Tambah Data!</span>
				</div>
				<span class="pull-right-container">
					<small class="label pull-right bg-green">new</small>
				</span>
			</a>
			<div class="box box-primary">

				<div class="card-header">

				</div>
				<div class="card-body">

				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped" id="example1">

						<!-- field -->
						<thead>
							<tr>
								<th>No.</th>
								<th>Pekerjaan Proyek</th>
								<th>Lokasi Proyek</th>
								<th>Nilai Kontrak</th>
								<th>Action</th>
							</tr>
						</thead>

						<!-- record -->
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($stackholders as $stackholder) : ?>
								<tr>
									<td> <?= $i;  ?>
									</td>
									<td>
										<?= $stackholder->pekerjaan_proyek; ?>
									</td>
									<td>
										<?= $stackholder->lokasi_proyek; ?>
									</td>
									<td>
										<?= $stackholder->nilai_kontrak; ?>
									</td>
									<td>
										<a href="<?php echo base_url('Stack_holder/ubah/' . $stackholder->id)  ?>"" class=" btn btn-success">Ubah</a> --
										<a href="<?php echo base_url('Stack_holder/delete/' . $stackholder->id)  ?>" class="btn btn-success tombol-hapus">Hapus</a>
									</td>
								</tr>
								<?php $i++; ?>

							<?php endforeach; ?>


					</table>

				</div>
			</div>
	</section>
</div>
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
	$('.tombol-hapus').on('click', function(e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Apakah anda yakin ingin menghapus data ini',
			text: "Data produk akan dihapus!",
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

<!-- /.content -->