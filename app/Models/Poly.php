<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poly extends Model
{
    use HasFactory;

    /**
     * The Attributes that aren't mass assignable.
     * 
     * @var array
     */
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'patient_id');
    }

    public function polyComplaint()
    {
        return $this->belongsToMany(Complaint::class,'patient_id');
    }
}
