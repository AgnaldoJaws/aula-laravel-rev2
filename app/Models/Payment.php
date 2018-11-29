<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use TenantModels;
    
    protected $fillable = ['id','method','total'];

    public function items(){    
        
        return $this->hasMany(Items::class);
    }

    
    
}
