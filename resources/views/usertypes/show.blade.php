@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						
				<a href="{{route('usertypes.index')}}"><button class="btn btn-success pull-right" style="width:100px;margin-top:22px;"><i class="fa fa-arrow-circle-left"></i></button></a>
				<h1>User Type</h1>

				

					<div class="row"> 
					
						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											<td>{{ $usertype->id }}</td>
											<td>{{ $usertype->name }}</td>
											
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
									<dd>{{\Carbon\Carbon::parse($usertype->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{ \Carbon\Carbon::parse($usertype->updated_at)->diffForHumans() }}</dd>
								</dl>
										<hr>
								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('usertypes.edit', $usertype->id) }} class = "btn btn-primary btn-block">
										<i class="fa fa-edit"></i>
									</a>
										
									
									</div>
									<div class="col-sm-6">
									{!! Form::open(['route' => ['usertypes.destroy', $usertype->id], 'method' => 'DELETE']) !!}
										
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
