<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $guarded = [];

    public function userone() {

        return $this->hasOne(User::class);

    }

    public function countryone() {

        return $this->hasOne(Country::class);

    }
}
