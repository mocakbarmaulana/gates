@extends('layouts.admin')

@section('title')
<title>Edit Skill</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('skill.index')}}">{{$active}}</a>
        </li>
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
                    <h5>Detail Skill</h5>
                </div>
                <div class="card-body">
                    <div>
                        <label>Skill</label>
                        <p>{{$skill->name}}</p>
                    </div>
                    <div>
                        <label>Description</label>
                        <p>{{$skill->description}}</p>
                    </div>
                    <div>
                        <label>Status</label>
                        @if ($skill->status == 1)
                        <p>Aktif <i class="fas fa-check-circle text-success"></i></p>
                        @else
                        <p>Tidak Aktif <i class="fas fa-times-circle text-danger"></i></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col ml-5">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>Edit Skill</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('skill.update', $skill->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @error('skill')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="nameSkill">Skill</label>
                            <input type="text" name="skill" value="{{$skill->name}}" class="form-control"
                                id="nameSkill">
                        </div>
                        @error('description')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{$skill->description}}" class="form-control"
                                id="description">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{($skill->status == 1) ? 'selected' : ''}} value="1">Aktif</option>
                                <option {{($skill->status == 1) ? '' : 'selected'}} value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
