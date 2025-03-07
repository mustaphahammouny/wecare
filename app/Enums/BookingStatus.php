<?php

namespace App\Enums;

enum BookingStatus: int
{
    case Scheduled = 1;
    case Cancelled = 2;
    case Refunded = 3;
    case Completed = 4;

    public function title(): string
    {
        $title = match ($this) {
            self::Scheduled => 'Scheduled',
            self::Cancelled => 'Cancelled',
            self::Refunded => 'Refunded',
            self::Completed => 'Completed',
        };

        return __($title);
    }

    public function badge(): string
    {
        return match ($this) {
            self::Scheduled => 'badge rounded-pill bg-primary fz13',
            self::Cancelled => 'badge rounded-pill bg-danger fz13',
            self::Refunded => 'badge rounded-pill bg-secondary fz13',
            self::Completed => 'badge rounded-pill bg-success fz13',
        };
    }

    public function background(): string
    {
        return match ($this) {
            self::Scheduled => 'bg-primary',
            self::Cancelled => 'bg-danger',
            self::Refunded => 'bg-secondary',
            self::Completed => 'bg-success',
        };
    }

    static public function fromString($status): self
    {
        return match ($status) {
            'scheduled' => self::Scheduled,
            'cancelled' => self::Cancelled,
            'refunded' => self::Refunded,
            'completed' => self::Completed,
        };
    }
}
