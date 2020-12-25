@extends('admin.app-layout')

@section('content')

    <div class="card-header {{orderClass($order->status)}}">
        <div class="form-group d-flex align-middle m-0">
            <span class="mt-2 mr-3 admin-title">Status Porudzbine</span>
            <form class="d-flex mr-3" action="/order/status/{{$order->id}}" method="POST">
                @csrf
                <select onchange="this.form.submit()" name="status" class="form-control">
                    <option {{$order->status == 1 ? 'selected' : ''}} value="1">Primljena</option>
                    <option {{$order->status == 2 ? 'selected' : ''}} value="2">Poslata</option>
                    <option {{$order->status == 3 ? 'selected' : ''}} value="3">Isporučena</option>
                </select>
            </form>
            <a href="/admin/orders" class="btn btn-outline-secondary">Nazad</a>
        </div>
    </div>

    <div class="card-body row">            
        <div class="col-lg-4 mb-4"> 

            <h3 class="mb-4">Podaci o kupcu</h3>
            <div class="line"></div>
            Id Porudzbine: <strong>{{$order->id}}</strong   > <hr>
            Ime i prezime: <strong>{{$order->ime}}</strong> <hr>  
            {{-- Prezime: <strong>{{$order->prezime}}</strong> <hr> --}}
            Email: <strong>{{$order->email}}</strong> <hr>  
            Adresa: <strong>{{$order->adresa}}</strong> <hr>
            Telefon: <strong>{{$order->telefon}}</strong> <hr>
            Dodatna napomena: <p>{{$order->napomene}}</p> <hr>
            Ukupno za naplatu: <strong>{{presentPrice($order->suma)}}</strong> <hr>

        </div>   
    
    <div class="col-lg-8">
        
        <h3 class="mb-3">Lista Proizvoda</h3>
        <div class="line"></div>

        <table class="table text-center">
            <tr>
                <th></th>
                <th>IME / SLUG </th>
                <th>ID</th>
                <th>KOLIČINA</th>
                <th class="text-right">CIJENA PO JEDINICI</th>
            </tr>

            @foreach ($order->products as $product)
                <tr>
                    <td><img height="80px" src="{{ asset('storage/' . $product->image) }}"></td>
                    <td><strong>{{$product->ime}}</strong><br> 
                        <strong class="mt-1 d-block">{{$product->slug}}</strong><br> 
                        {{-- Cijena po jedinici: {{presentPrice($product->popust ?? $product->cena)}} <br> --}}
                        {{-- Pakovanje:ml <br> --}}
                        {{-- Veličina pakovanja: 250</td> --}}
                
                    <td>{{$product->id}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td class="text-right"><strong >{{presentPrice($product->popust ?? $product->cena)}}</strong></td>
                <td>
                    <a target="_blanc" title="Pogledaj u prodavnici" href="/proizvodi/{{$product->slug}}"><i class="fas fa-eye"></i></a>
                    <a target="_blanc" title="Edituj" href="/product/edit/{{$product->id}}"><i class="fas fa-edit"></i></a>
                </td>
                </tr>
            @endforeach  
        </table> 
    </div>{{-- card body  --}}

@endsection