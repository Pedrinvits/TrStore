<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sales;

class Sellers extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_name',
        'seller_email',
    ];

    public function Sales()
    {
        return $this->hasMany(Sales::class, 'seller_id', 'id');
    }
}
