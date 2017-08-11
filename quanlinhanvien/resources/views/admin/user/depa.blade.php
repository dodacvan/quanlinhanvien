@extends('admin.user.haha')
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
						
                            </tr>
                        </thead>
                        <tbody>
					<?php $stt=0; ?>
					@foreach($data as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{!! ++$stt; !!}</td>
                                <td>{!! $item['name'] !!}</a></td>
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
					
     					@endforeach
                        </tbody>
                    </table>

@endsection()
