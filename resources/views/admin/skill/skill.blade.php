@extends('layouts.admin')

@section('title')
<title>List Skill</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('skill.index')}}">{{$active}}</a></li>
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
                    <h5>Tambah List</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('skill.store')}}" method="POST">
                        @csrf
                        @error('skill')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="nameSkill">Skill</label>
                            <input type="text" name="skill" value="{{old('skill')}}" class="form-control"
                                id="nameSkill">
                        </div>
                        @error('description')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{old('description')}}" class="form-control"
                                id="description">
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col ml-5">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>List Skill</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Skill</th>
                                {{-- <th scope="col" class="text-center">Dibuat</th> --}}
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <th scope="row">
                                    {{($skills->currentPage() - 1) * $skills->perPage() + $loop->iteration}}.</th>
                                <td>{{$skill->name}}</td>
                                <td class="text-center">
                                    <a href="{{route('skill.edit', $skill->id)}}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-secondary btn-sm btn-delete-skill"
                                        data-idskill="{{$skill->id}}" data-toggle="modal"
                                        data-target="#btnDeleteSkill">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4">
                    {{$skills->links()}}
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="btnDeleteSkill" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title">Hapus Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('js')
$(".btn-delete-skill").on("click", function(){
const id = $(this)[0].dataset.idskill;
$(".form-skill-delete").attr('action', `/administrator/skill/${id}`)
});
@endsection
