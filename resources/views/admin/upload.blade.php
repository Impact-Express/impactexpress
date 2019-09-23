@extends('layouts.master')

@section('content')

    <form method="POST" action="/upload" enctype="multipart/form-data">
    	@csrf
        <div class="field">
            <label class="label">Tarif Name</label>
            <input type="text" name="name" required>
        </div>
    	<div class="field">
    		<div class="control">
    			<input type="file" name="tarif-upload" required>
    		</div>
    	</div>
    	<div class="field">
    		<button class="button is-link" type="submit">Upload</button>
    	</div>
    </form>

	{{-- @if (isset($records))
		@foreach($records as $record)
			@foreach ($record as $r)
				{{$r}}
			@endforeach
			<br>
			<hr>
			
		@endforeach
	@endif --}}

@endsection