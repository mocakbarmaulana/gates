@extends('layouts.expert')

@section('title')
<title>Expert | Tambah Course</title>
@endsection

@section('content')
{{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Expert</li>
        <li class="breadcrumb-item active"><a href="{{route('expert.class')}}">{{$active}}</a></li>
</ol>
</nav> --}}
<div class="">
    <div class="row">
        <div class="col">
            <form action="{{route('expert.class.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <img src="{{asset('assets/images/no-image.png')}}" class="img-fluid image-preview"
                        style="min-height: 500px" alt="no-image">
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
                <input type="text" class="form-control" id="nameCourse" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="descriptionCourse">Description</label>
                @error('description')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <textarea class="form-control" id="descriptionCourse" rows="5"
                    name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="priceCourse">Price Workshop</label>
                @error('price')
                <span class="text-danger text-sm">*{{$message}}</span>
                @enderror
                <input type="number" class="form-control" id="priceCourse" name="price" value="{{old('price')}}">
            </div>

            <div class="form-group">
                <label>Type Workshop</label>
                <select name="type" class="form-control">
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                </select>
            </div>

            <div class="workshop-box">
                <div class='offline-workshop'>
                    <h6>Event Ke-1</h6>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Event Date</label>
                            <input type="date" class="form-control" name="event_date[1]">
                        </div>
                        <div class="col form-group">
                            <label>Event Time</label>
                            <input type="time" class="form-control" name="event_time[1]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Event Location</label>
                        <input type="text" class="form-control" name="event_location[1]">
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Link Workshop Online</label>
                            <input type="text" class="form-control" name="event_link[1]">
                        </div>
                        <div class="col form-group">
                            <label>Quota Event</label>
                            <input type="text" class="form-control" name="event_quota[1]">
                        </div>
                    </div>
                </div>
                <div class='offline-workshop'>
                    <h6>Event Ke-2</h6>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Event Date</label>
                            <input type="date" class="form-control" name="event_date[2]">
                        </div>
                        <div class="col form-group">
                            <label>Event Time</label>
                            <input type="time" class="form-control" name="event_time[2]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Event Location</label>
                        <input type="text" class="form-control" name="event_location[2]">
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Link Workshop Online</label>
                            <input type="text" class="form-control" name="event_link[2]">
                        </div>
                        <div class="col form-group">
                            <label>Quota Event</label>
                            <input type="text" class="form-control" name="event_quota[2]">
                        </div>
                    </div>
                </div>
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
                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-right mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
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

</script>
@endsection
