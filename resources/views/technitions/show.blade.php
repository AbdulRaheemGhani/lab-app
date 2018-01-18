@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						
				<a href="{{route('technitions.index')}}"><button class="btn btn-success pull-right" style="width:100px;margin-top:22px;"><i class="fa fa-arrow-circle-left"></i></button></a>
				<h1>Technition</h1>

				

					<div class="row"> 
					
						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Created</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											<td>{{ $technition->id }}</td>
											<td>{{ $technition->name }}</td>
											<td>{{ \Carbon\Carbon::parse($technition->created_at)->diffForHumans() }}</td>
										</tr>

									</tbody>
								</table>

							</div>
							<!-- /column controlled child rows -->
						</div>
						

						<div class="col-md-4">
							<div class="well">
								<dl class="dl-horizontal">
									<dt>Created:</dt>
									<dd>{{\Carbon\Carbon::parse($technition->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{ \Carbon\Carbon::parse($technition->updated_at)->diffForHumans() }}</dd>
								</dl>
										<hr>
								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('technitions.edit', $technition->id) }} class = "btn btn-primary btn-block">
										<i class="fa fa-edit"></i>
									</a>
										
									
									</div>
									<div class="col-sm-6">
									{!! Form::open(['route' => ['technitions.destroy', $technition->id], 'method' => 'DELETE']) !!}
										
									{{Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-block'])}}

									{!! Form::close() !!}
									</div>	
								</div>

							</div>
						</div>

					</div>




								


				</div>
			</div>
		</div>
	</div>



@endsection
