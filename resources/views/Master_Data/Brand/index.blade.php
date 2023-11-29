@extends('Superadmin.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h4 class="content-header-title mb-0">Master Data / Brand</h4>
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
                <th class="text-center">Nomer</th>
                <th class="text-center">Nama Brand</th>
                <th class="text-center">Actions</th>
            </tr>

        </thead>
        <tbody class="table-border-bottom-0">

            @if (!empty($brandData))
            @foreach ($brandData as $item)
            <tr>
                <td class="text-center">
                    <i class="ti ti-brand-angular ti-lg text-danger me-3"></i>
                    <strong>{{ $loop->iteration }}</strong>
                </td>
                <td class="text-center">{{ $item['nama_brand'] }}</td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="btn btn-warning btn-edit" data-toogle="modal"
                        data-id="{{ $item['id'] }}" data-nama="{{ $item['nama_brand'] }}"><i class="fa fa-pen"></i></a>
                    <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="{{ $item['id'] }}"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3" class="text-center">No data available</td>
            </tr>
            @endif
            <!-- Tambahkan data lain di sini sesuai kebutuhan -->
        </tbody>
    </table>
</div>

<!-- Modal Tambah/ -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Form Tambah Data Brand</h1> <!-- Judul modal dengan ID -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="/brand" id="brandForm">
                    @csrf
                    <input type="hidden" id="brandId" name="brand_id">
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="namaBrand" class="form-label">Nama Brand</label>
                        <input type="text" class="form-control" id="namaBrand" name="namaBrand" placeholder="">
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
    // Event handler saat tombol "Edit" ditekan
    document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("btn-edit")) {
            var itemId = e.target.getAttribute("data-id");
            var namaBrand = e.target.getAttribute("data-nama"); // Mengambil atribut data-nama
            showEditModal(itemId);
        }
    });
    //fungsi untuk menampilkan modal edit
    function showEditModal(itemId) {
        editMode = true; // Setel mode ke edit
        editItemId = itemId; // Simpan ID item yang akan di-edit
        document.getElementById("brandId").value = itemId; // Setel nilai input hidden untuk ID brand
        // Ubah teks judul modal
        document.getElementById("modalTitle").textContent = "Edit Data Brand";
        // Tampilkan modal untuk pengeditan
        var modal = new bootstrap.Modal(document.getElementById("modaltambah"));
        var csrfToken = document.head.querySelector('meta[name="_token"]').content;
        modal.show();
        // Buat permintaan Ajax untuk mengambil data dari API
        $.ajax('/brand/show', {
            type: 'GET',
            dataType: 'json',
            data: { id: itemId },
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },  // data to submit
            success: function (data, status, xhr) {
                document.getElementById("brandId").value = itemId;
                document.getElementById("nomor").value = itemId;
                document.getElementById("namaBrand").value = data.data.nama_brand;
                console.log(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                $('p').append('Error' + errorMessage);
            }
        });
    }
    // Event handler saat tombol "Tambah Data" ditekan
    document.getElementById("btnSave").addEventListener("click", function () {
        var nomor = document.getElementById("nomor").value;
        var namaBrand = document.getElementById("namaBrand").value;
        var csrfToken = document.head.querySelector('meta[name="_token"]').content;
        var apiUrl = editMode ? '/brand/' + editItemId : '/brand';
        // var task = editMode ? '' + editItemId : '/brand';
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
                $.ajax(apiUrl, {
                    type: 'POST',
                    dataType: 'json',
                    data: { namaBrand: namaBrand },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },  // data to submit
                    success: function (data, status, xhr) {
                        console.log(status);
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'data berhasil disimpan',
                            icon: 'success',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        $('p').append('Error' + errorMessage);
                    }
                });
                // Lakukan tindakan penambahan data baru di sini
                document.getElementById("nomor").value = "";
                document.getElementById("namaBrand").value = "";
                editMode = false; // Kembalikan mode ke tambah
                editItemId = null; // Reset editItemId
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Batal', 'Penambahan data dibatalkan', 'error');
            }
        });
    });
    document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("btn-delete")) {
            var itemId = e.target.getAttribute("data-id");
            var namaBrand = e.target.getAttribute("data-nama"); // Mengambil atribut data-nama
            var csrfToken = document.head.querySelector('meta[name="_token"]').content;

            

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
                    $.ajax('/brand/delete', {
                    type: 'POST',
                    dataType: 'json',
                    data: { id: itemId },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },  // data to submit
                    success: function (data, status, xhr) {
                        console.log(status);
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'data berhasil disimpan',
                            icon: 'success',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                });
                    // Swal.fire('Berhasil!', 'Item berhasil dihapus', 'success');
                }
            });
        }
    });
</script>

@endsection