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
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Permintaan Peminjaman Barang</h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form id="print-form">
                    <body>
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-md-4">
                                    <img src="data:image/jpeg;base64,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"
                                            alt="Logo" class="mr-3" style="max-width: 100px; height: auto;">
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <h2>TANDA TERIMA</h2>
                                        <p>No.Doc: 2709/BAST/JMI-JSA/IX/2023</p>
                                        <p>PT JARING MAL INDONESIA</p>
                                    </div>
                                    <div class="address">
                                        <p>Kepada: PT JARING SOLUSI APLIKASI</p>
                                        <p>Alamat: JL krekot bunder raya nomor 26</p>
                                        <p>Tanggal: 27/09/2023</p>
                                        <p>Project: Peminjaman Juru</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="header text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <h2>TANDA TERIMA</h2>
                                        <p>No.Doc: 2709/BAST/JMI-JSA/IX/2023</p>
                                        <p>PT JARING MAL INDONESIA</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="address">
                                <p>Kepada: PT JARING SOLUSI APLIKASI</p>
                                <p>Alamat: JL krekot bunder raya nomor 26</p>
                                <p>Tanggal: 27/09/2023</p>
                                <p>Project: Peminjaman Juru</p>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
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
                            <p>Catatan: Serah terima barang</p>
                            <div class="signature">
                                <p>Authorized Signature</p>
                                <p>PT. Jaring Mal Indonesia</p>
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
