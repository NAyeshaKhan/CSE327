<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
	
	protected $guarded=[];
	
	public function abilities(){
		
		return $this->belongsToMany(Ability::class)->withTimestamps();
	}//1 role can have/belong to?? many abilities
	
	public function allowTo($ability){
		if(is_string($ability)){
			$ability=Ability::whereName($ability)->firstOrFail();
		}
		$this->abilities()->sync($ability,false);
		
	}
	
}
