@extends('layouts.admin')

@section('title')
<title>List Learner</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('learner.index')}}">{{$active}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="search">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        {{-- @csrf --}}
                        <input type="text" name="q" class="form-control" placeholder="Search Name">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>List Learner</h5>
                </div>
                <div class="card-body">

                    @if (empty($students->total()))
                    <div class="text-center">Tidak ditemukan</div>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>
                                    {{-- <i class="{{$teacher->getCheckStatus($teacher->status)}}"></i> ---}}
                                    {{$student->getCutNameAttribute($student->name)}}
                                </td>
                                <td class="text-center">{{$student->email}}</td>
                                <td class="text-center"><a href="{{route('learner.edit', $student->id)}}"
                                        class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-2">
                        {{$students->links()}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>Tambah Learner</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('learner.store')}}" method="POST">
                        @csrf
                        @error('name')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="name" value="{{old('name')}}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Full Name">
                        </div>
                        @error('email')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <input type="email" name="email" value="{{old('email')}}"
                                class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email">
                        </div>
                        @error('phone_number')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <input type="number" name="phone_number" value="{{old('phone_number')}}"
                                class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                placeholder="Phone Number">
                        </div>
                        @error('address')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <textarea name="address"
                                class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" rows="5"
                                placeholder="Address">{{old('address')}}</textarea>
                        </div>
                        @error('password')
                        <span class="text-danger">*{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password"
                                class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Retype Password">
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
