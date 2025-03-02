<?php

namespace App\Livewire\Views\Store;

use App\Data\BookingData;
use App\Data\ServiceFilter;
use App\Livewire\Components\Authenticate;
use App\Livewire\Components\Information;
use App\Livewire\Components\Date;
use App\Livewire\Components\Duration;
use App\Livewire\Components\Agreement;
use App\Livewire\Components\Time;
use App\Services\BookingService;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.simple')]
#[Title('Booking')]
class Booking extends Component
{
    #[Locked]
    public $slug;

    #[Locked]
    public $state = [];

    #[Locked]
    public $current = Information::class;

    protected $steps = [
        Information::class,
        Duration::class,
        Date::class,
        Time::class,
        Authenticate::class,
        Agreement::class,
    ];

    protected BookingService $bookingService;

    public function boot(ServiceService $serviceService, BookingService $bookingService)
    {
        $serviceFilter = ServiceFilter::from(['slug' => $this->slug]);

        $this->state['service'] = $serviceService
            ->firstOrFail($serviceFilter, ['durations', 'extras'])
            ->toArray();

        $this->bookingService = $bookingService;
    }

    public function previous(string $current)
    {
        $current = 'App\Livewire\Components\\' . ucfirst($current);
        $currentIndex = array_search($current, $this->steps);
        $previousIndex = $currentIndex - 1;

        if ($this->steps[$previousIndex] == Authenticate::class && Auth::check()) {
            $previousIndex--;
        }

        $this->current = $this->steps[$previousIndex];
    }

    #[On('next-step')]
    public function next(string $current, array $state)
    {
        $this->state = array_merge($this->state, $state);

        $currentIndex  = array_search($current, $this->steps);
        $nextIndex = $currentIndex + 1;

        if (count($this->steps) > $nextIndex) {
            if ($this->steps[$nextIndex] == Authenticate::class && Auth::check()) {
                $nextIndex++;
            }

            $this->current = $this->steps[$nextIndex];
        } else {
            $this->store();
        }
    }

    private function store()
    {
        try {
            $bookingData = BookingData::from([
                'user_id' => Auth::id(),
                'service_id' => $this->state['service']['id'],
                'city_id' => $this->state['city'],
                'duration' => $this->state['duration']['duration'],
                'phone' => $this->state['phone'],
                'address' => $this->state['address'],
                'date' => $this->state['date'],
                'time' => $this->state['time'],
                'extras' => array_column($this->state['extras'], 'id'),
            ]);

            $this->bookingService->store($bookingData);

            return $this->redirect(ThankYou::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.store.booking');
    }
}
