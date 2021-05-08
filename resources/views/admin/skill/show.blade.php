@extends('layouts.admin')

@section('head')
<title>List Subskill</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('skill.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a>subskill</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>Tambah Subkill</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('subskill.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="skill_id" value="{{$skill->id}}">
                        @error('name')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="nameSubskill">Name Subkill</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                id="nameSubskill">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col ml-5">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>{{$skill->name}}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 20px">No.</th>
                                <th scope="col">Subskill</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subskills as $item)
                            <tr>
                                <th scope="row">
                                    {{($subskills->currentPage() - 1) * $subskills->perPage() + $loop->iteration}}.</th>
                                <td>{{$item->name}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm btn-edit-subskill"
                                        data-idsubkill="{{$item->id}}" data-toggle="modal"
                                        data-target="#btnEditSubskill">Edit</button>
                                    <button type="button" class="btn btn-secondary btn-sm btn-delete-skill"
                                        data-idsubkill="{{$item->id}}" data-toggle="modal"
                                        data-target="#btnDeleteSubskill">Delete</button>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-4">
                    {{$subskills->links()}}
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="btnDeleteSubskill" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center mt-4">
                <div>
                    <i class="far fa-times-circle fa-4x text-danger mb-3"></i>
                    <p><strong>Apakah anda yakin ingin menghapus item ini?</strong></p>
                </div>
                <div class="mt-5">
                    <form action="" class="form-skill-delete" method="post">
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


<!-- Modal Edit -->
<div class="modal fade" id="btnEditSubskill" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <form action="" class="form-skill-delete" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name subskill</label>
                            <input type="text" name="subskills" class="form-control">
                            @error('subskills')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-outline-secondary mx-3"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Update Subskill</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(".btn-delete-skill").on("click", function(){
        const id = $(this)[0].dataset.idsubkill;
        $(".form-skill-delete").attr('action', `/administrator/subskill/${id}`)
    });
    $(".btn-edit-subskill").on("click", function(){
        const id = $(this)[0].dataset.idsubkill;
        $(".form-skill-delete").attr('action', `/administrator/subskill/${id}`)
    });
</script>
@endsection
