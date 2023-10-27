@extends('Superadmin.app')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h4 class="content-header-title mb-0">Mastering Data / Brand</h4>
            </div>
        </div>
    </div>
</div>
<!-- Basic table -->
<div class="card">
  <div class="table-responsive text-nowrap">
    <div class="card-header">
      <a href="/admin/brand/create" class="col-12 text-end"><i class="fa fa-plus"></i> Tambah Data</a>
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
        <tr>
          <td class="text-center"><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>001</strong></td>
          <td class="text-center">Hermes</td>
          <td class="text-center">
            <a href="javascript:void(0);" class="btn btn-warning btn-edit"><i class="fa fa-pen"></i></a>
            <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="1"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <tr>
          <td class="text-center"><i class="ti ti-brand-react-native ti-lg text-info me-3"></i> <strong>002</strong></td>
          <td class="text-center">H&M</td>
          <td class="text-center">
            <a href="javascript:void(0);" class="btn btn-warning btn-edit"><i class="fa fa-pen"></i></a>
            <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="2"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <tr>
          <td class="text-center"><i class="ti ti-brand-vue ti-lg text-success me-3"></i> <strong>003</strong></td>
          <td class="text-center">Y&u</td>
          <td class="text-center">
            <a href="javascript:void(0);" class="btn btn-warning btn-edit"><i class="fa fa-pen"></i></a>
            <a href="javascript:void(0);" class="btn btn-danger btn-delete" data-id="3"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
document.addEventListener("click", function (e) {
  if (e.target && e.target.classList.contains("btn-delete")) {
    var itemId = e.target.getAttribute("data-id");
    Swal.fire({
      title: 'Konfirmasi Hapus',
      html: `Apakah Anda yakin ingin menghapus item dengan ID ${itemId}?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      customClass: {
        confirmButton: 'btn btn-danger',
        cancelButton: 'btn btn-secondary ms-1'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        // Lakukan tindakan penghapusan di sini, seperti mengirim permintaan ke server atau menghapus dari data Anda.
        // Anda dapat menambahkan kode di sini untuk menghapus item dengan ID yang sesuai.
      }
    });
  }
});
</script>

@endsection
