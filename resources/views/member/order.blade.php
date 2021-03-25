@extends('layouts.member')

@section('head')
<title>Order</title>
<link rel="stylesheet" href="{{asset('assets/css/member/member.css')}}">
@endsection

@section('content')
<div class="p-4">
    <div class="row mb-3">
        <div class="col d-flex justify-content-center align-items-center">
            <form action="" method="get">
                <input type="hidden" value="1" name="q">
                <button href=""
                    class="order-filter bg-green-mint text-center py-3 rounded @if ($status == 1) btn-active @endif"
                    style="width: 150px">
                    <i class="fas fa-dollar-sign fa-2x"></i><br>
                    Dibayar
                </button>
            </form>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <form action="">
                <input type="hidden" value="0" name="q">
                <button type="submit"
                    class="order-filter bg-green-mint text-center py-3 rounded @if ($status == 3) btn-active @endif"
                    style="width: 150px">
                    <i class="fas fa-money-check-alt fa-2x"></i><br>
                    Belum dibayar
                </button>
            </form>
        </div>
    </div>

    <table class="table table-hover">
        <thead class="bg-green-mint">
            <tr>
                <th scope="col">Course</th>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>
                    @if ($order->status == 1)
                    <i class="far fa-check-circle text-success"></i>
                    @else
                    <i class="far fa-times-circle text-danger"></i>
                    @endif
                    {{$order->course->name}}
                </td>
                <td class="text-center">{{ date_format($order->created_at,'d/m/Y')}}</td>
                <td class="text-center">
                    <a href="{{route('member.getorderdetail', $order->id)}}"
                        class="btn btn-sm bg-green-mint order-filter">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>

        <div class="oke">
            {{$orders->links()}}
        </div>

    </table>
    <div class="text-center">
        @if($orders->count() == 0)
        <span>Belum melakukan order</span>
        @endif
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection
