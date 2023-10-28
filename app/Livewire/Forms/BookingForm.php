<?php

namespace App\Livewire\Forms;

use App\Models\Booking;
use Livewire\Form;

class BookingForm extends Form
{
    public int $status;

    public function rules()
    {
        return [
            'status' => ['required', 'integer'],
        ];
    }

    public function fillProps(Booking $booking)
    {
        $this->status = $booking->status->value;
    }
}
