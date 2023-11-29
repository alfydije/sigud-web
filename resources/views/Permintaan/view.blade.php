@extends('Superadmin.app')

@section('content')
<!-- Basic Layout -->
<div class="centered-form">
    <div class="form-container">
        <div class="row">
            <div class="col-sm-10 text-end">
                <button id="print_button" class="btn-primary btn-sm mx-1">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>
        <br>
        <div class="card mb-4">
            {{-- <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Permintaan Peminjaman Barang</h5>
                <small class="text-muted float-end"></small>
            </div> --}}
            <div class="card-body">
                <form id="print-form">
                    <body>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="header text-center">
                                        <div class="d-flex align-items-center justify-content-center ms-2">
                                            <img src="{{ asset('app-assets')}}/logo.jpg" alt="Logo" style="max-width: 300px; height: auto;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-column align-items-center justify-content-center">
                                    <h1>TANDA TERIMA</h1>
                                    <h4>No.Doc: 2709/BAST/JMI-JSA/IX/2023</h2>
                                </div>


                                <div class="address ms-2 mt-3">
                                    <p>Kepada  : PT JARING SOLUSI APLIKASI</p>
                                    <p>Alamat  : JL krekot bunder raya nomor 26</p>
                                    <p>Tanggal : 27/09/2023</p>
                                    <p>Project : Peminjaman Juru</p>
                                </div>

                                <div class="table-responsive text-nowrap mx-2">
                                    <table class="table table-stripped table-bordered dt-responsive nowrap" style="border-collapse: collapse">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">NO</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Serial Number</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>EDC Z90 4G</td>
                                                <td>1</td>
                                                <td>0200020030059834</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                            <p>Catatan: Serah terima barang</p>
                            <div class="signature">
                                <p>Authorized Signature</p>
                                <b><p>PT. Jaring Mal Indonesia</p></b>
                                <br>
                                <br>
                                <br>
                                <p>………………………………………..</p>
                                <p>………………………………………..</p>
                            </div>
                        </div>
                    </body>
                </form>
                <div class="row justify-content-between">
                    <div class="col-sm-10">
                        <button type="button" id="kembaliButton" class="btn btn-primary" onclick="window.history.back();">Kembali</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Mengambil referensi tombol print
        var printButton = document.getElementById("print_button");

        // Menambahkan event listener ketika tombol print diklik
        printButton.addEventListener("click", function () {
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
                    var printContent = document.getElementById("print-form").outerHTML;
                    var printWindow = window.open('', '', 'width=800,height=600');
                    printWindow.document.open();
                    printWindow.document.write('<html><head><title>Print</title></head><body>');
                    printWindow.document.write(printContent);
                    printWindow.document.write('</body></html');
                    printWindow.document.close();
                    printWindow.print();
                    printWindow.close();
                }
            });
        });
    });
</script>
@endsection
