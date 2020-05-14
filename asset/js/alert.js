const flashData = $('.flash-data').data('flashdata');

console.log(flashData);

if (flashData){
    Swal.fire({
        
        title: 'Data Produk',
        text: '' + flashData,
        type: 'success'
      });

}
//tombol hapus
$('.tombol-hapus').on('click', function(e){

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