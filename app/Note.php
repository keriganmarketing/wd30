<?php

namespace App;

use App\Lead;
use App\Note;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lead_id', 'message'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['diff'];

    /**
     * A note belongs to a lead.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    /**
     * Scope a query to only include notes for the lead.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForLead($query, $id)
    {
        return $query->where('lead_id', $id)->orderBy('updated_at', 'DESC');
    }

    /**
     * Get the created_at time difference in a human-readable format
     *
     * @return string
     */
    public function getDiffAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
