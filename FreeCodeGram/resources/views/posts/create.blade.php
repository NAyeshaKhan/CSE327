@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/p" enctype="multipart/form-data" method="post"> 
		@csrf
		<div class="form-group row">
        <div class="col-7 offset-2">
		<h1>Add New Post</h1>
			 <label for="caption" class="col-form-label">Post Caption</label>

                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
				name="caption"
				value="{{ old('caption') }}" required 
				autocomplete="caption" autofocus>

                    @error('caption')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                
        </div>
		</div>
		<div class="form-group row">
			<div class="col-6 offset-2">
			<label for="image" class="col-form-label">Post your Image</label>
			<input type="file" class="form-control-file" id="image" name="image">
					@error('image')
						<strong>{{ $message }}</strong>
					 
					@enderror
			</div>
			<div class="row pt-4">
			<button class="btn btn-primary">Add New Post</button>
			
			</div>
		</div>  
	</form>
</div>
@endsection
