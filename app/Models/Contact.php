<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['name', 'phone'];

    public function lists()
    {
        return $this->hasMany(DeskList::class);
    }
}
