<?php

namespace App\Models\Farm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    use HasFactory;
    protected $table = 'capital_periods';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
