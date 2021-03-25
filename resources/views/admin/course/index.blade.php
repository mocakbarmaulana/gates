@extends('layouts.admin')

@section('head')
<title>List Course</title>
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
    <div class="row mb-3">
        <div class="col text-right">
            <a href="{{route('course.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mx-2"></i>Create
                Course</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-dark">
            <h5>List Course</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-letf">Course</th>
                        <th scope="col" class="text-center">Teahcer</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td class="text-letf">{{ $course->name }}</td>
                        <td class="text-center">{{ $course->teacher}}</td>
                        <td class="text-center">
                            <a href="{{route('course.show', $course->id)}}" class="btn btn-success btn-sm">Detail</a>
                            <a href="{{route('course.edit', $course->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
