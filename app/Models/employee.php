<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;


class Employee extends Model
{
    // use HasFactory
    protected $fillable = ['fname', 'lname', 'mail', 'address', 'phone', 'category_id'];

    public function category() {
        return $this->belongsTo(category::class);
    }

}
