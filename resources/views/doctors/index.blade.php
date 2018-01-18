@extends('layouts.master')

@section('content')

<script>

	function selectById()
    {
	   var id = $("#ids").val();
	   window.location.href="http://localhost/laboratory/doctors/"+id;
	   
	}

	function percentage()
    {
	   var percentage = $("#percentage option:selected").text();
	   window.location.href="http://localhost/laboratory/doctors/"+percentage+"/search";	   
	}

	function selectByName()
    {
	   var name = $("#names option:selected").text();
	   window.location.href="http://localhost/laboratory/doctors/"+name+"/search";	   
	}

</script>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">
				
				<h3>Search Doctor</h3>
					<?php $arr = ['0' => 'id', '1' => 'name', '2' => 'percentage'];  ?>
				<div class="row">
					<div class="col-md-12">

						<div class="row">
							@foreach($arr as $a)
								<div class="col-md-4">
									<label> <strong> <?php echo strtoupper($a); ?> </strong></label>
									<div class="content-group-lg">
										<select class="select-minimum"
											 <?php 
												 switch($a)
												 {
													case "id":
														echo "id='ids'" . " " . "onchange='selectById()'"; 
													break;

													case "name":
														echo "id='names'" . " " . "onchange='selectByName()'"; 
													break;
													
													case "percentage":
														echo "id='percentage'" . " " . "onchange='percentage()'"; 
													break;
													
												 }
												  
											 ?>>
											<option value="0">Select Doctor</option>
											@if(App\Doctor::count() > 0)
												@foreach(App\Doctor::all() as $d)
													<option value="{{$d->id}}">{{$d->$a}}</option>
												@endforeach
											@endif
											
										</select>
									</div>
								</div>
							@endforeach

						</div>

					</div>
				</div>
				
				



			<a href="{{route('doctors.create')}}"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Doctors</h1>

			@if(App\Doctor::count() > 0)
				<!-- Column controlled child rows -->
					<div class="panel panel-flat">
						
						<table class="table datatable-responsive-column-controlled " id="doctors-table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Percentage</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

						@foreach($doctors as $doctor)
								<tr class="tr">
								  
									<td>{{ $doctor->id }}</td>
									<td>{{$doctor->name}}</td>
									<td>{{ $doctor->percentage }}</td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/doctors/{{ $doctor->id }}">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/doctors/{{ $doctor->id }}/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>
												
									</td>

									<td style="text-align: left;padding:0px;">
										{!! Form::open(['route' => ['doctors.destroy', $doctor->id], 'method' => 'DELETE']) !!}
										
										{{Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'])}}

										{!! Form::close() !!}
									</td>
									

								</tr>

							@endforeach
								
							</tbody>
						</table>

						

					</div>
					<!-- /column controlled child rows -->
					<div class="text-center">
						{{ $doctors->links() }}
					</div>
				@endif


					@include('partials.alerts')



								


				</div>
			</div>
		</div>
	</div>

	

@endsection


