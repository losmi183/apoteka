@extends('admin.app-layout')

@section('content')
    <div class="py-4 px-3">
        <div id="top_x_div" style="width: 100%; height: 80%;"></div>
    </div>
    @endsection

@section('extra-css')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {  
        var data = new google.visualization.arrayToDataTable([
        ['Količina', 'Ukupno'],

        ["Proizvodi", {{$products}}],
        ["Kategorije", {{$categories}}],
        ["Akcije", {{$actions}}],
        ["Porudzbine", {{$orders}}],
        ['Registrovani korisnici', {{$users}}]
        ]);

        var options = {
        width: $(window).width()*0.75,
        height: $(window).height()*0.75,
        legend: { position: 'none' },
        chart: {
            title: 'Prikaz osnovnih podataka',
            subtitle: '' },
        bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
    </script>
@endsection