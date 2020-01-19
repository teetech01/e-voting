<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [ 'matric_no','full_name', 'dues','picture_url','password', 'political_post_id'];

    public function vote_count()
    {
        return $this->hasMany('App\VotingLog', 'aspirant_id')->count();
    }

    public function post()
    {
        return $this->hasOne('App\PoliticalPost', 'id', 'political_post_id');
    }
}
