<?php

namespace App\Constants;

abstract class General
{
    const TAX = 0.2;

    const PER_PAGE = 5;

    const DATE_FORMAT = 'd/m/Y';

    const DATETIME_FORMAT = 'd/m/y H:i:s';

    const VALID_DATE_FORMAT = 'Y-m-d';

    const VALID_DATETIME_FORMAT = 'Y-m-d\\TH:i:sP';

    const LOCALES = [
        'en' => ['title' => 'English', 'flag' => 'gb', 'dir' => 'ltr',],
        'fr' => ['title' => 'French', 'flag' => 'fr', 'dir' => 'ltr',],
        'ar' => ['title' => 'Arabic', 'flag' => 'ma', 'dir' => 'rtl',],
    ];
}
