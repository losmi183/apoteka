@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-xl-8 col-lg-9 col-md-12">
                <div class="py-4"></div>
                <h3 class="title-primary-xl">Način isporuke</h3>        
                
                
                <h3 class="mb-3 mt-4">POŠTE SRPSKE A.D.
                </h3>
                <p>Teritorija BiH</p>

                <div class="my-3"></div>

                <table class="table">
	
                    <tbody><tr>
                        <td>
                        <p><strong>Masa (u kg)</strong></p>
                        </td>
                        <td>
                        <p><strong>Cijena (u KM)</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>do 10</p>
                        </td>
                        <td>
                        <p>5.00</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>10 - 20</p>
                        </td>
                        <td>
                        <p>7.00</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>20 - 30</p>
                        </td>
                        <td>
                        <p>10.00</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>30 - 200</p>
                        </td>
                        <td>
                        <p>15.00-60.00</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>Preko 200</p>
                        </td>
                        <td>
                        <p>svaki naredni 10kg.,<br>
                        ili dio 2.00 KM</p>
                        </td>
                    </tr>
                
            </tbody></table>



            <p class="my-3">* U navedene cijene je uključen PDV</p>

            <div class="card">
                <div class="card-body">
                    <h5 class="my-2">Rok isporuke - Pošte Srpske</h5>
    
                    <p class="my-3">Rok za uručenje pošiljaka je do 15 časova narednog dana, za narudžbe do 11 časova (pošiljke koje se predaju do definisanog vremena za predaju) s tim da je za pojedina odredišta potrebno 2 dana za isporuku (odredišna pošta (mjesto) ima naredni dan razmjenu zaključaka) - tabela ispod. Kada se pošiljka preda nakon definisanog vremena, tada se rokovi za uručenje pomjeraju za jedan radni dan. U rokove prenosa ne računaju se: dan prijema, dani kad pošta ne radi (nedjelja, državni ili vjerski praznici), vrijeme kašnjenja zbog netačne ili nepotpune adrese, vrijeme kašnjenja zbog više sile ili zastoja u saobraćaju nastalog bez krivice Pošte. 
                    </p>
    
                    <strong class="my-3">* Tačan spisak opština sa danima isporuke pogledajte niže u dokumentu Pošte Srpske - Spisak pošta sa rokovoma uručenja 
    
                    </strong>

                </div>
            </div>
               

            </div>



        </div>
    </div>
    
@endsection