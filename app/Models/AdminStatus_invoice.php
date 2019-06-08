<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStatus_invoice extends Model
{
    protected $table = 'status_invoice';
    public $primaryKey = 'status_invoice_id';
    public $timestamps = false;
}
