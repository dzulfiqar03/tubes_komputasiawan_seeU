@extends('layouts.app')


@section('content')
    <div class="text-center">
        <div class="d-flex">


            <div class="col rightContent bg-white vh-100">
                <div class="container mt-4">
                    <div class="row mb-0">

                        <div class="col-lg-3 col-xl-6">
                            <ul class="list-inline mb-0 float-start">
                                <li class="list-inline-item">
                                    <a href="{{ route('admin.exportExcel') }}" class="btn btn-outline-success">
                                        <i class="bi bi-download me-1"></i> to Excel
                                    </a>
                                </li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">
                                    <a href="{{ route('admin.exportPdf') }}" class="btn btn-outline-danger">
                                        <i class="bi bi-download me-1"></i> to PDF
                                    </a>
                                </li>


                            </ul>


                        </div>
                    </div>

                    <hr>
                    <div class="table-responsive border p-3 rounded-3">
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="umkmTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>No.</th>
                                    <th>UMKM</th>
                                    <th>Description</th>
                                    <th>Email</th>
                                    <th>Telephone Number</th>
                                    <th>Kategori</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($umkm as $umkms)
                                    <tr>
                                        <td>{{ $umkms->id }}</td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $umkms->umkm }}</td>
                                        <td>{{ $umkms->description }}</td>
                                        <td>{{ $umkms->email }}</td>
                                        <td>{{ $umkms->telp_number }}</td>
                                        <td>{{ $umkms->category->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editData{{ $umkms->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('umkm.destroy', $umkms->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>



    @foreach ($umkm as $dataUmkm)
        <div class="d-grid gap-2 text-start">
            <div class="modal fade" id="editData{{ $dataUmkm->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="p-3">

                            <form action="{{ route('admin.update', ['admin' => $dataUmkm->id]) }}" method="POST"
                                enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="w-100 justify-content-center">
                                    <div class="bg-light rounded-3">
                                        <div class="p-3">
                                            <div class="mb-3 text-center">
                                                <i class="bi-person-circle fs-1"></i>
                                                <h4>Edit admin</h4>
                                            </div>
                                            <hr>
                                            <div class="col-md-6 mb-3 w-100">
                                                <label for="umkm" class="form-label">First Name</label>
                                                <input
                                                    class="form-control
                                @error('umkm') is-invalid @enderror"
                                                    type="text" name="umkm" id="umkm"
                                                    value="{{ $errors->any() ? old('umkm') : $dataUmkm->umkm }}"
                                                    placeholder="Enter UMKM">
                                                @error('umkm')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 w-100">
                                                <label for="description" class="form-label">Description</label>
                                                <input
                                                    class="form-control @error('description')
                                is-invalid @enderror"
                                                    type="text" name="description" id="description"
                                                    value="{{ $errors->any() ? old('description') : $dataUmkm->description }}"
                                                    placeholder="Enter Description">
                                                @error('description')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 w-100">
                                                <label for="email" class="form-label">Email</label>
                                                <input
                                                    class="form-control @error('email')
                                is-invalid @enderror"
                                                    type="text" name="email" id="email"
                                                    value="{{ $errors->any() ? old('email') : $dataUmkm->email }}"
                                                    placeholder="Enter Email">
                                                @error('email')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 w-100">
                                                <label for="address" class="form-label">Address</label>
                                                <input class="form-control @error('address') is-invalid @enderror"
                                                    type="text" name="address" id="address"
                                                    value="{{ $errors->any() ? old('address') : $dataUmkm->address }}"
                                                    placeholder="Enter address">
                                                @error('address')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 w-100">
                                                <label for="telNum" class="form-label">Age</label>
                                                <input class="form-control @error('telNum') is-invalid @enderror"
                                                    type="text" name="telNum" id="telNum"
                                                    value="{{ $errors->any() ? old('telNum') : $dataUmkm->telephone_number }}"
                                                    placeholder="Enter Telephone Number">
                                                @error('telNum')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3 w-100">
                                                <label for="category" class="form-label">category</label>
                                                <select name="category" id="category" class="form-select">
                                                    @php
                                                        $selected = '';
                                                        if ($errors->any()) {
                                                            $selected = old('category');
                                                        } else {
                                                            $selected = $dataUmkm->category_id;
                                                        }
                                                    @endphp
                                                    <option value="{{ $dataUmkm->category->id }}"
                                                        {{ $selected == $dataUmkm->category->id ? 'selected' : '' }}>
                                                        {{ $dataUmkm->category->id .
                                                            ' -
                                                                                                                                                                                                                                                                                                                                                                                ' .
                                                            $dataUmkm->category->name }}
                                                    </option>
                                                </select>
                                                @error('category')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="Files" class="form-label">Surat Izin Mendirikan
                                                    Usaha</label>
                                                @if ($dataUmkm->original_filesname)
                                                    <h5>{{ $dataUmkm->original_filesname }}</h5>
                                                    <a href="{{ route('admin.downloadFile', ['umkmId' => $dataUmkm->id]) }}"
                                                        class="btn btn-primary btn-sm mt-2">
                                                        <i class="bi bi-download me-1"></i> Download Surat Izin
                                                        Mendirikan Usaha
                                                    </a>
                                                @else
                                                    <h5>Tidak ada</h5>
                                                @endif
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="usahaDoc" class="form-label">Surat Izin Mendirikan
                                                    Usaha</label>
                                                <input type="file" class="form-control" name="usahaDoc"
                                                    id="usahaDoc">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="Files" class="form-label">Profil Usaha</label>
                                                @if ($dataUmkm->original_photoname)
                                                    <h5>{{ $dataUmkm->original_photoname }}</h5>
                                                    <a href="{{ route('admin.downloadFile', ['umkmId' => $dataUmkm->id]) }}"
                                                        class="btn btn-primary btn-sm mt-2">
                                                        <i class="bi bi-download me-1"></i> Download Foto Profil Usaha
                                                    </a>
                                                @else
                                                    <h5>Tidak ada</h5>
                                                @endif
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="imgPhoto" class="form-label">Foto Profil Usaha</label>
                                                <input type="file" class="form-control" name="imgPhoto"
                                                    id="imgPhoto">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 d-grid">
                                                <a href="{{ route('dataUmkm') }}"
                                                    class="btn btn-outline-dark btn-lg mt-3"><i
                                                        class="bi-arrow-left-circle
                                me-2"></i>
                                                    Cancel</a>
                                            </div>
                                            <div class="col-md-6 d-grid">
                                                <button type="submit"
                                                    class="btn btn-dark
                                btn-lg mt-3"><i
                                                        class="bi-check-circle me-2"></i> Edit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    @endforeach

    <script>
        var btnTgl1 = document.getElementById('btnTgl1');
        var btnTgl2 = document.getElementById('btnTgl2');
        var leftContent = document.getElementById('leftContent');
        var backToogle = document.getElementById('backToogle');



        btnTgl1.addEventListener("click", function() {
            leftContent.style.display = "grid";
            btnTgl1.style.transform = "scale(0)";
            backToogle.style.transform = "scale(1)";
            backToogle.style.category = "static";
            btnTgl1.style.category = "absolute";
        });

        backToogle.addEventListener("click", function() {
            leftContent.style.display = "none";
            btnTgl1.style.transform = "scale(1)";
            backToogle.style.transform = "scale(0)";
        });
    </script>
    @stack('scripts')




    @vite('resources/js/app.js')
@endsection
