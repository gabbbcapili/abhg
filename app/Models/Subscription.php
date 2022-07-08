<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription';

    protected $fillable = ['user_id', 'plan_id', 'amount', 'currency', 'duration', 'expire_at', 'payment_reference_id', 'payment_method', 'status', 'name', 'email', 'phone'];

    public function getStatusDisplayAttribute(){
        if($this->status == 1){
            return 'Pending';
        }else if ($this->status == 2){
            return 'Completed';
        }
    }

}
