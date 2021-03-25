@extends('layouts.admin')

@section('head')
<title>Create Course</title>
<link rel="stylesheet" href="{{asset('assets/css/admin/admin.css')}}">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('course.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('course.create')}}">Create Course</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    <div class="row">
        <div class="col">
            <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <img src="{{asset('assets/images/no-image.png')}}" class="img-fluid image-preview image-thumbnail"
                        style="min-height: 500px" alt="no-image" width="100%">
                </div>
                <div class="form-group my-5">
                    <label for="customFile">Upload Image</label>
                    @error('image')
                    <span class="text-danger text-sm">*{{$message}}</span>
                    @enderror
                    <div class="custom-file">
                        <input type="file" class="custom-file-input input-mint" id="customFile" name="image" required>
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
                <input type="text" class="form-control input-mint" id="nameCourse" name="name" value="{{old('name')}}"
                    required>
            </div>
            <div class="form-group">
                <label for="descriptionCourse">Description</label>
                @error('description')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <textarea class="form-control input-mint" id="descriptionCourse" rows="5" required
                    name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="priceCourse">Price Workshop</label>
                @error('price')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <input type="number" class="form-control input-mint" id="priceCourse" name="price" required
                    value="{{old('price')}}">
            </div>
            <div class="form-group">
                <label>Teacher Name</label>
                <input type="text" class="form-control input-mint" name="teacher" required>
            </div>
            <div class="form-group">
                <label>Quota Event</label>
                <input type="text" class="form-control input-mint" name="quota" required>
            </div>
            <div class="form-group">
                <label>Type Workshop</label>
                <select name="type" class="form-control input-mint type-event" required>
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
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
                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="workshop-box">
                <div class='offline-workshop'>
                    <h6>Event Ke-1</h6>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Event Date</label>
                            <input type="date" class="form-control input-mint" name="event_date[1]">
                        </div>
                        <div class="col form-group">
                            <label>Event Time</label>
                            <input type="time" class="form-control input-mint" name="event_time[1]">
                        </div>
                    </div>
                    <div class="form-group event-offline">
                        <label>Event Location</label>
                        <input type="text" class="form-control input-mint" name="event_location[1]">
                    </div>
                    <div class="form-group event-online" style="display: none">
                        <label>Link Workshop Online</label>
                        <input type="text" class="form-control input-mint" name="event_link[1]">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class='offline-workshop'>
                <h6>Event Ke-2</h6>
                <div class="form-row">
                    <div class="col form-group">
                        <label>Event Date</label>
                        <input type="date" class="form-control input-mint" name="event_date[2]">
                    </div>
                    <div class="col form-group">
                        <label>Event Time</label>
                        <input type="time" class="form-control input-mint" name="event_time[2]">
                    </div>
                </div>
                <div class="form-group event-offline">
                    <label>Event Location</label>
                    <input type="text" class="form-control input-mint" name="event_location[2]">
                </div>
                <div class="form-group event-online" style="display: none">
                    <label>Link Workshop Online</label>
                    <input type="text" class="form-control input-mint" name="event_link[2]">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col my-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
