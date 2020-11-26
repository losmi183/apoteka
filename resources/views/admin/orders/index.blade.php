@extends('admin.layout')

@section('content')

<div id="order-index">   

{{-- <h1>{{dd($categories)}}</h1> --}}
    <div class="card m-3">
        <div class="card-header">
            <span class='admin-title'>Porudzbine</span>
        </div>

        <div class="card-body row">    
            <div class="col-sm-2">
                <aside>
                    <div class="card">
                        <div class="card-header">
                            <h2>STATUS</h2>
                        </div>
                            <div class="card-body">
                                <ul class="sidebar-list">
                                    <a href="/admin/orders/0"><li class="sidebar-item {{ !$status ? 'font-weight-bold' : ''}}">Sve</li></a>
                                    <a href="/admin/orders/1"><li class="sidebar-item {{ $status == 1 ? 'font-weight-bold' : ''}}">Primljene</li></a>
                                    <a href="/admin/orders/2"><li class="sidebar-item {{ $status == 2 ? 'font-weight-bold' : ''}}">Poslate</li></a>
                                    <a href="/admin/orders/3"><li class="sidebar-item {{ $status == 3 ? 'font-weight-bold' : ''}}">Isporučene</li></a>
                                </ul>                
                            </div>
                    </div> 
                </aside>
            </div>
            <div class="col-sm-10">    
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Ime</th>
                        {{-- <th>Email</th> --}}
                        <th>Telefon</th>
                        <th>Adresa</th>
                        <th>Suma</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr class="{{orderClass($order->status)}}">
                        <td>{{$order->id}}</td>
                        <td>{{$order->ime}} {{$order->prezime}}</td>
                        {{-- <td>{{$order->email}}</td> --}}
                        <td>{{$order->telefon}}</td>
                        <td>{{$order->adresa}}</td>
                        <td>{{presentPrice($order->suma)}}</td>
                        <td>
                            <form action="/order/status/{{$order->id}}" method="POST">
                                @csrf
                                <select onchange="this.form.submit()" name="status" class="form-control">
                                    <option {{$order->status == 1 ? 'selected' : ''}} value="1">Primljena</option>
                                    <option {{$order->status == 2 ? 'selected' : ''}} value="2">Poslata</option>
                                    <option {{$order->status == 3 ? 'selected' : ''}} value="3">Isporučena</option>
                                </select>
                                {{-- <button>OK</button> --}}
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/admin/order/{{$order->id}}">Pogledaj</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>                    
        </div>

        <div class="d-flex justify-content-center mb-3">
            {{$orders->appends(request()->input())->links()}}
        </div>

    </div>
</div>

@endsection