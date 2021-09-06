<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateCampaign extends Model
{
    use HasFactory;

    protected $table = 'donates_campaigns';

    protected $fillable = [
        'amount',
        'order_desc',
        'status',
        'campaign_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
