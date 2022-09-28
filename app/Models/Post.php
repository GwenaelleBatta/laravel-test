<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

const DEFAULT_SORT_ORDER = 'DESC';
const PER_PAGE = 6;

/**
 * App\Models\Post
 *
 * @method static paginate()
 * @method static find($id)
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $excerpt
 * @property string $thumbnail
 * @property string $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin \Eloquent
 */

class Post extends Model
{
//    public function latest() //
//    {
//        return DB::table('posts')->latest('published_at')->select('posts.id','posts.slug','posts.title','posts.excerpt','posts.published_at','posts.thumbnail','users.avatar', 'users.slug','users.name')->join('users', 'posts.user_id', '=', 'users.id')->limit(1)->get();
//    }
//
//    public function add_categories(\stdClass &$post)
//    {
//        $post->post_categories = $this->category_model->get_by_post($post->post_id);
//    }
//
//    public function get(array $filter = [], string $order = DEFAULT_SORT_ORDER, int $page = 1)
//    {
//        $posts = [];
//        $start = ($page - 1) * PER_PAGE;
//        $per_page = PER_PAGE;
//
//        if (isset($filter['type'])) {
//            $value = $filter['value'];
//            if ($filter['type'] === 'category') {
//                $category = $this->category_model->find_by_slug($value);
//                if ($category) {
//                    $posts = $this->get_by_category($category->id, $order, $start, $per_page);
//                }
//            } elseif ($filter['type'] === 'user') {
//                $user = $this->user_model->find_by_slug($value);
//                if ($user) {
//                    $posts = $this->get_by_user($user->id, $order, $start, $per_page);
//                }
//            }
//        } else {
//            $posts = $this->get_unfiltered($order, $start, $per_page);
//        }
//
//        $this->add_categories_to_many($posts);
//
//        return $posts;
//    }
//
//    public function get_unfiltered(string $order, int $start, int $per_page) //
//    {
//        return DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.*')->orderBy('published_at', $order)->offset($start)->limit($per_page)->get();
//    }
//
//    public function get_by_category(string $id, string $order, int $start, int $per_page) //
//    {
//        return DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->join('category_post', 'posts.id', '=', 'category_post.post_id')->select('posts.*', 'users.*')->where('category_post.category_id', '52495783-4114-45d5-94fe-07ee4f2de50b')->orderBy('published_at', $order)->offset($start)->limit($per_page)->get();
//    }
//
//    public function get_by_user(string $id, string $order, int $start, int $per_page) //
//    {
//        return DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.*')->where('posts.user_id', $id)->orderBy('published_at', $order)->offset($start)->limit($per_page)->get();
//    }
//
//    public function add_categories_to_many(array $posts)
//    {
//        foreach ($posts as $post) {
//            $post->post_categories = $this->category_model->get_by_post($post->post_id);
//        }
//    }
//
//    public function count()
//    {
//        return DB::table('posts')->count();
//    }
//
//    public function count_by_category(string $slug)
//    {
//        return DB::table('posts')->leftJoin('category_post', 'posts.id', '=', 'category_post.post_id')->leftJoin('categories', 'categories.id', '=', 'category_post.category_id')->where('categories.slug', $slug)->selectRaw('count(posts.id)')->get();
//    }
//
//    public function count_by_user(string $slug)
//    {
//        return DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->where('users.slug', $slug)->selectRaw('count(posts.id)')->get();
//    }
//
//    public function find_by_slug($slug)
//    {
//        return DB::table('posts')->where('slug', $slug)->get();
//    }
    use HasFactory, SoftDeletes;

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
