<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 'image', 'address', 'description', 'event_type', 'price',
        'available_tickets', 'event_date', 'sold_tickets', 'event_date', 'refund', 'status'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'event_type');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
