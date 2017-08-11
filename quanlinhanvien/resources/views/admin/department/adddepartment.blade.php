@extends('admin.master')
@section('controller','Department')
@section('action','add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" class="form-control" name="txtDepartmentName" placeholder="Please Enter Department Name" />
                            </div>
					@if($errors->first('txtDepartmentName'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtDepartmentName') !!}
				    </div>
					@endif
                      
                            <div class="form-group">
                                <label>Office Phone</label>
                                <input type="text" class="form-control" name="txtphone" placeholder="Please Enter Office Phone" />
                            </div>
					@if($errors->first('txtphone'))
					<div class="alert alert-danger">
						{!! $errors->first('txtphone') !!}
					</div>
					@endif
				    <div class="form-group">
                                <label>Manager</label>
                                <select class="form-control" name="txtmanager">
						@foreach($manager as $item)
                            <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                        @endforeach
					  </select>
                            </div>
                            <button type="submit" class="btn btn-default">Add Department </button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
@endsection()
                