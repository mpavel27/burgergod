<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function getDeliveryNameAttribute() {
        $delivery = User::where('id', $this->assigned_to)->first();
        if($delivery) {
            return $delivery->name;
        } else {
            return 'NULL';
        }
    }
}
