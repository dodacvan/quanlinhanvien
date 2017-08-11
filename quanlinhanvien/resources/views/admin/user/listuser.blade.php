@extends('admin.master')
@section('controller','User')
@section('action','list')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Numerical Order</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Level</th>
                               <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>
					<?php $stt=0; ?>
					@foreach($data as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{!! ++$stt; !!}</td>
                                <td>{!! $item['name'] !!}</a></td>
                                <td>{!! $item['email'] !!}</td>
                        <td>
                        @if($item['level']==1)
                            {!! "master admin" !!}
                        @else
                            {!! "normal admin" !!}
                        @endif
                        </td>
                             <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('are you sure delete this')" href="{!! URL::route('admin.user.getdelete',$item['id']) !!}"> Delete</a></td>
                                
                            </tr>
     					@endforeach
                        </tbody>
                    </table>

@endsection()
