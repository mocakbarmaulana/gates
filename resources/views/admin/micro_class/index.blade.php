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
                <a data-toggle="modal" data-target="#modalMicroClass" class="btn btn-mint" onclick="resetForm()">
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
                    <th scope="col" class="text-left">Created at / d-m-Y</th>
                    <th scope="col" class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($microclasses as $key => $microclass)
                <tr>
                    <th scope="row" class="text-left" style="vertical-align: middle;">{{$loop->iteration}}</th>
                    <td class="text-left" style="vertical-align: middle;">{{$microclass->name}}</td>
                    <td class="text-left" style="width: 200px; vertical-align: middle;">
                        {{date('d-m-Y', strtotime($microclass->created_at))}}
                    </td>
                    <td class="text-left" style="width: 250px; vertical-align: middle;">
                        <a data-toggle="modal" data-target="#modalMicroClass"
                            onclick="actionEditMicroClass({{$microclass}})" class="btn btn-blue-old btn-sm">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        <a href="{{route('micro-class.show', $microclass->id)}}" class="btn btn-sm btn-mint">
                            <i class="fas fa-info-circle"></i>
                            Detail
                        </a>
                        <a onclick="actionDeleteMicroClass(this)" data-toggle="modal"
                            data-target="#modalDeleteMicroClass" data-idmicroclass="{{$microclass->id}}"
                            id="btnDeleteMicroClass" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                            Delete
                        </a>
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="4">tidak ada micro class</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal --}}

<!-- Modal add Form -->
<div class=" modal fade" id="modalMicroClass" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                        <input type="text" class="form-control input-mint name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description Micro Class</label>
                        @error('description')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
                        <textarea class="form-control input-mint description ckeditor" id="description"
                            name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link Typeform</label>
                        @error('link')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
                        <input type="text" name="link" class="form-control input-mint" id="link">
                    </div>
                    <div class="form-group">
                        <label>Choose Skills</label>
                        @error('skill')
                        <small class="text-danger">*{{$message}}</small>
                        @enderror
                        <div class="input-group mb-3">
                            <select name="skill" class="custom-select input-mint" id="inputSkill">
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
                            <select name="subskill" class="custom-select input-mint" id="inputSubskill">
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
                                <label class="custom-file-label image-text input-mint" for="inputUploadImage"
                                    aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
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
                <button type="button" id="btnSubmit" class="btn btn-primary"
                    onclick="actionSubmitForm()">Create</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Delete Form --}}
<div class="modal fade" id="modalDeleteMicroClass" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center mt-4">
                <div>
                    <i class="far fa-times-circle fa-4x text-danger mb-3"></i>
                    <p><strong>Apakah anda yakin ingin menghapus item ini?</strong></p>
                </div>
                <div class="mt-5">
                    <form action="" class="form-microclass-delete" method="post">
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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    // dom element
    const modalTitle = document.querySelector(".modal-title");
    const formInputMicroClass = document.querySelector("#formInputMicroClass");
    const nameMicroClass = document.querySelector(".name");
    const descriptionMicroClass = document.querySelector(".description");
    const linkTypeForm = document.querySelector("#link");
    const inputSkill =  document.querySelector("#inputSkill");
    const inputSubskill =  document.querySelector("#inputSubskill");
    const subskillContainer =  document.querySelector(".subskill-box");
    const imagePreview = document.querySelector(".image-preview");


    // Function fetching subskill
    const fetchSubskill = (id) => {
        return fetch(`http://127.0.0.1:8000/api/subskill/${id}`)
        .then(res => res.json());
    }

    // Function update list subskill
    const updateSubskillUI = (subskills, value) => {
        let content = '';
        subskills.forEach(e => {
            content += `<option value="${e.id}" ${(e.id == value) ? 'selected' : ''} >${e.name}</option>`
        });
        return content;
    }

    // event listener ketika skill berubah inputanya.
    inputSkill.addEventListener('change', async function(){
        try {
            await loadSubskill(this.value, '');
            subskillContainer.style.display = 'block';

        } catch (error) {
            console.error(error);
        }
    })

    // Function ketika tombol button submit di klik.
    const actionSubmitForm = () => document.querySelector("#formInputMicroClass").submit();

    // function update form delete
    const actionDeleteMicroClass = (e) =>{
        // console.log(e.dataset.idmicroclass);
        const id = e.dataset.idmicroclass;

        document.querySelector(".form-microclass-delete")
            .setAttribute('action', `/administrator/micro-class/${id}`);

    }

    // Function modal form edit.
    const actionEditMicroClass = async (microclass) => await updateEditFormUi(microclass);

    // Function reset form
    const resetForm = () => {
        CKEDITOR.instances['description'].setData('');
        document.querySelector("#formInputMicroClass").reset();
        subskillContainer.style.display = 'none';
        imagePreview.style.display = 'none';
        document.querySelector("#btnSubmit").textContent = 'Create';
        modalTitle.textContent = "Create Micro Class";
    };

    // Function load subskill form edit.
    const loadSubskill = async (skill , subskill) => {
        try {
            const subskills = await fetchSubskill(skill);

            const result = await updateSubskillUI(subskills, subskill);

            inputSubskill.innerHTML = result;

        } catch (err) {
            console.error(err);
        }
    }

    const updateEditFormUi = async ( microclass ) => {
        const {id, description, name, image, skill_id, subskill_id, link } = microclass;
        const base_url = window.location.origin;
        const options = inputSkill.options;

        modalTitle.textContent = "Edit Micro Class";
        nameMicroClass.value = name;
        CKEDITOR.instances['description'].setData(description);
        linkTypeForm.value = link;

        for (let index = 0; index < options.length; index++) {
            options[index].selected = false;
            if( skill_id == options[index].value )
            options[index].selected = true;
        }

        await loadSubskill(skill_id ,subskill_id);
        subskillContainer.style.display = 'blok';

        imagePreview.src = `${base_url}/storage/assets/images/micro-class/${image}`;
        imagePreview.style.display = "block";

        // const input = "<option type='hidden' name='method_field' value='put'></option>"
        var input = document.createElement("input");
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', '_method');
        input.setAttribute('value', 'put');

        formInputMicroClass.insertBefore(input, formInputMicroClass.firstChild);

        formInputMicroClass.setAttribute('action', `/administrator/micro-class/${id}`);

        document.querySelector("#btnSubmit").textContent = 'Update';
    }

    // Function image
    const readUrlImage = (input) => {
        let reader = new FileReader();

        reader.onload = function(e){
        $(".image-preview").attr('src', e.target.result);
        }

        reader.readAsDataURL(input[0].files[0]);
    }

    // Function update image ketika imgae di upload.
    $("#inputUploadImage").change(function(){
        const name = $(this.files[0])[0].name;
        $(".image-text").text(name);
        readUrlImage($(this));
        $(".image-preview").show();
    });

</script>
@endsection
