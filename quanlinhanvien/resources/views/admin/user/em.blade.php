@extends('admin.user.haha')
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=0; ?>
					@foreach($data as $item)
					
                            <tr id="{!! ++$stt; !!}" class="odd gradeX" align="center">
                                <td>{!! $stt; !!}</td>
                                <td>{!! $item['name'] !!}</td>
                                <td>
						<?php
							$depart=DB::table('departments')->where('id',$item['id_depart'])->first();
							if($depart!=null)
							echo $depart->name; 
						?>
						
					   </td>
					<td>{!! $item['jobtitle'] !!}</td>
					<td>{!! $item['email'] !!}</td>					
     					@endforeach

                        </tbody>
                    </table>

@endsection()

