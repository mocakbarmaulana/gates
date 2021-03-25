@extends('layouts.admin')

@section('title')
<title>Edit Teacher</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('teacher.index')}}">{{$active}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>Edit Teacher</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('teacher.update', $teacher->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            @error('name')
                            <br><span class="text-danger">*{{$message}}</span>
                            @enderror
                            <input type="text" name="name" class="form-control" value="{{$teacher->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            @error('email')
                            <br><span class="text-danger">*{{$message}}</span>
                            @enderror
                            <input type="email" name="email" class="form-control" value="{{$teacher->email}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            @error('address')
                            <br><span class="text-danger">*{{$message}}</span>
                            @enderror
                            <textarea name="address" id="address" class="form-control" cols="30"
                                rows="10">{{$teacher->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{($teacher->status == 1) ? 'selected' : ''}}>Aktif</option>
                                <option value="0" {{($teacher->status == 0) ? 'selected' : ''}}>Tidak Aktif
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label> <span class="text-sm font-italic">*kosongkan jika tidak ingin
                                mengganti password*</span>
                            @error('password')
                            <br><span class="text-danger">*{{$message}}</span>
                            @enderror
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="button" class="btn btn-danger btn-sm btn-delete-teacher"
                                data-idskill="{{$teacher->id}}" data-toggle="modal"
                                data-target="#btnDeleteTeacher">Delete</button>
                            <button type="submit" class="btn btn-primary">Update Teacher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>Detail Teacher</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <label>Name :</label><br>
                            {{$teacher->name}}
                        </li>
                        <li class="list-group-item px-0">
                            <label>Email :</label><br>
                            {{$teacher->email}}
                        </li>
                        <li class="list-group-item px-0">
                            <label>Addres :</label><br>
                            {{$teacher->address}}
                        </li>
                        <li class="list-group-item px-0">
                            <label>Status :</label><br>
                            @if ($teacher->status == 1)
                            <span><i class="{{$teacher->getCheckStatus($teacher->status)}}"></i> Aktif</span>
                            @else
                            <span><i class="{{$teacher->getCheckStatus($teacher->status)}}"></i> Tidak Aktif</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="btnDeleteTeacher" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center mt-4">
                <div>
                    <i class="far fa-times-circle fa-4x text-danger mb-3"></i>
                    <p><strong>Apakah anda yakin ingin menghapus item ini?</strong></p>
                </div>
                <div class="mt-5">
                    <form action="" class="form-teacher-delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-secondary mx-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger mx-3">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
$(".btn-delete-teacher").on("click", function(){
const id = $(this)[0].dataset.idskill;
$(".form-teacher-delete").attr('action', `/administrator/teacher/${id}`)
});
@endsection
