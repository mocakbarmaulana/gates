@extends('layouts.member')

@section('head')
<title>Account</title>
<link rel="stylesheet" href="{{asset('assets/css/member/member.css')}}">
@endsection

@section('content')
<div class="p-4">
    @if (session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
    <form action="{{route('member.update_account', $account->id)}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-12 text-center mb-3">
                <img src="{{asset($account->getUserImage($account->image))}}" class="image-icon rounded-circle"
                    alt="image-profile" width="120px" height="120px">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col text-right">
                        <input type="hidden" name="image_delete" class="image-delete" value="">
                        <button type="button" class="btn btn-outline-mint btn-sm btn-delete">Delete</button>
                    </div>
                    <div class="col">
                        <input type="file" name="image" id="imageProfile" style="display: none">
                        <button type="button" class="btn btn-mint btn-sm btn-change">Change</button>
                    </div>
                </div>
                <div class="text-center">
                    @error('image')
                    <small class="text-danger">*{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Full Name</label><small class="text-danger">@error('name') *{{$message}} @enderror</small>
            <input type="text" name="name" class="form-control input-mint @error('name') is-invalid @enderror"
                value="{{$account->name}}">
        </div>
        <div class="row">
            <div class="col form-group">
                <label>Email</label><small class="text-danger">@error('email') *{{$message}} @enderror</small>
                <input type="email" name="email" class="form-control input-mint @error('email') is-invalid @enderror"
                    value="{{$account->email}}">
            </div>
            <div class="col form-group">
                <label>Phone Number</label><small class="text-danger">@error('phone_number') *{{$message}}
                    @enderror</small>
                <input type="number" name="phone_number"
                    class="form-control input-mint @error('phone_number') is-invalid @enderror"
                    value="{{$account->phone_number}}">
            </div>
        </div>
        <div class="form-group">
            <label>Address</label><small class="text-danger">@error('address') *{{$message}} @enderror</small>
            <textarea name="address" class="form-control input-mint @error('address') is-invalid @enderror"
                rows="10">{{$account->address}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-mint">Update Account</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(".btn-change").on('click', function(){
        $("#imageProfile").click();
    });

    $("#imageProfile").change(function(){
        readUrlImage($(this));
    });

    $(".btn-delete").on('click', function(){
        $(".image-delete").val("true");
        $(".image-icon").attr('src', `${window.location.origin}/assets/images/profile.png`);
    })




function readUrlImage(input){
    let reader = new FileReader();

    reader.onload = function(e){
    $(".image-icon").attr('src', e.target.result);
    }

    reader.readAsDataURL(input[0].files[0]);
}
</script>
@endsection
