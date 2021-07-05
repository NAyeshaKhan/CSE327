@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-2 justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<h1>Classes</h1>
				<p>{{ $user->name }}</p>
				<p>{{ $user->profile->student_id }}</p>
					<img src="https://media.istockphoto.com/photos/green-leaf-with-dew-on-dark-nature-background-picture-id1050634172?k=6&m=1050634172&s=612x612&w=0&h=C6CWho9b4RDhCqvaivYOLV2LK6FzygYpAyLPBlF1i2c=" class="w-50 rounded-circle">
				
				<a href="#">Edit Profile</a>
                <div class="card-header">{{ __('Dashboard') }}</div>
				
				</div>
        </div>
    </div>
</div>
@endsection
