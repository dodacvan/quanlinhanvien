@extends('admin.master')
@section('controller','Employee')
@section('action','list')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Numerical Order</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Jobtitle</th>
                                <th>Email</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=0; ?>
					@foreach($data as $item)
					
                            <tr id="{!! ++$stt; !!}" class="odd gradeX" align="center">
                                <td>{!! $stt; !!}</td>
                                <td><a href="{!! URL::route('admin.employee.infoemployee',$item['id']) !!}">{!! $item['name'] !!}</a></td>
                                <td>
						<?php
							$depart=DB::table('departments')->where('id',$item['id_depart'])->first();
							if($depart!=null)
							echo $depart->name; 
						?>
						
					   </td>
					<td>{!! $item['jobtitle'] !!}</td>
					<td>{!! $item['email'] !!}</td>
                             <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('are you sure delete this')"   href="{!! URL::route('admin.employee.getdelete',$item['id']) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.employee.getedit',$item['id']) !!}">Edit</a></td>
                            </tr>
					
     					@endforeach

                        </tbody>
                    </table>
@endsection()