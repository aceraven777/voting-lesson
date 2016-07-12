<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['channel_id', 'title', 'link'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Assign user to link
     *
     * @param User $user
     * @return static
     */
    public static function from(User $user)
    {
        $link = new static;

        $link->user_id = $user->id;

        // TEMPORARY
        $link->channel_id = 1;

        return $link;
    }

    /**
     * @param $attributes
     * @return bool
     */
    public function contribute($attributes)
    {
        return $this->fill($attributes)->save();
    }
}
