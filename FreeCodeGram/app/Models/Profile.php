<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{	
	protected $guarded=[];

	
	public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/120901150_700980383847579_425002817292120669_n.jpg';

        return '/storage/' . $imagePath;
    }
	
	public function followers(){
		return $this->belongsToMany(User::class);
	}
    
	public function user(){
		return $this->belongsTo(User::class);
	}
	
	
	
}
