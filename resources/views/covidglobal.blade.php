
@extends('layout')

@section('title', 'Covid 19  tracker')

@section('content')

<!-- Head of the section-->


<div class="pricing-header px-3 py-3 pt-md-1 pb-md-2 mx-auto text-center">
    <h1 class="display-4">Worldwide</h1>
    
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
            
          <h1 class="card-title pricing-card-title text-danger">+{{\App\Http\Controllers\CovidsController::convertNumber($allcountries['todayCases']) }}</h1>
          <ul class="list-unstyled mt-3 mb-4">
          <li class="font-weight-bold">{{\App\Http\Controllers\CovidsController::convertNumber($allcountries['cases'])}}  <small class="font-weight-bold">Total</small></li>
          
          </ul>
          
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-bold">Recovered</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title text-success">+{{\App\Http\Controllers\CovidsController::convertNumber($allcountries['todayRecovered'])}} </h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li class="font-weight-bold">{{\App\Http\Controllers\CovidsController::convertNumber($allcountries['recovered'])}} <small class="font-weight-bold">Total</small></li>
        
          </ul>
         
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-bold">Deaths</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title text-danger">+{{\App\Http\Controllers\CovidsController::convertNumber($allcountries['todayDeaths'])}}</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li class="font-weight-bold">{{\App\Http\Controllers\CovidsController::convertNumber($allcountries['deaths'])}}  <small class="font-weight-bold">Total</small></li>
          
          </ul>
          
        </div>
      </div>
    </div>
  
   
  </div>

  
  

 

  



    
    
@endsection