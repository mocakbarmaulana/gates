@extends('layouts.expert')

@section('head')
<title>Expert | Edit Course</title>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif

<form action="{{route('expert.class.update', $course->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="text-center">
                <img src="{{asset('storage/assets/images/course/'.$course->image_course)}}"
                    class="img-fluid image-preview" style="min-height: 500px" alt="no-image">
            </div>
            <div class="form-group my-4">
                <label for="customFile">Uplod Image</label>
                @error('image')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label image-text" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col">
            <div class="form-group">
                <label for="nameCourse">Name Workshop</label>
                @error('name')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="nameCourse" name="name" value="{{$course->name}}">
            </div>
            <div class="form-group">
                <label for="descriptionCourse">Description</label>
                @error('description')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <textarea class="form-control" id="descriptionCourse" rows="5"
                    name="description">{{$course->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="priceCourse">Price Workshop</label>
                @error('price')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <input type="number" class="form-control" id="priceCourse" name="price" value="{{$course->price}}">
            </div>

            <div class="form-group">
                <label>Type Workshop</label>
                <select name="type" class="form-control">
                    <option value="online" @if ($course->event == 'online') selected @endif>Online</option>
                    <option value="offline" @if ($course->event == 'offline') selected @endif >Offline</option>
                </select>
            </div>


            <div class="workshop-box">

            </div>

            <div class="form-group">
                <label for="achivementSkillCourse">Achivement Skill Workshop</label>
                @error('skill')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="skill">
                        <option selected>Choose...</option>
                        @foreach ($skills as $skill)
                        <option value="{{$skill->id}}" @if ($course->skill_id == $skill->id) selected
                            @endif>{{$skill->name}}
                        </option>
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
                    <input type="date" class="form-control" name="event_date[{{$loop->index}}]"
                        value="{{$courseDetail->event_date}}">
                </div>
                <div class="col form-group">
                    <label>Event Time</label>
                    <input type="time" class="form-control" name="event_time[{{$loop->index}}]"
                        value="{{$courseDetail->event_time}}">
                </div>
            </div>
            <div class="form-group">
                <label>Event Location</label>
                <input type="text" class="form-control" name="event_location[{{$loop->index}}]"
                    value="{{$courseDetail->event_location}}">
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Link Workshop Online</label>
                    <input type="text" class="form-control" name="event_link[{{$loop->index}}]"
                        value="{{$courseDetail->link}}">
                </div>
                <div class="col form-group">
                    <label>Quota Event</label>
                    <input type="text" class="form-control" name="event_quota[{{$loop->index}}]"
                        value="{{$courseDetail->quota}}">
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-6"></div>
        <div class="col-6 text-right mt-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
</form>
@endsection

@section('js')
<script>
    $("#customFile").change(function(){
    const name = $(this.files[0])[0].name;
    $(".image-text").text(name);
    readUrlImage($(this));
});


function readUrlImage(input){
    let reader = new FileReader();

    console.log(reader);

    reader.onload = function(e){
    $(".image-preview").attr('src', e.target.result);
    }

    reader.readAsDataURL(input[0].files[0]);
}

</script>
@endsection
