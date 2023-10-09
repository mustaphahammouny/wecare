<?php

namespace App\Data;

use App\Enums\CityList;
use App\Enums\PlanList;
use App\Enums\PlanOptionList;
use App\Enums\PropertyList;
use App\Enums\StatusList;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class BookingData extends Data
{
    public function __construct(
        public int $userId,
        public int $serviceId,
        public float $servicePrice,
        public CityList $city,
        public string $phone,
        public string $address,
        public PlanList $plan,
        public PlanOptionList|Optional $planOption,
        public array|Optional $extras,
        public int $duration,
        public float $total,
        public Carbon $serviceAt,
        public StatusList|Optional $status,
    ) {
    }

    public static function prepareForPipeline(Collection $properties) : Collection
    {
        $properties->put('city', CityList::from($properties->get('city')));
        $properties->put('plan', PlanList::from($properties->get('plan')));
        $properties->put('plan_option', PlanOptionList::tryFrom($properties->get('plan_option')));        

        $dateTime = $properties->get('date') . ' ' . $properties->get('time');
        $serviceAt = Carbon::createFromFormat('d/m/Y H', $dateTime);
        $properties->put('service_at', $serviceAt);

        return $properties;
    }
}
