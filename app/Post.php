<?php

namespace App;
use Carbon\Carbon;


class Post extends Model
{
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function user() // $post->user
  {
    return $this->belongsTo(User::class);
  }

  public function addComment($body)
  {
    $this->comments()->create(['body'=>$body]);
    // $this->comments()->create(compact('body'));
    // Comment::create([
    //     'body' => $body,
    //     'post_id' => $this->id,
    // ]);
  }

  // public function scopeFilter($query, $filters)
  // {
  //     if($month = $filters('month')) {
  //         $posts->whereMonth('created_at', Carbon::parse($month)->month);
  //     }

  //     if($year = $filters('year')) {
  //         $posts->whereYear('created_at', $year);
  //     }
  // }
  public function scopeFilter($query, $filters)
  {
    if (isset($filters['month'])) {
      $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
    }

    if (isset($filters['year'])) {
      $query->whereYear('created_at', $filters['year']);
    }

    if (isset($filters['recent'])) {
      $query->where( 'created_at', '>', Carbon::now()->subDays(14));
    }
  }

  public static function archives()
  {
    return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at) desc')
      ->get()
      ->toArray();
  }

  public function tags()
  {
    // 1 post may have many tags
    // any tag can apply to any post
    return $this->belongsToMany(Tag::class);
  }
}
