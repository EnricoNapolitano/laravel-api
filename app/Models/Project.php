<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'slug', 'type_id'];

    // relation with Type model
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // relation with Technology model
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public function getDate($date_column){
        return Carbon::create($this->$date_column)->format('d/m/Y');
    }
}
