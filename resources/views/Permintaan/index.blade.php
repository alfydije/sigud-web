@extends('Superadmin.app')

@section('content')
<div class="">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-10">
                    <h4 class="content-header-title mb-0">Permintaan</h4>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Basic table -->
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card card-statistics px-0">
    <table class="table text-center">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">No Telpon</th>
                <th class="text-center">Barang Dipinjam</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tr>
            <td class="text-center"><i class="ti ti-brand-angular ti-lg text-danger me-3"></i> <strong>001</strong></td>
            <td class="text-center">Alice</td>
            <td class="text-center">2023-10-26</td>
            <td class="text-center">1234567890</td>
            <td class="text-center">
                <a class="btn btn-info btn-view" data-toggle="modal" data-target="#viewModal" data-nama="Alice" data-tanggal="2023-10-26" data-barang="Laptop" href="permintaan/view">
                    <i class="fa fa-eye"></i> View
                </a>
            </td>
            <td class="text-center">
                <a href="javascript:void(0);" class="btn btn-success btn-accept" data-id="1"><i class="fa fa-check"></i> Terima</a>
                <a href="javascript:void(0);" class="btn btn-danger btn-reject" data-id="1"><i class="fa fa-times"></i> Tolak</a>
            </td>
        </tr>
    </table>
        </div>
    </div>
</div>
@endsection
