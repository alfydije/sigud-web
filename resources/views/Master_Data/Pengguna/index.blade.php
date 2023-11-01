    @extends('Superadmin.app')

    @section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h4 class="content-header-title mb-0">Master Data / Pengguna</h4>
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

        <table class="table text-center">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pengguna</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td class="text-center"><strong>1</strong></td>
                        <td class="text-center">Cindy</td>
                        <td class="text-center">1234567</td>
                        <td class="text-center">Peminjam</td>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="btn btn-warning btn-edit" data-id="1" data-nama="Cindy"><i class="fa fa-pen"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="1"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <!-- Tambahkan data lain di sini sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah/Edit -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">       <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTitle">Form Tambah Data Pengguna</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="" action="">
                            <div class="mb-3">
                                <label for="no" class="form-label">No</label>
                                <input type="text" class="form-control" id="no" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="namaPengguna" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" id="namaPengguna" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" class="form-control" id="role" placeholder="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="btnSave">Simpan</button>
                    </div>
            </div>
        </div>
    </div>

<script>
    var editMode = false;
    var editItemId = null;

    // Fungsi untuk mengatur formulir menjadi kosong dan bertuliskan "Tambah Data"
    function setFormToDefault() {
        document.getElementById("no").value = "";
        document.getElementById("namaPengguna").value = "";
        document.getElementById("password").value = "";
        document.getElementById("role").value = "";

        document.getElementById("modalTitle").textContent = "Tambah Data Pengguna";
        editMode = false;
        editItemId = null;
    }

    // Event listener untuk tombol "Tambah Data"
    document.querySelector('[data-bs-target="#modaltambah"]').addEventListener("click", function () {
        setFormToDefault();
        var modal = new bootstrap.Modal(document.getElementById("modaltambah"));
        modal.show();
    });

    document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("btn-edit")) {
            editMode = true;
            var itemId = e.target.getAttribute("data-id");
            editItemId = itemId;
            var namaPengguna = e.target.getAttribute("data-nama");

            document.getElementById("no").value = itemId;
            document.getElementById("namaPengguna").value = namaPengguna;

            document.getElementById("modalTitle").textContent = "Edit Data Pengguna";

            var modal = new bootstrap.Modal(document.getElementById("modaltambah"));
            modal.show();
        }
    });

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
                    editMode = false;
                    editItemId = null;
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
                    setFormToDefault(); // Reset formulir setelah penyimpanan berhasil
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Batal', 'Penambahan data dibatalkan', 'error');
                }
            });
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