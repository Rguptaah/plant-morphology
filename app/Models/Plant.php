<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plant_name',
        'created_by',
        'approved_by',
        'status',
        'rejection_reason',
    ];
    
    /**
     * Get the user who created the plant.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /**
     * Get the user who approved the plant.
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
    
    /**
     * Get the habitats for the plant.
     */
    public function habitats()
    {
        return $this->belongsToMany(Habitat::class);
    }
    
    /**
     * Get the leaves for the plant.
     */
    public function leaves()
    {
        return $this->belongsToMany(Leaf::class);
    }
    
    /**
     * Get the flowers for the plant.
     */
    public function flowers()
    {
        return $this->belongsToMany(Flower::class);
    }
}
