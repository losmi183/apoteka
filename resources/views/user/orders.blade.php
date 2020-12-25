@extends('layouts.app')

@section('content') 

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="space-50"></div>
                <h3 class="title-primary mb-4">Moje porudzbine</h3>

              @if (count($orders) > 0)
                <div id="accordion">
                    @foreach ($orders as $order)
                    
                      <div class="card">

                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <span class="btn" data-toggle="collapse" data-target="#colapse-{{$order->id}}" aria-expanded="true" aria-controls="collapseOne">
                              {{ formatDate($order->date_created) }}  -   Broj porudzbine: {{$order->id}}  -  Ukupna Cena: {{$order->suma}}  -  detaljnije
                            </span>
                          </h5>
                        </div>
                    
                        <div id="colapse-{{$order->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="p-0 ">
                            

                            <table class="cart-table">
                              <thead>
                              <tr>
                                  <th class="cart-table-column"></th>
                                  <th class="cart-table-column">Proizvod</th>
                                  <th class="cart-table-column">Cena</th>
                                  <th class="cart-table-column">Količina</th>
                                  <th class="cart-table-column">Ukupno</th>
                                  <th class="cart-table-column"></th>
                              </tr>
                              </thead>
                              <tbody>
                                  @foreach ($order->products as $item)
                                  <tr>
                                      <td class="cart-table-column cart-table-image">                            
                                          <img src="{{ asset('storage/'.$item->image) }}">
                                      </td>
                                      <td class="cart-table-column text-primary"> 
                                          <span>{{ $item->ime }}</span>
                                      </td>
                                      <td class="cart-table-column">
                                          <div class="row">
                                              <div class="col-4 mobile-preview">
                                                  <span class="text-left">Cena po komadu</span>
                                              </div>                         
                                              <div class="col-8">
                                                  <p class="text-left text-nowrap">{{ presentPrice($item->popust ?? $item->cena) }}</p>
                                              </div>
                                          </div>                            
                                      </td>
              
                                      <td class="cart-table-column">       
                                          
                                          <div class="row">
                                              <div class="col-4  mobile-preview">
                                                  <span class="text-right">Količina</span>
                                              </div>                         
                                              <div class="col-8">
                                                  <p class="text-left">{{ $item->pivot->quantity }}</p>
                                              </div>                
                                          </div>  
                                      </td>
              
                                      <td class="cart-table-column">
                                          <div class="row">
                                              <div class="col-4 mobile-preview">
                                                  <span class="text-right">Ukupno</span>
                                              </div>
                                              <div class="col-8">
                                                  <p class="text-left text-nowrap">{{ presentPrice($item->popust ?? $item->cena) * $item->pivot->quantity }}</p>
                                              </div>
                                          </div>                               
                                      </td>  
                                      <td class="cart-table-column cart-table-remove d-lg-flex justify-content-lg-end">
                                          <a href="/cart/remove/{{$item->rowId}}" class="btn btn-outline-secondary">
                                            <i class="fas fa-eye"></i>
                                          </a>
                                      </td>
                                  </tr>
                                  @endforeach                                                
                              </tbody>                             
                          </table>  

                          {{-- Order sum  --}}
                          <div class="row mt-1 justify-content-end">
                              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                  <div class="sum-wrapper">                                      
                                      <div class="d-flex justify-content-between">
                                          <p>Suma</p>
                                          <p class="text-primary">{{ presentPrice($order->suma) }} KM</p>
                                      </div>
                                  </div>
                              </div>
                          </div>


                          </div>
                        </div>
                      </div>   

                    @endforeach

                  </div>  {{-- accordion  --}}                  
                      
                @else
                    <p>Nemate porudzbina</p>
                    <div class="space-180"></div>
                @endif
            </div>
        </div>
    </div>
    
@endsection