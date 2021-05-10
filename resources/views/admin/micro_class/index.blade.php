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

    @if ($errors->any())
    <div class="alert alert-danger mb-2" role="alert">
        Input yang dimasukan tidak tepat / salah
    </div>
    @endif

    <div class="inner-width">
        <div class="row mb-3 create-micro-class">
            <div class="col text-right">
                <a data-toggle="modal" data-target="#modalCreateMicroClass" class="btn btn-primary">
                    <i class="fas fa-plus-circle mx-2"></i>
                    Create Micro Class
                </a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-left" style="width: 80px">#</th>
                    <th scope="col" class="text-left">Micro Class</th>
                    <th scope="col" class="text-left">Created at</th>
                    <th scope="col" class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="text-left" style="vertical-align: middle;">1</th>
                    <td class="text-left" style="vertical-align: middle;">Panduan Node Js Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit.
                        Repudiandae quidem autem, omnis distinctio corporis tempore assumenda dignissimos aspernatur
                        porro minus.</td>
                    <td class="text-left" style="min-width: 150px; vertical-align: middle;">15/06/2021</td>
                    <td class="text-left" style="width: 250px; vertical-align: middle;">
                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Modal --}}

<!-- Modal -->
<div class=" modal fade" id="modalCreateMicroClass" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Micro Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('micro-class.store')}}" id="formInputMicroClass" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name Micro Class</label>
                        @error('name')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description Micro Class</label>
                        @error('description')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
                        <textarea class="form-control ckeditor" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Choose Skills</label>
                        @error('skill')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
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
                        @error('subskill')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
                        <div class="input-group mb-3">
                            <select name="subskill" class="custom-select" id="inputSubskill">
                                <option selected>Choose...</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        @error('image')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="actionSubmitForm()">Create</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    const fetchSubskill = (id) => {
        return fetch(`http://127.0.0.1:8000/api/subskill/${id}`)
        .then(res => res.json());
    }

    const updateSubskillUI = (subskills) => {
        let content = '';
        subskills.forEach(e => {
            content += `<option value="${e.id}">${e.name}</option>`
        });
        return content;
    }

    document.querySelector("#inputSkill")
        .addEventListener('change', async function(){
            const id = this.value;
            const inputSubskill = document.querySelector('#inputSubskill');
            try {
                const subskills = await fetchSubskill(id);

                const result = updateSubskillUI(subskills);

                inputSubskill.innerHTML = result;

            } catch (error) {
                console.error(error);
            }
        })

    const readUrlImage = (input) => {
        let reader = new FileReader();

        reader.onload = function(e){
        $(".image-preview").attr('src', e.target.result);
        }

        reader.readAsDataURL(input[0].files[0]);
    }

    $("#inputUploadImage").change(function(){
        const name = $(this.files[0])[0].name;
        $(".image-text").text(name);
        readUrlImage($(this));
        $(".image-preview").show();
    });

    const actionSubmitForm = () => document.querySelector("#formInputMicroClass").submit();

</script>
@endsection
