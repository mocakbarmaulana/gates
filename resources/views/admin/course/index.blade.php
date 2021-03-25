@extends('layouts.admin')

@section('title')
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
    <div class="card">
        <div class="card-header bg-dark">
            <h5>List Course</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Course</th>
                        <th scope="col">Expert</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <th>{{ date_format($course->created_at, 'd/m/Y') }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->teacher->name}}</td>
                        <td>
                            <a href="{{route('course.show', $course->id)}}" class="btn btn-primary btn-sm">Detail</a>
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
