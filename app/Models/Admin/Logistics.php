<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Logistics extends Model
{
    protected $table = "logistics";
    const CREATED_AT = 'create_time';
    const UPDATED_AT = null;
    protected $fillable = ['company_name','logistics_num','order_num','state','contact_name','contact_mobile','contact_address','create_time'];
}