<?php

namespace App\Data;

use App\Enums\BookingStatus;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class BookingData extends Data
{
    public function __construct(
        public int $userId,
        public int $serviceId,
        public int $cityId,
        public int $duration,
        public string $phone,
        public string $address,
        public Carbon $serviceAt,
        public ?float $servicePrice,
        public ?float $total,
        public ?BookingStatus $status,
        public ?array $extras,
    ) {
    }

    public static function prepareForPipeline(Collection $properties): Collection
    {
        $dateTime = $properties->get('date') . ' ' . $properties->get('time');
        $serviceAt = Carbon::createFromFormat('d/m/Y H', $dateTime);
        $properties->put('service_at', $serviceAt);

        return $properties;
    }
}
