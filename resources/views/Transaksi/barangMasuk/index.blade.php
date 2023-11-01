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

    <table class="table text-center">
        <thead>
            <tr>
                <th class="text-center">Serial Number</th>
                <th class="text-center">Kategori </th>

                <th class="text-center"> Brand</th>
                <th class="text-center"> Nama Barang</th>
                <th class="text-center"> Gambar</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <tr>
                <td class="text-center"><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>001</strong></td>
                <td class="text-center">Hermes</td>
                <td class="text-center">Hermes</td>
                <td class="text-center">CPU</td>
                <td class="text-center">Hermes</td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="btn btn-warning btn-edit" data-id="1" data-nama="Hermes"><i class="fa fa-pen"></i></a>
                    <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <!-- Tambahkan data lain di sini sesuai kebutuhan -->
        </tbody>
    </table>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Form Tambah Data Brand</h1> <!-- Judul modal dengan ID -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="" action="">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="nomor" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
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
var editMode = false; // Variabel untuk menyimpan status edit atau tambah
var editItemId = null; // Variabel untuk menyimpan ID item yang akan di-edit

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