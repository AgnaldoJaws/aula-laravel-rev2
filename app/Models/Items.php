<?php

namespace App\Models;

use App\Tenant\TenantModels;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use TenantModels;

    protected $fillable = ['id','dish_id','payment_id','qtd','value','user_id'];

    public function scopeItem($query)
    {
        return $query->where('value',true);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
