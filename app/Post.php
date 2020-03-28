<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
class Post extends Model
{   
    
    use Sluggable;
    
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        
        
    ];
   
    public function getCreatedAtAttribute($value)
    {
       $carbon = new Carbon($value); 
        return  $carbon->toDateString();
    }
   


    public function user(){
        return $this->belongsTo('App\User');
    }
   

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                
            ]
        ];
    }

}
