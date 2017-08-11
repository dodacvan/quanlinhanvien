@extends('admin.master')
@section('controller','Department')
@section('action','infomation')
@section('content')
<div id="container" class="container">
    <div class="row">
    	<div class="col-xs-12">
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <td>{!! $data['name'] !!}</td>
            </tr>
            <tr>
                <th>Office Phone</th>
                <td>{!! $data['officephone'] !!}</td>
            </tr>
            <tr>
                <th>Manager</th>
                <td>{!! $manager['name'] !!}</td>
            </tr>
        </table>
        <a href="{!! URL::previous() !!}" class="btn btn-default">Back</a>   
	 </div>
     </div>
</div>
@endsection()

