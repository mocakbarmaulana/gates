@extends('layouts.member')

@section('head')
<title>Detail Order</title>
{{-- <link rel="stylesheet" href="{{asset('assets/css/member/detailorder.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/css/member/member.css')}}">
@endsection

@section('content')
<div class="py-4">
    @if ($order->status == 0 && $order->payments)
    <div class="col-12">
        <div class="alert alert-warning" role="alert">
            Saat ini pembayaran anda sedang di lakukan pengecakan, jika dalam 2 jam belum ada perubahan silakan hubungi
            kami
        </div>
    </div>
    @endif

    @if ($order->payments && $order->payments->status == 0)
    <div class="px-2">
        <div class="alert alert-info" role="alert">
            Tunggu beberapa saat, karena pembayaran sedang dikonfirmasi admin
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-7">
            <div class="px-2">
                <img src="{{asset('storage/assets/images/course/'.$order->course->image_course)}}" alt="image-course"
                    class="img-thumbnail" style="height: 470px">
                <ul class="list-unstyled">
                    <li class="my-3">
                        <p class="m-0"><strong>Description : </strong></p>
                        <span>{!! $order->course->description !!}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col pl-0">
            <ul class="list-unstyled rounded pt-0 px-2 mb-3">
                <li class="my-3">
                    <h5>{{$order->course->name}}</h5>
                </li>
                <li class="my-3">
                    <p class="m-0"><strong>Invoice : </strong></p>
                    <span>{{$order->invoice}}</span>
                </li>
                <li class="my-3">
                    <p class="m-0"><strong>Price : </strong></p>
                    <span>${{number_format($order->subtotal)}}</span>
                </li>
                <li class="my-3">
                    <p class="m-0"><strong>Date Invoice : </strong></p>
                    <span>{{ date_format($order->created_at, 'd-m-Y')}}</span>
                </li>
                <li class="my-3">
                    <p class="m-0"><strong>Status : </strong></p>
                    @if ($order->status == 1)
                    <span><i class="far fa-check-circle text-success"></i> Dibayar</span>
                    @else
                    <span><i class="far fa-times-circle text-danger"></i> Belum Dibayar</span>
                    @endif
                </li>
            </ul>

            <div class="px-2">
                @if ($order->status == 0)
                <button class="btn btn-block btn-warning font-weight-bold" data-toggle="modal"
                    data-target="#staticBackdrop">Confirm Payment</button>
                @else
                <a href="{{route('member.getdetailcourse', $order->course->id)}}"
                    class="btn btn-block bg-green-mint order-filter font-weight-bold">See Course</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="staticBackdropLabel">Confirm Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <form action="{{route('member.payment')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <div class="form-group">
                                <label>Invoice</label>
                                <input class="form-control" type="text" placeholder="{{$order->invoice}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <small class="text-danger">*{{$message}}</small>
                                @enderror
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="numberBank">Number Bank</label>
                                @error('number_bank')
                                <small class="text-danger">*{{$message}}</small>
                                @enderror
                                <input type="number" class="form-control @error('number_bank') is-invalid @enderror"
                                    name="number_bank" id="numberBank" value="{{old('number_bank')}}">
                            </div>
                            <div class="form-group">
                                <label for="nameBank">Name Bank</label>
                                @error('name_bank')
                                <small class="text-danger">*{{$message}}</small>
                                @enderror
                                <input type="text" class="form-control @error('name_bank') is-invalid @enderror"
                                    name="name_bank" id="nameBank" value="{{old('name_bank')}}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                        name="amount" id="amount" value="{{old('amount')}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="dateTransfer">Date Transfer</label>
                                    <input type="date" class="form-control @error('date_transfer') is-invalid @enderror"
                                        name="date_transfer" id="dateTransfer" value="{{old('date_transfer')}}">
                                </div>
                            </div>
                    </div>
                    <div class="col-6">
                        <img src="{{asset('assets/images/no-image.png')}}" alt="img-prove" style="height: 320px"
                            width="100%" class="image-preview">
                        <div class="form-group mt-4">
                            <label for="imgProve">Image Proove</label>
                            @error('image')
                            <small class="text-danger">*{{$message}}</small>
                            @enderror
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                    name="image" id="imgProve">
                                <label class="custom-file-label image-text" for="imgProve">Choose file...</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-green-mint order-filter">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $("#imgProve").change(function(){
const name = $(this.files[0])[0].name;
$(".image-text").text(name);
readUrlImage($(this));
});


function readUrlImage(input){
let reader = new FileReader();

console.log(reader);

reader.onload = function(e){
$(".image-preview").attr('src', e.target.result);
// {{-- console.log(e); --}}
}

reader.readAsDataURL(input[0].files[0]);
// {{-- console.log(input[0].files[0]); --}}
}
</script>
@endsection
