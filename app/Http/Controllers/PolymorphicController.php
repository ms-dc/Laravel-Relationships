<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Comment;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        // $city = City::where('name', 'Rio de Janeiro')->get()->first();
        // echo "<b>{$city->name}: </b> <br>";

        // $comments = $city->comments()->get();

        // foreach($comments as $comment) {
        //     echo "{$comment->description}<hr>";
        // }

        // $state = State::where('name', 'Rio de Janeiro')->get()->first();
        // echo "<b>{$state->name}: </b> <br>";

        // $comments = $state->comments()->get();

        // foreach($comments as $comment) {
        //     echo "{$comment->description}<hr>";
        // }

        $country = Country::where('name', 'Brasil')->get()->first();
        echo "<b>{$country->name}: </b> <br>";

        $comments = $country->comments()->get();

        foreach($comments as $comment) {
            echo "{$comment->description}<hr>";
        }
    }

    public function polymorphicInsert()
    {
        // $city = City::where('name', 'Rio de Janeiro')->get()->first();
        // echo $city->name;

        // $comment = $city->comments()->create([
        //     'description' => "Nunca mais eu volto. {$city->name} ".date('d-m-Y'),
        // ]);
        // var_dump($comment->description);

        // $state = State::where('name', 'Rio de Janeiro')->get()->first();
        // echo $state->name;

        // $comment = $state->comments()->create([
        //     'description' => "Pior estado ever. {$state->name} ".date('d-m-Y'),
        // ]);
        // var_dump($comment->description);

        $country = Country::find(2);
        echo $country->name;

        $comment = $country->comments()->create([
            'description' => "FITTA!. {$country->name} ".date('d-m-Y'),
        ]);
        var_dump($comment->description);
    }
    
}
