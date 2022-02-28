<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $casts = [
        'birthdate' => 'datetime:Y-m-d',
        'date_hired' => 'datetime:Y-m-d',
    ];

    public function country()
    {
       return $this->belongsTo(Country::class);
    }

    public function states()
    {
       return $this->belongsTo(State::class);
    }

    public function city()
    {
       return $this->belongsTo(City::class);
    }

    public function department()
    {
       return $this->belongsTo(Department::class);
    }
}
