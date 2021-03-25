@extends('layouts.admin')

@section('title')
<title>List Order Course</title>
@endsection


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('order.index')}}">{{$active}}</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    <div class="search">
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="q" class="form-control" placeholder="Search Name Order">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header bg-dark">
            <h5>List Order</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col">Invoice</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->student_name}}</td>
                        <td>{{$order->course->name}}</td>
                        <td class="text-center">
                            @if ($order->status == 1)
                            <span><i class="far fa-check-circle text-success"></i> Dibayar</span>
                            @else
                            <span><i class="far fa-times-circle text-danger"></i> Belum Dibayar</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('order.edit', $order->id)}}"
                                class="btn btn-sm btn-outline-success">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        {{$orders->links()}}
    </div>
</div>
@endsection
