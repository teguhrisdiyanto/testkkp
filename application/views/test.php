<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>
    <h1>test</h1>

    <!-- cara memangil SweetAlert dengan onclick -->
    <button type="button" id="tombol" onclick="Swal.fire('Selamat Datang','Berhasil', 'success')">Klik saya</button>


    <script src="http://localhost/KKP_SB1-Copy/asset/js/sweetalert2.all.min.js"></script>

    <!-- dibawah cara ke 2 dengan DOM -->
    <script>
        const tombol = document.querySelector('#tombol');
        tombol.addEventListener('click', function() {
            Swal.fire({
                title: 'hello world',
                text: 'berhasil disimpan',
                type: 'warning'
            });
        });
    </script>

</body>

</html>