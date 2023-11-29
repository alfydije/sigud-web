    @extends('Superadmin.app')

    @section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h4 class="content-header-title mb-0">Master Data / Kategori</h4>
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
                    <th class="text-center">Nomer</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @if (!empty($nama_kategori))
            @foreach ($nama_kategori as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>   
                    <td class="text-center">{{ $item['nama_kategori'] }}</td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="btn btn-warning btn-edit" data-toogle="modal" data-id="{{ $item['id'] }}" data-nama="{{ $item['nama_kategori'] }}"><i class="fa fa-pen"></i></a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="{{ $item['id'] }}"><i
                            class="fa fa-trash"></i></a>                    </td>
                </tr>
            @endforeach
             @else
            <tr>
                <td colspan="3" class="text-center">No data available</td>
            </tr>
        @endif
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
                    <h1 class="modal-title fs-5" id="modalTitle">Form Tambah Data Kategori</h1>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('http://192.168.18.9:8000/api/kategori')}}">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        @method('POST')
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="">
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
    
        
        document.addEventListener("click", function (e) {
            if (e.target && e.target.classList.contains("btn-edit")) {
                var itemId = e.target.getAttribute("data-id");
                var nama_kategori = e.target.getAttribute("data-nama"); 
                showEditModal(itemId);
            }
        });
    // Function untuk manggil Modal edit *ini PENTING
    function showEditModal(itemId) {
        editMode = true; 
        editItemId = itemId; 
        document.getElementById("id").value = itemId; 
    
        document.getElementById("modalTitle").textContent = "Edit Data Kategori";
        
        var modal = new bootstrap.Modal(document.getElementById("modaltambah"));
        var csrfToken = document.head.querySelector('meta[name="_token"]').content;
        modal.show();
        $.ajax('/kategori/show', {
   type: 'GET',  
   dataType:'json',
   data: { id: itemId },
   headers: {
               
               'X-CSRF-TOKEN': csrfToken,        
           },  
   success: function (response, status, xhr) {
    // id diambil dari id form
    document.getElementById("id").value = itemId; 
    document.getElementById("nama_kategori").value = response.data.nama_kategori;
               
           
   },
   error: function (jqXhr, textStatus, errorMessage) {
           $('p').append('Error' + errorMessage);
   }
});
    }

        
      

    document.getElementById("btnSave").addEventListener("click", function () {
        itemId = document.getElementById("id").value;
       var nama_kategori = document.getElementById("nama_kategori").value;
       var csrfToken = document.head.querySelector('meta[name="_token"]').content;
       var apiUrl = editMode ? '/kategori/' + itemId : '/kategori';
       

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
   data: { namaKategori: nama_kategori },
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
                   document.getElementById("nama_kategori").value = "";
                   editMode = false; // Kembalikan mode ke tambah
                   editItemId = null; // Reset editItemId
               } else if (result.dismiss === Swal.DismissReason.cancel) {
                   Swal.fire('Batal', 'Penambahan data dibatalkan', 'error');
               }
           });

});
// document.addEventListener("click", function (e) {
//         if (e.target && e.target.classList.contains("btn-delete")) {
//             var itemId = document.getElementById("id").value;
//             var nama_kategori = document.getElementById("nama_kategori").value;
//             var csrfToken = document.head.querySelector('meta[name="_token"]').content;

//             Swal.fire({
//                 title: 'Konfirmasi Hapus',
//                 text: `Apakah Anda yakin ingin menghapus item dengan ID ${itemId}?`,
//                 icon: 'warning',
//                 showCancelButton: true,
//                 confirmButtonText: 'Hapus',
//                 customClass: {
//                     confirmButton: 'btn btn-danger',
//                     cancelButton: 'btn btn-secondary ms-1'
//                 },
//                 buttonsStyling: false
//             }).then(function (result) {
//                 if (result.isConfirmed) {
//                    $.ajax('/kategori/delete', {
//                     type: 'POST',
//                     dataType: 'json',
//                     data: { id: itemId },
//                     headers: {
//                         'X-CSRF-TOKEN': csrfToken,
//                     },  // data to submit
//                     success: function (response, status, xhr) {
//                         console.log(status);
//                         Swal.fire({
//                             title: 'Berhasil',
//                             text: 'data berhasil disimpan',
//                             icon: 'success',
//                         }).then((result) => {
//                             if (result.isConfirmed) {
//                                 location.reload();
//                             }
//                         });
//                     },
//                 });
                    
//                     // Swal.fire('Berhasil!', 'Item berhasil dihapus', 'success');
//                 }
//             });
//         }
//     });
document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("btn-delete")) {
            var itemId = e.target.getAttribute("data-id");
            var nama_kategori = e.target.getAttribute("nama_kategori"); // Mengambil atribut data-nama
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
                    $.ajax('/kategori/delete', {
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
