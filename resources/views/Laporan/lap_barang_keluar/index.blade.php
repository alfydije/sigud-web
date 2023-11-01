@extends('Superadmin.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h4 class="content-header-title mb-0">Laporan / Laporan Barang Keluar</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label for="start_date">Dari Tanggal</label>
        <input type="date" id="start_date" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="end_date">Hingga Tanggal</label>
        <input type="date" id="end_date" class="form-control">
    </div>
    <div class="col-md-6">
        <div class="btn-group" role="group">
            <button id="print_button" class="btn-primary btn-sm mx-1">
                <i class="fas fa-print"></i> Print
            </button>
            <button id="pdf_button" class="btn-danger btn-sm mx-1">
                <i class="fas fa-file-pdf"></i> Pdf
            </button>
        </div>
    </div>
</div>

<div class="table-responsive text-nowrap">
    <table class="table text-center">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal Keluar</th>
                <th class="text-center">Kode Barang</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Jumlah Keluar</th>
                <th class="text-center">Tujuan</th>

            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <tr>
                <td class="text-center"><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>1</strong></td>
                <td class="text-center">09 September 2022</td>
                <td class="text-center">12345t</td>
                <td class="text-center">Kulkas</td>
                <td class="text-center">10</td>
                <td class="text-center">Gudang Indramayu</td>
                <td class="text-center">
                </td>
            </tr>

            <tr>
                <td class="text-center"><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>2</strong></td>
                <td class="text-center">10 September 2023</td>
                <td class="text-center">34R</td>
                <td class="text-center">Komputer</td>
                <td class="text-center">10</td>
                <td class="text-center">Gudang Sindang</td>
                <td class="text-center">
                </td>
            </tr>

            <tr>
                <td class="text-center"><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>3</strong></td>
                <td class="text-center">11 September 2023</td>
                <td class="text-center">67Y</td>
                <td class="text-center">Buku</td>
                <td class="text-center">20</td>
                <td class="text-center">Gudang Jatibarang</td>
                <td class="text-center">
                </td>
            </tr>

        </tbody>
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
       // Mengambil referensi tombol print
       var printButton = document.getElementById("print_button");

       // Menambahkan event listener ketika tombol print diklik
       printButton.addEventListener("click", function() {
           Swal.fire({
               title: 'Konfirmasi Cetak',
               text: 'Apakah Anda yakin ingin mencetak laporan?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Cetak',
               customClass: {
                   confirmButton: 'btn btn-danger',
                   cancelButton: 'btn btn-secondary ms-1'
               },
               buttonsStyling: false
           }).then(function (result) {
               if (result.isConfirmed) {
                   window.print(); // Mencetak jika pengguna mengonfirmasi
               }
           });
       });
   });

   document.addEventListener("DOMContentLoaded", function() {
       // Mengambil referensi tombol print
       var printButton = document.getElementById("pdf_button");

       // Menambahkan event listener ketika tombol print diklik
       printButton.addEventListener("click", function() {
           Swal.fire({
               title: 'Konfirmasi Cetak',
               text: 'Apakah Anda yakin ingin mencetak laporan?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Cetak',
               customClass: {
                   confirmButton: 'btn btn-danger',
                   cancelButton: 'btn btn-secondary ms-1'
               },
               buttonsStyling: false
           }).then(function (result) {
               if (result.isConfirmed) {
                   window.print(); // Mencetak jika pengguna mengonfirmasi
               }
           });
       });
   });
</script>


@endsection
