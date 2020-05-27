<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        // $country = Country::where('name', 'Brasil')->get()->first();
        $filter = 'a';
        $countries = Country::where('name', 'LIKE', "%{$filter}%")->with('states')->get();

        foreach($countries as $country) {
            echo "<b>$country->name</b>";

            $states = $country->states;

            foreach($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }

            echo "<hr>";
        }

        // echo $country->name;

        // $states = $country->states;
        // // $states = $country->states()->get();

        // foreach($states as $state) {
        //     echo "<hr>{$state->initials} - {$state->name}";
        // }
    }

    public function manyToOne()
    {
        $stateName = 'São Paulo';
        $state = State::where('name', $stateName)->get()->first();

        echo "<b>{$state->name}</b>";

        $country = $state->country()->get()->first();
        echo "<br>País: {$country->name}";
    }

    public function oneToManyTwo()
    {
        // $country = Country::where('name', 'Brasil')->get()->first();
        $filter = 'a';
        $countries = Country::where('name', 'LIKE', "%{$filter}%")->with('states.cities')->get();

        foreach($countries as $country) {
            echo "<b>$country->name</b>";

            $states = $country->states;

            foreach($states as $state) {
                echo "<br>{$state->initials} - {$state->name}: ";

                $cities = $state->cities;
                
                foreach($cities as $city) {
                    echo "{$city->name}, ";
                }
            }

            echo "<hr>";
        }
    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
        ];

        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);
        var_dump($insertState->name);
    }

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name' => 'Santa Catarina',
            'initials' => 'SC',
            'country_id' => '1',
        ];

        $insertState = State::create($dataForm);
        var_dump($insertState->name);
    }
}
