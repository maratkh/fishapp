<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class Post
 * @package App\Models
 * @property string $text
 * @property  Carbon/Carbon $created_at
 * @property  Carbon/Carbon $updated_at
 * @property Water $water
 * @property CommentPost[] $comments
 * @property LikePost[] $likes
 * @property integer $id
 * @property Fish[] $fishs
 * @property Carbon/Carbon $fishing_date
 * @property integer $rate
 * @property float $deep
 * @property float $water_temp
 */
class Post extends Model
{
    protected $fillable = ['text', 'water_id' ,'created_at', 'updated_at'];

    //Поле для того чтобы лара понимала что это локация
    protected $geofields = array('location');


    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function water ()
    {
        return $this->belongsTo(Water::class);
    }

    public function comments ()
    {
        return $this->hasMany(CommentPost::class, 'post_id', 'id');
    }

    public function commentsCount()
    {
        return $this->comments()
            ->selectRaw('post_id, count(*) as aggregate')
            ->groupBy('post_id');
    }

    public function likes()
    {
        return $this->hasMany(LikePost::class,'post_id', 'id');
    }

    public function userlike()
    {
        return $this->likes()->whereRaw('user_id='.Auth::user()->id.'');
    }

    public function likesCount()
    {
        return $this->likes()
            ->selectRaw('post_id, count(*) as aggregate')
            ->groupBy('post_id');
    }

    public function fishs()
    {
        return $this->belongsToMany(Fish::class, 'post_fish', 'post_id', 'fish_id');
    }

    public function setLocationAttribute($value) {
        $this->attributes['location'] = DB::raw("POINT($value)");
    }

    public function getLocationAttribute($value){

        $loc =  substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);

        return substr($loc,0,-1);
    }

    public function newQuery($excludeDeleted = true)
    {
        $raw='';
        foreach($this->geofields as $column){
            $raw .= ' astext('.$column.') as '.$column.' ';
        }

        return parent::newQuery($excludeDeleted)->addSelect('*',DB::raw($raw));
    }

    public function images()
    {
        return $this->hasMany(ImagePost::class,'post_id','id');
    }
}
