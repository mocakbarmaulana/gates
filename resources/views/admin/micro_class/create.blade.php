@extends('layouts.admin')

@section('head')
<title>Micro Class</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('course.index')}}">{{$active}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    @if (session('success'))
    <div class="alert alert-success mb-2" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="inner-width">
        <div class="row">
            <div class="col-6">
                <form action="{{route('micro-class.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name Micro Class</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description Micro Class</label>
                        <textarea class="form-control ckeditor" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Choose Skills</label>
                        <div class="input-group mb-3">
                            <select name="skill" class="custom-select" id="inputSkill">
                                <option selected>Choose...</option>
                                @foreach ($skills as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group subskill-box">
                        <label>Choose Subskills</label>
                        <div class="input-group mb-3">
                            <select name="subkill" class="custom-select" id="inputSubskill">
                                <option selected>Choose...</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="inputUploadImage">
                                <label class="custom-file-label image-text" for="inputUploadImage"
                                    aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
                            {{-- <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                    </div> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{asset('assets/images/no-image.png')}}"
                                class="img-fluid image-preview image-thumbnail"
                                style="min-height: 250px; display: none;" alt="no-image" width="100%">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Understood</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
