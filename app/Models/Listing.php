<?php

namespace App\Models;

class Listing{
    public static function all() 
    {
        return [
            [
                'id'=> 1,
                'title'=> 'Listing One',
                'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt praesentium, distinctio ducimus optio consequatur corrupti, rem voluptatem iste dolores veritatis amet accusamus, dignissimos obcaecati vitae! Tenetur adipisci quis quidem. Dolore?'
            ],
            [
                'id'=> 2,
                'title'=> 'Listing Two',
                'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt praesentium, distinctio ducimus optio consequatur corrupti, rem voluptatem iste dolores veritatis amet accusamus, dignissimos obcaecati vitae! Tenetur adipisci quis quidem. Dolore?'
            ]
        ];
    }

    public static function find($id){
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}