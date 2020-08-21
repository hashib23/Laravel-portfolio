@extends('layout/app')




@section('content')


<div class="container">
	<div class="row">

		<div class="col-md-3 mt-2 p-2">
			<div class="card">
				<div class="card-body">
					<h3 count-card-title>{{$TotalVisitor}}</h3>
					<h3 count-card-text>Total Visitor</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 mt-2 p-2">
			<div class="card">
				<div class="card-body">
					<h3 count-card-title>{{$TotalCourse}}</h3>
					<h3 count-card-text>Total Courses</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 mt-2 p-2">
			<div class="card">
				<div class="card-body">
					<h3 count-card-title>{{$TotalProject}}</h3>
					<h3 count-card-text>Total Projects</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 mt-2 p-2">
			<div class="card">
				<div class="card-body">
					<h3 count-card-title>{{$TotalService}}</h3>
					<h3 count-card-text>Total Services</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 mt-2 p-2">
			<div class="card">
				<div class="card-body">
					<h3 count-card-title>{{$TotalReview}}</h3>
					<h3 count-card-text>Total Reviews</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 mt-2 p-2">
			<div class="card">
				<div class="card-body">
					<h3 count-card-title>{{$TotalContact}}</h3>
					<h3 count-card-text>Total Contacts</h3>
				</div>
			</div>
		</div>
        <div class="col-md-3 mt-2 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 count-card-title>{{$TotalPhoto}}</h3>
                    <h3 count-card-text>Total Photo</h3>
                </div>
            </div>
        </div>

	</div>
</div>



@endsection
