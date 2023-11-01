    @extends('Superadmin.app')

    @section('content')

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Permintaan Peminjaman Barang</h5> <small class="text-muted float-end"></small>
        </div>
        <div class="card-body">
            <form>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-id">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-id" value="001" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">NAME</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" value="Alice" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-date">TANGGAL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-date" value="2023-10-26" readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-items">BARANG DIPINJAM</label>
                <div class="col-sm-10">
                    <ol>
                        <li>obeng</li>
                        <li>edc</li>
                        <li>reader</li>
                    </ol>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="button" id="kembaliButton" class="btn btn-primary">Kembali</button>
                </div>
            </div>

            <script>
                document.getElementById("kembaliButton").addEventListener("click", function() {
                    window.location.href = "/admin/permintaan";
                });
            </script>


            </form>
        </div>
        </div>
    </div>

    @endsection