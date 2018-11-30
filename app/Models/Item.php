<?php

namespace App\Models;

use App\Tenant\TenantModels;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use TenantModels;

    protected $fillable = ['qtd','value','payment_id'];

    public function scopeItem($query)
    {
        return $query->where('value',true);
    }

    public function payment()    {
        return $this->belongsTo(Payment::class);
    }

}
