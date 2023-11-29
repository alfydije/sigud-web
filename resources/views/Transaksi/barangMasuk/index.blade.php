    @extends('Superadmin.app')

    @section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h4 class="content-header-title mb-0">Barang Masuk</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Basic table -->
    {{-- <div class="card"> --}}
        <div class="card-header">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
                Tambah Data
            </button>
        </div>
        <div class="col-xl-11 col-md-11 col-11">
            <div class="card card-statistics px-0 table-responsive text-nowrap">
        <table class="table text-center dt-responsive nowrap" style="border-collapse: collapse">
            <thead>
                <tr>
                    <th> Nama Barang</th>
                    <th> Nama Supplier</th>
                    <th> Keterangan</th>
                    <th> Kuantity</th>
                    <th> Kode barang</th>
                    <th> Serial Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if (!empty($))
                <tr>
                    <td class="text-center">Oppo</td>
                    <td class="text-center">A</td>
                    <td class="text-center">Aman</td>
                    <td class="text-center">23</td>
                    <td class="text-center">2A</td>                    
                    <td class="text-center">212</td>                    
                    <td class="text-center">
                        <a href="javascript:void(0);" class="btn btn-warning btn-edit" data-id="" data-nama=""><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Tambahkan data lain di sini sesuai kebutuhan -->
            </tbody>
        </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Form Tambah Data Barang Masuk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group mb-1">
                        <label for="barang_id" class="form-label">Nama Barang</label>
                        <select class="form-select" name="nama_barang" aria-label="Default select example">
                            <option disabled selected>Pilih Barang</option>
                            {{-- @foreach ($type as $item)
                                <option value="{{ $item->id }}" {{ old('type_section', '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->type_name }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <!-- Input Supplier -->
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input class="form-control" type="text" id="nama_supplier" name="nama_supplier">
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <!-- Input Keterangan -->
                        <label class="form-label" for="keterangan">Keterangan:</label>
                        <input class="form-control" type="text" id="keterangan" name="keterangan">
                    </div>
                    <div class="form-group mb-1">
                        <!-- Input Kuantiti -->
                        <label class="form-label" for="kuantiti">Kuantiti:</label>
                        <input class="form-control" type="number" id="kuantiti" name="kuantiti">
                    </div>
                    <div class="form-group mb-1">
                        <!-- Input Detail Barang -->
                        <label class="form-label" for="kode_barang">Kode Barang:</label>
                        <input class="form-control" type="text" id="kode_barang" name="kode_barang[]">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="serial_number">Serial Number:</label>
                        <div class="input-group mb-1">
                            <input class="form-control" type="text" id="serial_number" name="serial_number[]">
                            <button type="button" class="btn btn-secondary" id="add_more">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <form method="" action="">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Serial Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomor" placeholder="">
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary" id="btnScanBarcode">
                            <i class="fas fa-camera"></i> Pindai Barcode
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for "brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" placeholder="">
                    </div>
                    <div class="mb-5">
                        <label for="formFile" class="form-label">Tambah Gambar</label>
                        <input class="form-control" type="file" id="formFile" disabled>
                    </div>
                </form> --}}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSave">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-field')) {
            event.target.closest('.form-group').remove();
        }
    });

    document.getElementById('add_more').addEventListener('click', function() {
        const inputDiv = document.createElement('div');
        inputDiv.className = 'form-group'; // Adding form-group class to dynamically added div
        inputDiv.innerHTML = `
        
            <label class="form-label" for="serial_number">Serial Number:</label>
            <div class="input-group mb-1">
                <input class="form-control" type="text" name="serial_number[]">
                <button type="button" class="btn btn-secondary remove-field">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        `;
        document.querySelector('form').appendChild(inputDiv);
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <script>
    var editMode = false; // Variabel untuk menyimpan status edit atau tambah
    var editItemId = null; // Variabel untuk menyimpan ID item yang akan di-edit
    // Event handler saat tombol "Pindai Barcode" ditekan
    document.getElementById("btnScanBarcode").addEventListener("click", function () {
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#nomor"),
                constraints: {
                    facingMode: "environment"
                },
            },
            decoder: {
                readers: ["code_128_reader"],
            }
        });

        Quagga.onDetected((result) => {
            var barcode = result.codeResult.code;
            document.getElementById("nomor").value = barcode;
            Quagga.stop();
        });

        Quagga.start();
    });
    // Event handler saat tombol "Tambah Data" ditekan
    document.getElementById("btnSave").addEventListener("click", function () {
        if (editMode) {
            Swal.fire({
                title: 'Konfirmasi Edit',
                text: 'Apakah Anda yakin ingin menyimpan perubahan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-secondary ms-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.isConfirmed) {
                    // Lakukan tindakan pengeditan di sini, seperti mengirim permintaan ke server dengan editItemId
                    // Anda juga dapat menambahkan kode untuk meng-update item dengan ID yang sesuai
                    editMode = false; // Kembalikan mode ke tambah
                    editItemId = null; // Reset editItemId
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Batal', 'Perubahan dibatalkan', 'error');
                }
            });
        } else {
            Swal.fire({
                title: 'Konfirmasi Simpan',
                text: 'Apakah Anda yakin ingin menyimpan data ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-secondary ms-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.isConfirmed) {
                    // Lakukan tindakan penambahan data baru di sini
                    editMode = false; // Kembalikan mode ke tambah
                    editItemId = null; // Reset editItemId
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Batal', 'Penambahan data dibatalkan', 'error');
                }
            });
        }
    });
    // Event handler saat tombol "Edit" ditekan
    document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("btn-edit")) {
            editMode = true; // Setel mode ke edit
            var itemId = e.target.getAttribute("data-id");
            editItemId = itemId; // Simpan ID item yang akan di-edit
            var kategoriValue = "Ambil nilai kategori sesuai ID"; // Ganti dengan nilai kategori yang sesuai
            var brandValue = "Ambil nilai brand sesuai ID"; // Ganti dengan nilai brand yang sesuai
            var namaBarangValue = "Ambil nilai nama barang sesuai ID"; // Ganti dengan nilai nama barang yang sesuai

            // Isi modal dengan data yang sesuai untuk pengeditan
            document.getElementById("nomor").value = itemId;
            document.getElementById("kategori").value = kategoriValue;
            document.getElementById("brand").value = brandValue;
            document.getElementById("namaBarang").value = namaBarangValue;

            // Ubah teks judul modal
            document.getElementById("modalTitle").textContent = "Edit Data Barang Masuk"; // Mengganti judul sesuai mode

            // Tampilkan modal untuk pengeditan
            var modal = new bootstrap.Modal(document.getElementById("modaltambah"));
            modal.show();
        }
    });
    document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("btn-delete")) {
        var itemId = e.target.getAttribute("data-id");
        Swal.fire({
        title: 'Konfirmasi Hapus',
        text: `Apakah Anda yakin ingin menghapus item dengan ID ${itemId}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary ms-1'
        },
        buttonsStyling: false
        }).then(function (result) {
        if (result.isConfirmed) {
            // Lakukan tindakan penghapusan di sini, seperti mengirim permintaan ke server atau menghapus dari data Anda.
            // Anda dapat menambahkan kode di sini untuk menghapus item dengan ID yang sesuai.
            Swal.fire('Berhasil!', 'Item berhasil dihapus', 'success');
        }
        });
    }
    });

    </script>

    @endsection