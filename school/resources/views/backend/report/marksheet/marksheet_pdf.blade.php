@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
		    <div class="row">		
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Manage <strong>MarkSheet PDF View</strong></h4>
                        </div>
                        <div class="box-body" style="border: solid 1px; padding: 10px;">                                             		
                            <div class="row">
                                <div style="float: right" class="col-md-2 text-center">
                                    <img src="{{ url('upload/easyschool.png') }}" style="width: 120px; height: 100px;">			
                                </div>

                                <div class="col-md-2 text-center">                                     
                                </div>

                                <div class="col-md-4 text-center" style="float: left;">
                                    <h4><strong>Easy Learning School</strong></h4>
                                    <h6><strong>Kolkata India</strong></h6>
                                    <h5><strong><u><i>Academic Transcript</i></u></strong></h5>
                                    <h6><strong>{{ $allMarks['0']['exam_type']['name'] }}</strong></h6>
                                    
                                </div>

                                <div class="col-md-12">
                                    <hr style="border: solid 1px; width: 100%; color: #ddd; margin-bottom: 0px;">
                                    <p style="text-align: right;"><u><i>Print Date: </i>{{ date('d M Y') }} </u></p>                                      
                                </div>			
                            </div><!--  end 1st row  --> 
                                
                            <div class="row"> <!-- start 2nd row -->
                                <div class="col-md-6">
                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8" cellspacing="2">
                                        @php
                                            $assign_student = App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
                                        @endphp
                                        <tr>
                                            <td width="50%">Student Id</td>
                                            <td width="50%">{{ $allMarks['0']['id_no'] }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Roll No</td>
                                            <td width="50%">{{ $assign_student->roll }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Name </td>
                                            <td width="50%">{{ $allMarks['0']['student']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Class</td>
                                            <td width="50%">{{ $allMarks['0']['student_class']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Session</td>
                                            <td width="50%">{{ $allMarks['0']['year']['name'] }}</td>
                                        </tr>                                               
                                    </table>                                      
                                </div> <!-- // end col md 6 -->
                                <div class="col-md-6">
                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8" cellspacing="2">
                                        <thead>
                                            <tr>
                                                <th> Letter Grade </th>
                                                <th> Marks Interval </th>
                                                <th> Grade Point </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allGrades as $mark)
                                            <tr>
                                            <td>{{ $mark->grade_name }}</td>
                                            <td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
                                            <td>{{ number_format((float)$mark->grade_point,2) }} - {{ ($mark->grade_point == 5)?(number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td>
                                            </tr> 
                                            @endforeach
                                        </tbody> 
                                    </table>
                                </div> <!-- // end col md 6 --> 
                            </div><!--  end 2st row  -->                          				 
                        </div>
                    </div>
                </div> <!-- // end first col 12 -->              
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->	  
    </div>
</div>

@endsection
