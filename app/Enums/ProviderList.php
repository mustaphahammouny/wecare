<?php

namespace App\Enums;

enum ProviderList: string
{
    case Google = 'google';
    case Facebook = 'facebook';

    public function title(): string
    {
        $title = match($this) 
        {
            self::Google => 'auth.google',   
            self::Facebook => 'auth.facebook', 
        };

        return __($title);
    }

    public function icon(): string
    {
        $title = match($this) 
        {
            self::Google => 'fab fa-google',   
            self::Facebook => 'fab fa-facebook-f', 
        };

        return __($title);
    }

    public function btn(): string
    {
        $title = match($this) 
        {
            self::Google => 'btn-white',   
            self::Facebook => 'btn-fb', 
        };

        return __($title);
    }
}
