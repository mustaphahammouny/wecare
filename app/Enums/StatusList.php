<?php

namespace App\Enums;

enum StatusList: int
{
    case Scheduled = 1;
    case Canceled = 2;
    case Refunded = 3;
    case Completed = 4;

    public function title(): string
    {
        $title = match($this) 
        {
            self::Scheduled => 'Scheduled',   
            self::Canceled => 'Canceled',   
            self::Refunded => 'Refunded',  
            self::Completed => 'Completed',  
        };

        return __($title);
    }

    public function badge(): string
    {
        return match($this) 
        {
            self::Scheduled => 'badge rounded-pill bg-primary fz13',   
            self::Canceled => 'badge rounded-pill bg-danger fz13',   
            self::Refunded => 'badge rounded-pill bg-secondary fz13',  
            self::Completed => 'badge rounded-pill bg-success fz13',  
        };
    }
}
