<?php

namespace App\Livewire\Forms;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Illuminate\Validation\Rule;
use Livewire\Form;

class BookingForm extends Form
{
    public BookingStatus $status;

    public function rules()
    {
        return [
            'status' => ['required', Rule::enum(BookingStatus::class)],
        ];
    }

    public function fillProps(Booking $booking)
    {
        $this->status = $booking->status;
    }
}
