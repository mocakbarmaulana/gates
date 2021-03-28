@extends('layouts.admin')

@section('head')
<title>List Message</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('contact.index')}}">{{$active}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center" style="width: 20px">No.</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <th class="text-center">
                    {{ ($messages ->currentpage()-1) * $messages ->perpage() + $loop->index + 1 }}.
                </th>
                <td>{{$message->name}}</td>
                <td class="text-center">{{$message->email}}</td>
                <td class="text-center">{{date_format($message->created_at, 'd-m-Y')}}</td>
                <td class="text-center">
                    <a href="{{route('contact.show', $message->id)}}" class="btn btn-success btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="card">
        <div class="card-header bg-dark">
            <h5>List Course</h5>
        </div>
        <div class="card-body">
        </div>
    </div> --}}
</div>
@endsection
