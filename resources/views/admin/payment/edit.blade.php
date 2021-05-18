@extends('layouts.admin')

@section('title')
<title>Detail Payment</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{route('payment.index')}}">{{$active}}</a></li>
        <li class="breadcrumb-item active">Detail Payment</li>
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
            <div class="card">
                <div class="card-header bg-blue-old">
                    <h5>Detail Payment</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <ul class="list-unstyled">
                                <li class="mb-3 font-weight-bold">Name Transfer </li>
                                <li class="mb-3 font-weight-bold">Name Bank</li>
                                <li class="mb-3 font-weight-bold">Number Bank</li>
                                <li class="mb-3 font-weight-bold">Amount</li>
                                <li class="mb-3 font-weight-bold">Date Transfer</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-unstyled">
                                <li class="mb-3">: {{$payment->name_transfer}}</li>
                                <li class="mb-3">: {{$payment->name_bank}}</li>
                                <li class="mb-3">: {{$payment->number_bank}}</li>
                                <li class="mb-3">: $ {{number_format($payment->amount)}}</li>
                                <li class="mb-3">: {{date('d-m-Y', strtotime($payment->transfer_date))}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="image-transfer">
                        <span class="font-weight-bold">Image Transfer :</span>
                        <div class="image mt-3">
                            <img src="{{asset('storage/assets/images/payment/'.$payment->image_transfer)}}"
                                alt="image-transfer" class="img-fluid img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header bg-blue-old">
                    <h5>Invoice Order</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            <p><strong>Invoice : </strong><br>
                                {{$payment->order->invoice}}
                            </p>
                        </li>
                        <li>
                            <p><strong>Course : </strong><br>
                                {{$payment->order->course->name}}
                            </p>
                        </li>
                        <li>
                            <p><strong>Name Student : </strong><br>
                                {{$payment->order->student_name}}
                            </p>
                        </li>
                        <li>
                            <p><strong>Subtotal : </strong><br>
                                {{'$'. number_format($payment->order->subtotal)}}
                            </p>
                        </li>
                        <li>
                            <p><strong>Status : </strong><br>
                                @if ($payment->order->status == 1)
                                <span><i class="far fa-check-circle text-success"></i> Dibayar</span>
                                @else
                                <span><i class="far fa-times-circle text-danger"></i> Belum Dibayar</span>
                                @endif
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="button d-flex flex-column">
                <div class="mb-3">
                    @if ($payment->order->status == 0)
                    <form action="{{route('payment.update', $payment->id )}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id_order" value="{{$payment->order->id}}">
                        <button type="submit" class="btn btn-block btn-lg btn-success">Confirm Payment</button>
                    </form>
                    @endif
                </div>
                <div class="mb-3">
                    <a href="{{route('order.edit', $payment->order->id)}}" class="btn btn-block btn-lg btn-info">See
                        Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
