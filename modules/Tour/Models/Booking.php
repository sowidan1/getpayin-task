<?php

namespace Modules\Tour\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const FEES = 100;
    protected $fillable = [
        'tour_id',
        'date',
        'adults',
        'children',
        'clean',
        'breakfast',
        'fees',
        'total_price',
        'status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address_line_1',
        'address_line_2',
        'country',
        'city',
        'state',
        'zip',
        'special_requirements',
    ];
}
