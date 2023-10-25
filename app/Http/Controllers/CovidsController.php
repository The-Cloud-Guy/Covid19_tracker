<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidsController extends Controller
{
    //

    public function index(Request $request)
    {
        // Get the stats of coronavirus cases in All the countries

        $allcountries = Http::get('https://disease.sh/v3/covid-19/all?yesterday=true')
            ->json();

        // Get the historic of coronavirus cases in All the countries

        $historicAll = Http::get('https://disease.sh/v3/covid-19/historical/all?lastdays=30')
            ->json();


        return view('covidglobal', compact('allcountries', 'historicAll'));

    }

    public function countries(Request $request)
    {

        $listOfCountries = Http::get('https://disease.sh/v3/covid-19/countries')
            ->json();

        // dd($listOfCountries);
    }

    // The function to get the infos of a specific country
    public function infosCountry(Request $request, $name)
    {
        $coun = $request->route('name');

        $infosOfCountry = Http::get('https://disease.sh/v3/covid-19/countries/' . $coun . '?yesterday=true&strict=true')
            ->json();

        //dd($infosOfCountry);

        // store the flag of the country

        $flag = $infosOfCountry['countryInfo']['flag'];

        // stor the name of the country

        $countryName = $infosOfCountry['country'];

        // Get the historic of coronavirus cases in a specific country

        $historicOfCountry = Http::get('https://disease.sh/v3/covid-19/historical/' . $coun . '?lastdays=30')
            ->json();


        // Get the last 30 days for each country

        $dates = array_keys($historicOfCountry['timeline']['cases']);

        // Get the $numbers of covid19 cases in the last 30 days

        $cases = $historicOfCountry['timeline']['cases'];

        $realCases = array();
        for ($i = 0; $i < count($dates); $i++) {
            array_push($realCases, $cases[$dates[$i]]);
        }

        // Get the $numbers of recoverd in the last 30 days

        $recovered = $historicOfCountry['timeline']['recovered'];

        $realRecovered = array();

        for ($i = 0; $i < count($dates); $i++) {
            array_push($realRecovered, $recovered[$dates[$i]]);
        }


        // Get the $numbers of deaths the last 30 days

        $deaths = $historicOfCountry['timeline']['deaths'];

        $realDeaths = array();

        for ($i = 0; $i < count($dates); $i++) {
            array_push($realDeaths, $deaths[$dates[$i]]);
        }


        // return All data to the view

        return view('contry', compact('infosOfCountry', 'historicOfCountry', 'dates', 'flag', 'realRecovered', 'realCases', 'realDeaths', 'countryName'));

    }

    public static function convertnumber($num)
    {
        $num = (float)$num;

        if ($num > 1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;

        }

        return $num;
    }

    // redirection using ajax

    public function getinfos(Request $request)
    {
        $name = $request->input('country');

        return redirect()->route('covids.infos', ['name' => $name]);
    }
}
