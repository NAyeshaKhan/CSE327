<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
   public function index(User $user)
    {
		$follows=(auth()->user()) ? auth()->user()->following->contains($user->id):false;
		
		$postCount=Cache::remember('counts.posts.'.$user->id,now()->addSeconds(10),
			function() use($user){
				return $user->posts->count();
			}
		);
		
		$followerCount=Cache::remember('counts.followers.'.$user->id,now()->addSeconds(10),
			function() use($user){
				return $user->profile->followers->count();
			}
		);
		
		$followingCount=Cache::remember('counts.following.'.$user->id,now()->addSeconds(10),
			function() use($user){
				return $user->following->count();
			}
		);
		
        return view('profiles.index',compact('user','follows','postCount','followerCount','followingCount'));
    } 
	
	public function edit(User $user)
    {
		$this->authorize('update',$user->profile);
		return view('profiles.edit',compact('user'));
    }

	public function update(User $user)
    {
		
		$this->authorize('update',$user->profile);
		
		$data=request()->validate([
		'title'=>'required',
		'description'=>'required',
		'url'=>'url',
		'image'=>'',
		]);  //grabs img
		
		
		
		if(request('image')){//if img is edited

			$imagePath=request('image')->store('profile','public');
			$image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
			$image->save();
			$imageArray=['image'=>$imagePath];
		}
		
		auth()->user()->profile->update(array_merge(
			$data,
			$imageArray ?? []
		));
		
		return redirect("/profile/{$user->id}");
    }

	
}
