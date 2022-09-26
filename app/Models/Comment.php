<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $user_id
 * @property int $post_id
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Post $post
 */

class Comment extends Model
{
    use HasFactory;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

//    public function get()
//    {
//        return DB::table('comments')->get();
//    }
//    public function get_by_post($id)
//    {
//        return DB::table('comments')->join('posts','post_id','=','posts.id')->where('post_id',$id)->select('comments.*')->get();
//    }
//    public function get_by_user($id)
//    {
//        return DB::table('comments')->join('users','user_id','=','users.id')->where('user_id',$id)->select('comments.*')->get();
//    }
//    public function avg_by_ratings($slug)
//    {
//        return DB::table('comments')->join('posts','post_id','=','posts.id')->where('posts.slug',$slug)->selectRaw('round(avg(comments.rating))')->get();
//    }
//
//    public function deleteComment($id)
//    {
//        DB::table('comments')->where('id',$id)->delete();
//    }
//
//    // Revoir update
//    public function updateComment($comment)
//    {
//        return DB::table('comments')->where("id",$comment['id'])->updateOrInsert([
//            'id' => $comment['id'],
//            'body' => $comment['body'],
//            'ratings' => $comment['rating']
//        ]);
//    }
}
