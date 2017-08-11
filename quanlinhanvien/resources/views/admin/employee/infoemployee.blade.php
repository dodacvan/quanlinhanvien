@extends('admin.master')
@section('controller','Employee')
@section('action','infomation')
@section('content')
<div id="container" class="container">
    <div class="row">
    	<div class="col-sm-offset-2 col-sm-2">
        <img src="{!! asset('public/admin/images/'.$data['photo']) !!}" class="img-responsive center-block" alt="Employee Photo"/>    
	</div>
    	<div class="col-sm-6">
        <table id="employee-list" class="table table-striped">
            <tr>
                <th>Name</th>
                <td>{!! $data['name'] !!}</td>
            </tr>
            <tr>
                <th>Department</th>
                <td>{!! $department['name'] !!}</td>
            </tr>
            <tr>
                <th>Job Title</th>
                <td>{!! $data['jobtitle'] !!}</td>
            </tr>
            <tr>
                <th>Cellphone</th>
                <td>{!! $data['cellphone'] !!}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{!! $data['email'] !!}</td>
            </tr>
        </table>
        <a href="{!! URL::previous() !!}" class="btn btn-default">Back</a>    
	</div>
    </div>
</div>
@endsection()
