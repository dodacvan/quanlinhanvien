@extends('admin.master')
@section('controller','Department')
@section('action','list')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Numerical Order</th>
                                <th>Name</th>
                                <th>Office Number</th>
                                <th>Manager</th>
						<th>Employee</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
					<?php $stt=0; ?>
					@foreach($data as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{!! ++$stt; !!}</td>
                                <td><a href="{!! URL::route('admin.department.infodepart',$item['id']) !!}">{!! $item['name'] !!}</a></td>
                                <td>{!! $item['officephone'] !!}</td>
                                <td>
						@if($item['manager']==0)
							{!! "none" !!}
						@else
						<?php
							$manager=DB::table('employees')->where('id',$item['manager'])->first();
							if($manager!=null)
							echo $manager->name; 
						?>
						@endif
						
					   </td>
					<td class="center"><i class="btn btn-info"><a href="{!! URL::route('admin.employee.getlistofdepart',$item['id']) !!}"> Employee</i></a></td>
                             <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('are you sure delete this')" href="{!! URL::route('admin.department.getdelete',$item['id']) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.department.getedit',$item['id']) !!}">Edit</a></td>
                            </tr>
     					@endforeach
                        </tbody>
                    </table>

@endsection()