<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class DeliveryMan extends Authenticatable
{
    use Notifiable;

    public function reviews(): HasMany
    {
        return $this->hasMany(DMReview::class, 'delivery_man_id');
    }

    public function rating(): HasMany
    {
        return $this->hasMany(DMReview::class)
            ->select(DB::raw('avg(rating) average, delivery_man_id'))
            ->groupBy('delivery_man_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'delivery_man_id');
    }
}
