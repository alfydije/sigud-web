@extends('Operator.app', ['title' => 'Gudang Penyimpanan | Edit Profile'])
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h3 class="content-header-title float-start mb-0">Edit Profile</h3>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('storages/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Basic table -->
    <section id="receipt-item-sect">
        @if($message = Session::get('success'))
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success" role="alert">
                    <div class="alert-body"><i class="fa fa-check-circle"></i> {{ $message }}</div>
                </div>
            </div>
        </div>
        @elseif($message = Session::get('error'))
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger" role="alert">
                    <div class="alert-body"><i class="fa fa-exclamation-triangle"></i> {!! $message !!}</div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('storages.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Username :</label>
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan username..." value="{{ $user->username ?? old('username') }}"/>
                                </div>
                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Role :</label>
                                <div class="input-group">
                                    <input type="text" name="role" class="form-control" readonly value="{{ $user->role ?? old('role') }}"/>
                                </div>
                                @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Password Baru :</label>
                                <div class="input-group form-password-toggle">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password baru..."  value="{{ old('password') }}"/>
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Konfirmasi Password Baru :</label>
                                <div class="input-group form-password-toggle">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password baru..." value="{{ old('password_confirmation') }}"/>
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Foto :</label>
                                <div class="input-group">
                                    <input type="file" name="photo" class="form-control"/>
                                </div>
                                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                                @if($user->photo)
                                    <div class="d-block mt-2">
                                        <img src="{{ !empty($user) ? Storage::url('public/profiles/'.$user->photo) : '' }}" class="border" width="200" alt="">
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Basic table -->
</div>
@endsection
