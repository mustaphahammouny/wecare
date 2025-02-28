<?php

namespace App\Data;

use App\Enums\BookingStatus;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class BookingFilter extends Data
{
    public function __construct(
        public ?int $userId,
        public ?Carbon $start,
        public ?Carbon $end,
        public ?BookingStatus $status,
    ) {
    }
}
