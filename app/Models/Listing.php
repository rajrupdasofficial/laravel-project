<?php
namespace App\Models;
 class Listing{
    public static function all(){
        return[
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Description One'
            ],
            [
                'id' => 2 ,
                'title' => 'Listing Two',
                'description' => 'Description Two'
            ],
        ];
    }
    public static function find($id){
        $listings = self::all();

        foreach($listings as $listings){
            if($listings['id']==$id){
                return $listings;
            }
        }
    }
 }
?>