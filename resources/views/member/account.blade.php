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
    <form action="{{route('member.update_account', $account->id)}}" method="POST">
        @method('put')
        @csrf
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
