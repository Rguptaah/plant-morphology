<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaf extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
    
    /**
     * Get the plants for the leaf.
     */
    public function plants()
    {
        return $this->belongsToMany(Plant::class);
    }
}
