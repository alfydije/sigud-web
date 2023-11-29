@extends('Superadmin.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h4 class="content-header-title mb-0">Supplier</h4>
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
        <div class="card card-statistics px-0">
    <table class="table text-center">
        <thead>
            <tr>
                <th class="text-center">No </th>
                <th class="text-center"> Nama</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @if (!empty($supplier))
            @foreach ($supplier as $item)
                <tr>
                    <td class="text-center">
                        <i class="ti ti-brand-angular ti-lg text-danger me-3"></i>
                        <strong>{{ $loop->iteration }}</strong>
                    </td>   
                    <td class="text-center">{{ $item['nama_supplier'] }}</td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="btn btn-warning btn-edit" data-id="{{ $item['id'] }}" data-nama="{{ $item['nama_supplier'] }}"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="{{ $item['id'] }}" data-nama="{{ $item['nama_supplier'] }}"><i class="fa fa-trash"></i></a>
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
    </div>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Form Tambah Data Supplier</h1> <!-- Judul modal dengan ID -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="" action="">
                    <input type="hidden"  id="id" placeholder="">

                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" placeholder="">
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
    itemId = document.getElementById("id").value;
       var nama_supplier = document.getElementById("nama_supplier").value;
       
       var csrfToken = document.head.querySelector('meta[name="_token"]').content;
       var apiUrl = editMode ? '/supplier/' + itemId : '/supplier';
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
                $.ajax(apiUrl, {
   type: 'POST',  
   dataType:'json',
   data: { nama_supplier: nama_supplier },
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
                // Lakukan tindakan pengeditan di sini, seperti mengirim permintaan ke server dengan editItemId
                // Anda juga dapat menambahkan kode untuk meng-update item dengan ID yang sesuai
                // editMode = false; // Kembalikan mode ke tambah
                // editItemId = null; // Reset editItemId
                // Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success');
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
                $.ajax(apiUrl, {
   type: 'POST',  
   dataType:'json',
   data: { nama_supplier: nama_supplier },
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
                // editMode = false; // Kembalikan mode ke tambah
                // editItemId = null; // Reset editItemId
                // Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success');
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire('Batal', 'Penambahan data dibatalkan', 'error');
            }
        });
    }
});
// Event handler saat tombol "Edit" ditekan
document.addEventListener("click", function (e) {
            if (e.target && e.target.classList.contains("btn-edit")) {
                var itemId = e.target.getAttribute("data-id");
                var nama_supplier = e.target.getAttribute("data-nama"); 
                showEditModal(itemId);
            }
        });
    // Function untuk manggil Modal edit *ini PENTING
    function showEditModal(itemId) {
        editMode = true; 
        editItemId = itemId; 
        document.getElementById("id").value = itemId; 
    
        document.getElementById("modalTitle").textContent = "Edit Data Supplier";
        
        var modal = new bootstrap.Modal(document.getElementById("modaltambah"));
        var csrfToken = document.head.querySelector('meta[name="_token"]').content;
        modal.show();
        $.ajax('/supplier/show', {
   type: 'GET',  
   dataType:'json',
   data: { id: itemId }, // id dari request controller 
   headers: {
               
               'X-CSRF-TOKEN': csrfToken,        
           },  
   success: function (response, status, xhr) {
    // id diambil dari id form
    document.getElementById("id").value = itemId; 
    document.getElementById("nama_supplier").value = response.data.nama_supplier;
    
               
           
   },
   error: function (jqXhr, textStatus, errorMessage) {
           $('p').append('Error' + errorMessage);
   }
});
    }

    //DELETE
document.addEventListener("click", function (e) {
    var csrfToken = document.head.querySelector('meta[name="_token"]').content;
    var apiUrl =  '/supplier/delete'

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
        $.ajax(apiUrl, {
   type: 'POST',  
   dataType:'json',
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
   error: function (jqXhr, textStatus, errorMessage) {
           $('p').append('Error' + errorMessage);
   }
});
        // Swal.fire('Berhasil!', 'Item berhasil dihapus', 'success');
      }
    });
  }
});

</script>

@endsection