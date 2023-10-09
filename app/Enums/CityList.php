<?php

namespace App\Enums;

enum CityList: int
{
    case Sale = 1;
    case Rabat = 2;
    case Kenitra = 3;
    case Casablanca = 4;

    public function title(): string
    {
        $title = match($this) 
        {
            self::Sale => 'db.cities.sale',   
            self::Rabat => 'db.cities.rabat',   
            self::Kenitra => 'db.cities.kenitra',  
            self::Casablanca => 'db.cities.casablanca',  
        };

        return __($title);
    }
}
