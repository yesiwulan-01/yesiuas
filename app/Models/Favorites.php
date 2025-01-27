<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    protected $table = 'favorites';
    protected $fillable = ['cartIcon', 'details', 'image', 'isFavorite', 'lastUpdated', 'name', 'price', 'purchaseCount'];
}
