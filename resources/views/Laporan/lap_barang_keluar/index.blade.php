@extends('Superadmin.app')
@section('content')

<style>
    /* Style untuk menyembunyikan sidebar saat mencetak */
    @media print {
        .sidebar {
            display: none;
        }
    }

    .print-button {
            display: none; /* Menghilangkan tombol cetak saat mencetak */
    }

    .print-button {
        position: absolute;
        top: 10px; /* Sesuaikan dengan jarak atas yang diinginkan */
        right: 10px; /* Sesuaikan dengan jarak kanan yang diinginkan */
    }
</style>

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h4 class="content-header-title mb-0">Laporan / Laporan Barang Keluar</h4>
            </div>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-md-3">
        <label for="start_date">Dari Tanggal</label>
        <input type="date" id="start_date" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="end_date">Hingga Tanggal</label>
        <input type="date" id="end_date" class="form-control">
    </div>
    <div class="col-md-6 float-end mt-1">
        <button id="print_button" class="btn-primary float-end btn-sm mx-1" >
            <i class="fas fa-print"></i> Print
        </button>
    </div>
    
    
    {{-- <div class="col-md-6">
        <div class="btn-group" role="group">
            
            <button id="filter_button" class="btn-success btn-sm mx-1">
                <i class="fas fa-filter"></i> Filter
            </button>
            <button id="reset_button" class="btn-edit btn-sm mx-1">
                <i class="fas fa-redo"></i> Reset
            </button>
            <button id="pdf_button" class="btn-danger btn-sm mx-1">
                <i class="fas fa-file-pdf"></i> Pdf
            </button>
        </div>
    </div> --}}
</div>

<div class="table-responsive text-nowrap">
    <div class="col-xl-11 col-md-11 col-11">
        <div class="card card-statistics px-0">
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
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
       // Mengambil referensi tombol print
       var printButton = document.getElementById("print_button");
       var pdfButton = document.getElementById("pdf_button");

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
                
                 // Mencetak jika pengguna mengonfirmasi
                 var style = '<style>';
               style += 'table { width: 100%; }';
               style += 'table, th, td { border: 1px solid black; border-collapse: collapse; }';
               style += 'th, td { padding: 8px; text-align: left; }';
               style += '</style>';

               var printWindow = window.open('', '', 'width=600,height=600');
               printWindow.document.open();
               printWindow.document.write('<html><head>' + style + '</head><body>');
               printWindow.document.write('<h4>Laporan Barang Keluar</h4>'); // Tambahkan teks laporan
               printWindow.document.write(document.querySelector('.table-responsive').innerHTML);
               printWindow.document.write('</body></html>');
               printWindow.document.close();
               printWindow.print();
               printWindow.close();

                

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
                createPDF();
                
                   // Mencetak jika pengguna mengonfirmasi
                   var style = '<style>';
               style += 'table { width: 100%; }';
               style += 'table, th, td { border: 1px solid black; border-collapse: collapse; }';
               style += 'th, td { padding: 8px; text-align: left; }';
               style += '</style>';

               var printWindow = window.open('', '', 'width=600,height=600');
               printWindow.document.open();
               printWindow.document.write('<html><head>' + style + '</head><body>');
               printWindow.document.write(document.querySelector('.table-responsive').innerHTML);
               printWindow.document.write('</body></html>');
               printWindow.document.close();
               printWindow.print();
               printWindow.close();
               }
           });
       });
   });


   document.addEventListener("DOMContentLoaded", function() {
       // Mengambil referensi tombol PDF
       var pdfButton = document.getElementById("pdf_button");

       // Menambahkan event listener ketika tombol PDF diklik
       pdfButton.addEventListener("click", function() {
           Swal.fire({
               title: 'Konfirmasi PDF',
               text: 'Apakah Anda yakin ingin membuat laporan dalam bentuk PDF?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Buat PDF',
               customClass: {
                   confirmButton: 'btn btn-danger',
                   cancelButton: 'btn btn-secondary ms-1'
               },
               buttonsStyling: false
           }).then(function (result) {
               if (result.isConfirmed) {
                   createPDF(); // Membuat PDF jika pengguna mengonfirmasi
               }
           });
       });
   });

   // Fungsi untuk membuat PDF
   function createPDF() {
       var doc = new jsPDF();
       doc.text("Laporan Barang Keluar", 10, 10);
       // Tambahkan konten PDF lainnya sesuai kebutuhan
       // Misalnya, Anda dapat menambahkan isi tabel ke PDF di sini.

       // Simpan PDF sebagai file atau tampilkan dalam jendela baru
       // doc.save("laporan-barang-keluar.pdf"); // Simpan sebagai file
       doc.output("dataurlnewwindow"); // Tampilkan dalam jendela baru
   }
</script>
@endsection