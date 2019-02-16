<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question()
    {
        # code...
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body); 

    }
    public static function boot()
    {
        parent::boot();

        static::created(function($answer){
            // echo"Answer Created\n";
            $answer->question->increment('answers_count'); 
            $answer->question->save(); 
        });
        // static::saved(function($answer){
        //     echo"Answer Saved\n";
        // });
    }
}
