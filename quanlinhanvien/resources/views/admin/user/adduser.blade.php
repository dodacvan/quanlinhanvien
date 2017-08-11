@extends('admin.master')
@section('controller','User')
@section('action','add')
@section('content')

                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{!! old('txtUser') !!}"/>
                            </div>
					@if($errors->first('txtUser'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtUser') !!}
				    </div>
					@endif

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                            </div>
					@if($errors->first('txtPass'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtPass') !!}
				    </div>
					@endif

                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" value="{!! old('') !!}"/>
                            </div>
					@if($errors->first('txtRePass'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtRePass') !!}
				    </div>
					@endif

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail') !!}"/>
                            </div>
					@if($errors->first('txtEmail'))
                            <div class="alert alert-danger">
					{!! $errors->first('txtEmail') !!}
				    </div>
					@endif

                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1"  type="radio"> Master Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" checked="" type="radio">Normal Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                @endsection()