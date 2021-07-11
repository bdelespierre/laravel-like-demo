<?php

namespace App\Models;

use App\Contracts\Likeable;
use App\Models\Like;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like(Likeable $likeable): self
    {
        if ($this->hasLiked($likeable)) {
            return $this;
        }

        (new Like())
            ->user()->associate($this)
            ->likeable()->associate($likeable)
            ->save();

        return $this;
    }

    public function unlike(Likeable $likeable): self
    {
        if (! $this->hasLiked($likeable)) {
            return $this;
        }

        $likeable->likes()
            ->whereHas('user', fn($q) => $q->whereId($this->id))
            ->delete();

        return $this;
    }

    public function hasLiked(Likeable $likeable): bool
    {
        if (! $likeable->exists) {
            return false;
        }

        return $this->likes->contains(
            fn($like) => $like->likeable_type == get_class($likeable) && $like->likeable_id == $likeable->id
        );
    }
}
