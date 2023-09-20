<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'complain';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'phone',
        'employeeID',
        'userID',
        'service',
        'subject',
        'report_detail',
        'request_detail',
        'appoinment_date',
    ];
}
