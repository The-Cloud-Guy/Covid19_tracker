
@extends('layout')

@section('title', 'Covid 19  tracker')

@section('content')

<!-- Head of the section-->


<div class="pricing-header px-3 py-3 pt-md-1 pb-md-2 mx-auto text-center">
    
    <h1 class="display-4"><span> <img src="{{$flag}}" height="52" width="92"></span>       {{$countryName }}</h1>
    
  </div>

<!-- Head of the section-->

 <!-- Display The Numbers -->
  
 
     

  <div class="container">
    <div class="card-deck mb-3 text-center ">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
        
          <h4 class="my-0 font-weight-bold">Coronavirus Cases</h4>
        </div>
        <div class="card-body">
            
          <h1 class="card-title pricing-card-title text-primary">+{{\App\Http\Controllers\CovidsController::convertNumber($infosOfCountry['todayCases']) }} <small class="font-weight-bold" style="font-size: 1rem">Reported yesterday</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
          <li class="font-weight-bold">{{\App\Http\Controllers\CovidsController::convertNumber($infosOfCountry['cases'])}}  <small class="font-weight-bold">Total</small></li>
          
          </ul>
          
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-bold">Recovered</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title text-success">+{{\App\Http\Controllers\CovidsController::convertNumber($infosOfCountry['todayRecovered'])}} <small class="font-weight-bold" style="font-size: 0.8rem">Reported yesterday</small> </h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li class="font-weight-bold">{{\App\Http\Controllers\CovidsController::convertNumber($infosOfCountry['recovered'])}} <small class="font-weight-bold">Total</small></li>
        
          </ul>
         
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-bold">Deaths</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title text-danger">+{{\App\Http\Controllers\CovidsController::convertNumber($infosOfCountry['todayDeaths'])}} <small class="font-weight-bold" style="font-size: 0.8rem">Reported yesterday</small></h1> 
          <ul class="list-unstyled mt-3 mb-4">
            <li class="font-weight-bold">{{\App\Http\Controllers\CovidsController::convertNumber($infosOfCountry['deaths'])}}  <small class="font-weight-bold">Total</small></li>
          
          </ul>
          
        </div>
      </div>
    </div>
  
   
  </div>


  

 

  <!-- Display The Numbers -->

  
  
  <!-- Display The chartjs  -->

  <div class="container">
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </div>

           
    

          
 
  
  <!-- Display The chartjs  -->

 <script>
  

window.onload = function() {
    var ctx = document.getElementById('myChart');
    var myChart;
    
    var dat = @json($dates);
    var cas = @json($realCases);
    var recov = @json($realRecovered);
    var death = @json($realDeaths);
    
    if(myChart){
        myChart.destroy;
    }

    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        
        datasets: [{
            label: 'Cases',
            data: cas,
            fill: false,
            borderColor: '#0000ff',
            backgroundColor: '#0000ff',
            borderWidth: 1
        }, {
            label: 'Recovered',
            data: recov,
            fill: false,
            borderColor: '#008000',
            backgroundColor: '#008000',
            borderWidth: 1,
            
        }, {
        label: 'Deaths  ( STATISTICS OF THE LAST 30 DAYS) ---- Source: JHU CSSE COVID-19 Data',
        data: death,
        fill: false,
        borderColor: '#FF0000',
        backgroundColor: '#FF0000',
        borderWidth: 1


      }],
        labels :dat,
      },
        
      options: {
        responsive: true,
        maintainAspectratio: false

      }
   });



};
  

</script>



    
    
@endsection