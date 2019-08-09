@extends('layouts.master')

 @section('content')


<div class="container">
	<div class="row mt-5">
 		<div class="col-md-6">

 			<!--@if($errors->any())
 				@foreach($errors->all() as $error)
 					<div class="alert alert-danger"> 
 						{{ $error }}
 					</div>

 				@endforeach

 			@endif
 		-->
 				
 				@if(session()->has('msg'))
 					<div class="alert alert-success">
 						{{ session()->get('msg') }}
 					</div>

 				@endif


			<div class="card">
  				<h5 class="card-header">Add Task</h5>
  				<div class="card-body">
    				<form action="{{ route('task.create') }}" method="post">

    					@csrf
    					<div class="form-group">
    						<label for="task">
    							Task
    						</label>
    						<input type="text" id="task" name="title" placeholder="Task" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
    						<div class="invalid-feedback">
    							Please enter a task.
    						</div>


    					</div>
    					<div class="form-group">
    						<button type="submit" class="btn btn-primary">Submit</button>
    					</div>
    					
    				</form>

  				</div>
			</div>
  		</div>
	</div>
</div>

<div class="container">
	<div class="row mt-5">
 		<div class="col-md-6">
			<div class="card">
  				<h5 class="card-header">View Task</h5>
  				<div class="card-body">
    				<table class="table table-bordered">

    					<tr>
    						<th>Task</th>
    						<th>Action</th>
    					</tr>
    					
    				
    					@foreach($tasks as $task)
 	    					<tr>
	    						<td style="width: 30em;">{{ $task->title }}</td>
	    					
	    						<td>
	    							<form action="{{ route('task.destroy', $task->id) }}" method="post">
	    								@csrf
	    								@method('delete')
	    								<button type="submit" class="btn btn-danger btn- sm">Delete</button>
									</form>
	    							
	    							
	    						</td>	
	    					</tr>
    					@endforeach

    				</table>


  				</div>
			</div>
  		</div>
	</div></div>

 @endsection