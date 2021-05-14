@extends('layouts.admin')

@section('head')
<title>Edit Course | {{$course->name}}</title>
<link rel="stylesheet" href="{{asset('assets/css/admin/admin.css')}}">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('course.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a href="#">{{$course->name}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    @if (session('success'))
    <div class="alert alert-success mb-2" role="alert">
        {{session('success')}}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger mb-2" role="alert">
        {{session('error')}}
    </div>
    @endif
    <div class="row">
        <div class="col">
            <form action="{{route('course.update', $course->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="text-center">
                    <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}"
                        class="img-fluid image-preview image-thumbnail" style="min-height: 500px" alt="no-image"
                        width="100%">
                </div>
                <div class="form-group mt-5">
                    <label for="customFile">Upload Image</label>
                    @error('image')
                    <span class="text-danger text-sm">*{{$message}}</span>
                    @enderror
                    <div class="custom-file">
                        <input type="file" class="custom-file-input input-mint" id="customFile" name="image">
                        <label class="custom-file-label image-text" for="customFile">Choose file</label>
                    </div>
                </div>

                <div class="container-workshop">
                    @foreach ($course->course_details as $courseDetail)
                    <div class='offline-workshop col'>
                        <h6>Event Ke-{{$loop->iteration}}</h6>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Event Date</label>
                                <input type="date" class="form-control input-mint" name="event_date[{{$loop->index}}]"
                                    value="{{$courseDetail->event_date}}">
                            </div>
                            <div class="col form-group">
                                <label>Event Time</label>
                                <input type="time" class="form-control input-mint" name="event_time[{{$loop->index}}]"
                                    value="{{$courseDetail->event_time}}">
                            </div>
                        </div>
                        <div class="form-group event-offline">
                            <label>Event Location</label>
                            <input type="text" class="form-control input-mint" name="event_location[{{$loop->index}}]"
                                value="{{$courseDetail->event_location}}">
                        </div>
                        <div class="form-row event-online">
                            <div class="col form-group">
                                <label>Link Workshop Online</label>
                                <input type="text" class="form-control input-mint" name="event_link[{{$loop->index}}]"
                                    value="{{$courseDetail->link}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
        {{-- <div class="col-1"></div> --}}
        <div class="col ml-3">
            <div class="form-group">
                <label for="nameCourse">Name Workshop</label>
                @error('name')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <input type="text" class="form-control input-mint" id="nameCourse" name="name" value="{{$course->name}}"
                    required>
            </div>
            <div class="form-group">
                <label for="descriptionCourse">Description</label>
                @error('description')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <textarea class="form-control input-mint ckeditor" id="descriptionCourse" rows="5" required
                    name="description">{{$course->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="priceCourse">Price Workshop</label>
                @error('price')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <input type="number" class="form-control input-mint" id="priceCourse" name="price" required
                    value="{{$course->price}}">
            </div>
            <div class="form-group">
                <label>Teacher Name</label>
                <input type="text" class="form-control input-mint" name="teacher" value="{{$course->teacher}}" required>
            </div>
            <div class="form-group">
                <label>Quota Event</label>
                <input type="text" class="form-control input-mint" name="quota"
                    value="{{$course->course_details[0]->quota}}" required>
            </div>
            <div class="form-group">
                <label>Type Workshop</label>
                <select name="type" class="form-control input-mint type-event" required>
                    <option value="online" @if($course->event == 'online') selected @endif>Online</option>
                    <option value="offline" @if($course->event == 'offline') selected @endif>Offline</option>
                </select>
            </div>

            <div class="form-group">
                <label for="achivementSkillCourse">Achivement Skill Workshop</label>
                @error('skill')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="skillInput">Options</label>
                    </div>
                    <select class="custom-select input-mint" id="skillInput" name="skill" required>
                        <option selected>Choose...</option>
                        @foreach ($skills as $skill)
                        <option value="{{$skill->id}}" @if($course->skill_id == $skill->id) selected
                            @endif>{{$skill->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group subskill-box">
                <label>Subskill</label>
                <div class="input-group mb-5">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Options</label>
                    </div>
                    <select class="custom-select input-mint" id="subskill" data-id="{{$course->subskill_id}}"
                        name="subskill" required>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col">
            <button type="button" class="btn btn-danger btn-block" id="deleteCourse" data-idcourse="{{$course->id}}"
                data-toggle="modal" data-target="#modalDeleteCourse">Delete Course</button>
        </div>
        <div class="col ">
            <button type="submit" class="btn btn-primary btn-block">Update Course</button>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDeleteCourse" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center mt-4">
                <div>
                    <i class="far fa-times-circle fa-4x text-danger mb-3"></i>
                    <p><strong>Apakah anda yakin ingin menghapus item ini?</strong></p>
                </div>
                <div class="mt-5">
                    <form action="" class="form-course-delete" method="post">
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
    $("#customFile").change(function(){
        const name = $(this.files[0])[0].name;
        $(".image-text").text(name);
        readUrlImage($(this));
});

if($('.type-event').val() == 'online'){
    $('.event-offline').css('display', 'none');
} else {
    $('.event-online').css('display', 'none');
}


function readUrlImage(input){
    let reader = new FileReader();

    console.log(reader);

    reader.onload = function(e){
    $(".image-preview").attr('src', e.target.result);
    }

    reader.readAsDataURL(input[0].files[0]);
}

$(".type-event").on('change', function(){
    const val = $(this).val();
    if(val == 'online'){
        $('.event-online').css('display', 'block');
        $('.event-offline').css('display', 'none');
    } else {
        $('.event-online').css('display', 'none');
        $('.event-offline').css('display', 'block');
    }
})

$("#skillInput").on('change', async function() {
    const id = this.value;
    const subskillList = document.querySelector('#subskill');
    try {
        const subskill = await fetchSubskill(id);

        const result = updateSubskill(subskill);

        subskillList.innerHTML = result;

        $('.subskill-box').show();

    } catch (error) {
        console.error(error);
    }
})

const fetchSubskill = (id) => {
   return fetch(`http://127.0.0.1:8000/api/subskill/${id}`)
    .then(res => res.json());
}

const updateSubskill = (subskills) => {
    const id = document.querySelector("#subskill").dataset.id;
    let content = '';
    subskills.forEach(e => {
        content += `<option value="${e.id}" ${(id == e.id) ? 'selected' : ''}>${e.name}</option>`
    });
    return content;
}

async function loadSubskill(){
    try {
        const id = document.querySelector('#skillInput')
        const subskillBox = document.querySelector("#subskill");
        const res = await fetchSubskill(id.value);

        subskillBox.innerHTML = updateSubskill(res);

    } catch (error) {
        console.error(error);
    }
}

loadSubskill();

// Js For Form delete course
document.querySelector("#deleteCourse").addEventListener('click', function(){
    const id = this.dataset.idcourse;
    // console.log(id);

    document.querySelector(".form-course-delete")
        .setAttribute('action', `/administrator/course/${id}`)
});

</script>
@endsection
