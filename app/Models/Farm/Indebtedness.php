<?php

namespace App\Models\Farm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indebtedness extends Model
{
    use HasFactory;

    protected $table = 'indebtedness';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
