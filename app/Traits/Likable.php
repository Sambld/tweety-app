<?php


namespace App\Traits;


use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $builder )
    {
        return $builder->leftJoinSub('
            select tweet_id , sum(liked) likes , sum(!liked) dislikes from likes group by tweet_id
        ' , 'Likes' , function ($join) {
            $join->on('likes.tweet_id' , '=' , 'id');
        });
    }


    public function like(User $user  = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id,
            'tweet_id' => $this->id
        ],
            [
                'liked' => $liked
            ]);

    }

    public function dislike(User $user)
    {
        $this->like($user , false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id' , $user->id )->where('liked' , true)->exists();
    }
    public function isDislikedBy(User $user)
    {
        return $this->likes()->where('user_id' , $user->id )->where('liked' , false)->exists();
    }

    public function likesCount()
    {
        return $this->likes()->where('liked' , true)->count();
    }
    public function dislikesCount()
    {
        return $this->likes()->where('liked' , false)->count();
    }
}
