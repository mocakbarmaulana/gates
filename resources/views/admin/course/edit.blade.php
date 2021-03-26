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
                @method('PUT')
                @csrf
                <div class="text-center">
                    <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}"
                        class="img-fluid image-preview image-thumbnail" style="min-height: 500px" alt="no-image"
                        width="100%">
                </div>
                <div class="form-group my-5">
                    <label for="customFile">Upload Image</label>
                    @error('image')
                    <span class="text-danger text-sm">*{{$message}}</span>
                    @enderror
                    <div class="custom-file">
                        <input type="file" class="custom-file-input input-mint" id="customFile" name="image">
                        <label class="custom-file-label image-text" for="customFile">Choose file</label>
                    </div>
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
                <textarea class="form-control input-mint" id="descriptionCourse" rows="5" required
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
        </div>
    </div>

    <div class="row">
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

    <div class="row my-4">
        <div class="col">
            <form action="{{route('course.destroy', $course->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Delete Course</button>
            </form>
        </div>
        <div class="col ">
            <button type="submit" class="btn btn-primary btn-block">Update Course</button>
        </div>
    </div>
    </form>
</div>
@endsection

@section('js')
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

</script>
@endsection
