@extends('admin.master')
@section('controller','Employee')
@section('action','edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
                        <form enctype="multipart/form-data" action="" method="POST">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="" value="{!! old('txtName',isset($data)?$data['name']:null) !!}" />
                            </div>
					@if($errors->first('txtName'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtName') !!}
				    </div>
					@endif
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtemail" placeholder="" value="{!! old('txtemail',isset($data)?$data['email']:null) !!}"/>
                            </div>
					@if($errors->first('txtemail'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtemail') !!}
				    </div>
					@endif
				
                            <div class="form-group">
                                <label>JobTitle</label>
                                <input class="form-control" name="txtJobtitle" placeholder="" value="{!! old('txtJobtitle',isset($data)?$data['jobtitle']:null) !!}"/>
                            </div>
					@if($errors->first('txtJobtitle'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtJobtitle') !!}
				    </div>
					@endif

                            <div class="form-group">
                                <label>Cellphone</label>
                                <input class="form-control" name="txtCellphone" placeholder="" value="{!! old('txtCellphone',isset($data)?$data['cellphone']:null) !!}"/>
                            </div>
					@if($errors->first('txtCellphone'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtCellphone') !!}
				    </div>
					@endif

                            <div class="form-group">
                                <label>Photo</label>
					<img src="{!! asset('public/admin/images/'.$data['photo']) !!}" style="width:128px;height:128px;">
                                <input type="file" name="fPhotos">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="belong_department">
						@foreach($depart as $item)
							<option value="{!! $item['id'] !!}" @if($item['id']==$data['id_depart']) {!! "selected" !!} @endif>{!! $item['name'] !!}</option>
						@endforeach
					  </select>

                            </div>
                            <button type="submit" class="btn btn-default">Employee Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
@endsection()
