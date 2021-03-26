@extends('layouts.admin')

@section('title')
<title>List Payment</title>
@endsection


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('payment.index')}}">{{$active}}</a></li>
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
            <h5>List Payment</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col">Invoice</th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Bank</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{$payment->name_transfer}}</td>
                        <td>{{$payment->name_bank}}</td>
                        <td class="text-center">${{number_format($payment->amount)}}</td>
                        <td class="text-center">
                            <a href="{{route('payment.edit', $payment->id)}}"
                                class="btn btn-sm btn-outline-success">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        {{$payments->links()}}
    </div>
</div>
@endsection
