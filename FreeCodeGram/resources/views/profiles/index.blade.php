@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-3 p-5">
		<img src="https://images.pexels.com/photos/704569/pexels-photo-704569.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" style="height:180px;" class="rounded-circle">
		</div>
		<div class="col-9 pt-5">
			<div  class="d-flex justify-content-between align-items-baseline">
				 <h1>{{ $user->username }}</h1>
				 @can('update',$user->profile)
				 <a href="/p/create">Add New Post</a>
				 @endcan
			</div>
			@can('update',$user->profile)
			<a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
			@endcan
			<div class="d-flex">
			
				<div class="pr-3"><strong>{{ $user->posts->count() }} </strong>Posts</div>
				<div class="pr-3"><strong>3 </strong>Followers</div>
				<div class="pr-3"><strong>4 </strong>Following</div>
			</div>
			<div class="pt-4 font-weight-bold">{{  $user->profile->title }}</div> 
			<div>{{ $user->profile->description }}</div> <!--$user->profile? $user->profile->description:""-->
			<div><a href="#">{{ $user->profile->url ?? "N/A"}}</a></div>
		</div>
	</div>

<div class="row pt-2">
		@foreach($user->posts as $post)
		<div class="col-4 pb-2">
		<a href="/p/{{$post->id}}">
			<img src="/storage/{{ $post->image }}" class="w-100">
		</a>	
		</div>
		@endforeach
</div>
</div>
@endsection
