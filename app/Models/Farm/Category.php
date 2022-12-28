<?php

namespace App\Models\Farm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    
    public function capital()
    {
        return $this->hasMany(Capital::class);
    }

}
