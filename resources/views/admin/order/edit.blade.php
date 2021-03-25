@extends('layouts.admin')

@section('title')
<title>Invoice Order Course</title>
@endsection


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{route('order.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active"><a href="#">Invoice</a></li>
    </ol>
</nav>
<div class="mx-3 p-2 bg-light">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5>Invoice Order</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <strong>Date Order :</strong><br>
                                    <span>{{date_format($order->created_at, 'd-m-Y')}}</span>
                                </li>
                                <li class="mb-3">
                                    <strong>Name Order :</strong><br>
                                    <span>{{$order->student_name}}</span>
                                </li>
                                <li class="mb-3">
                                    <strong>Status :</strong><br>
                                    @if ($order->status == 1)
                                    <span><i class="far fa-check-circle text-success"></i> Dibayar</span>
                                    @else
                                    <span><i class="far fa-times-circle text-danger"></i> Belum Dibayar</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <strong>Invoice :</strong><br>
                                    <span>{{$order->invoice}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <strong>Detail :</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$order->course->name}}</td>
                                        <td class="text-right">IDR.{{number_format($order->subtotal)}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" class="text-right">Total : </th>
                                        <td class="text-right font-weight-bold">$.{{number_format($order->subtotal)}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3 d-flex">
        <div class="col w-50">
            @if ($orderpayment)
            <a href="{{route('payment.edit', $orderpayment)}}" class="btn btn-block btn-warning font-weight-bold">Check
                Payments</a>
            @endif
        </div>
        <div class="col text-right">
            <a href="{{route('course.show', $order->course_id)}}"
                class="btn btn-success font-weight-bold btn-block">Detail
                Course</a>
        </div>
    </div>
</div>
@endsection
