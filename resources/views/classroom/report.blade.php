@foreach ($classroom->students as $student)
<!DOCTYPE html>

<html>
	
<head>
<style>
	table, td, th, label {
	border: 1px solid black;
	}

	table {
	border-collapse: solid black;
	width: 80%;
	}

	th {
	height: 140px;
	
	}
	td{
	width: 8px;
	margin-left: 0px;

	}
	p{
	font-size:10px;
	}
	td{
	font-size:13px;
	}
	h1{
	font-size:25px;
	}
	label{
	margin-left: 15px
	}
	input{
	margin-left: 15px
	}

	@page {
        size: a4 landscape; 
        margin:0.9;padding:0.9; // you can set margin and padding 0 
      }
	  @media print {
		.noprint { display: none; }
		}

	body{
		font-family: 'Times New Roman', Times, serif
		letter-spacing: normal;
	}
</style>
</head>

	<body style="margin-left: 20px; margin-right: 20px;">
	{{-- <div class="d-flex justify-content-end mb-4">
		<a class="btn btn-primary" href="{{ route('download',$classroom->id) }}" target="blank">Export to PDF</a>
	</div> --}}
	
		<table style="width:100%;table-layout:fixed; border: 1px solid black; margin-right:10px">
		<tr style="width:100%;height:50%">
		<th colspan="16">
		<div style="text-align:left">
		<p style="font-size:13px;">REPUBLIC OF RWANDA<br>MINISTRY OF EDUCATION<BR>
		{{ $classroom->archive->school->location }}<BR>{{ $classroom->archive->school->name }}<BR>TEL: {{$classroom->archive->school->phone}}<BR>E-MAIL: {{$classroom->archive->school->email}}
		<H1 style="text-align:center">STUDENT REPORT FORM</H1></p>
		</div> 
		</th>
		</tr>
		
		<tr> 
		<th colspan="16">
		<div style="text-align:left; font-family: 'Times New Roman', Times, serif;letter-spacing: 2px;">
		Student's Name: {{ $student->name }} <br>
		&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; School Year: <br>
		Student's Number: {{ $student->st_code }} <br>
		Sex: <br>

		Class:{{ $classroom->name }} <br>
		Combination: <br>
		</tr>
		</th>
		</div> 
		
		<tr>
		
			<td rowspan="2">subject</td>
			<td colspan="3">Max point</td>
			<td colspan="3">1st term</td>
			<td colspan="3">2nd term</td>
			<td colspan="3">3rd term</td>
			<td colspan="3">Anual</td></tr>
			<tr>
			
			<td style="width: 3%">Test</td>
			<td style="width: 3%">Ex</td>
			<td style="width: 3%">Tot</td>
			<td style="width: 3%">Test</td>
			<td style="width: 3%">Ex</td>
			<td style="width: 3%">Tot</td>
			<td style="width: 3%">Test</td>
			<td style="width: 3%">Ex</td>
			<td style="width: 3%">Tot</td>
			<td style="width: 3%">Test</td>
			<td style="width: 3%">Ex</td>
			<td style="width: 3%">Tot</td>
			<td style="width: 3%">MAX</td>
			<td style="width: 3%">Tot</td>
			<td style="width: 3%">%</td>
			</tr>
			<tr>
			<td style="width: 3%">Behavior</td>
			<td colspan="3" style="text-align:right">120</td>
			<td colspan="3" style="text-align:right"></td>
			<td colspan="3"style="text-align:right"></td>
			<td colspan="3"style="text-align:right"></td>
			
			<td style="text-align:right"></td>
			<td style="text-align:right"></td>
			<td style="text-align:right"></td>
			@foreach ($classroom->courses as $course)
				
				<tr>
					<td>{{ $course->title }}</td><td>{{ $course->max }}</td><td>{{ $course->max }}</td><td>{{ $course->max *2 }}</td>
					{{-- @foreach ($student->marks as $mark)
						@if ($mark->test->term=='Term 1' && $mark->test->type=="Test" && $mark->test->course_id==$course->id)
							<td>{{ $test_term1 = $mark->marks }}</td>
						@else
							<td>@php $test_term1 =0 @endphp -</td>
						@endif

						@if ($mark->test->term=='Term 1' && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)
							<td>{{ $exam_term1 = $mark->marks }}</td>
						@else
							<td>@php $exam_term1 =0 @endphp-</td>
						@endif
						<td>{{$totoal_term1= $test_term1+$exam_term1}}</td>
						<!-- End of term1 -->
						@if ($mark->test->term=='Term 2' && $mark->test->type=="Test" && $mark->test->course_id==$course->id)
							<td>{{ $test_term2 = $mark->marks }}</td>
						@else
							<td>@php $test_term2 =0 @endphp -</td>
						@endif
						@if ($mark->test->term=='Term 2' && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)
							<td>{{ $exam_term2 = $mark->marks }}</td>
						@else
							<td>@php $exam_term2 =0 @endphp-</td>
						@endif
						<td>{{$totoal_term2= $test_term2+$exam_term2}}</td>

						<!-- End of term2 -->
						@if ($mark->test->term=='Term 3' && $mark->test->type=="Test" && $mark->test->course_id==$course->id)
							<td>{{ $test_term3 = $mark->marks }}</td>
						@else
							<td>@php $test_term3 =0 @endphp -</td>
						@endif
						@if ($mark->test->term=='Term 3' && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)
							<td>{{ $exam_term3 = $mark->marks }}</td>
						@else
							<td>@php $exam_term3 =0 @endphp-</td>
						@endif
						<td>{{$totoal_term3= $test_term3+$exam_term3}}</td>

						<!-- End of term3 -->
						<!-- Course annual total -->
						<td>{{$course_max_annual =$course->tests->sum('max')}} </td><td>{{$course_total_annual=$totoal_term1+$totoal_term2+$totoal_term3}} </td><td>@if($course_max_annual!=0) {{ $course_annual_perc = ($course_total_annual/$course_max_annual) *100}} @else - @endif</td>
					@endforeach --}}
					@php
						$test1 =null;
						$ex1=null;
					@endphp
					@if ($student->marks->count() !=0)
						@foreach ($student->marks as $mark)
							@php
								$blank=true;
							@endphp
							@if($mark->student_id==$student->id && $mark->test->term=="Term 1" && $mark->test->type=="Quiz" && $mark->test->course_id==$course->id)<td>{{$test1=$mark->marks}} @php $blank=false @endphp @break </td>  @endif
						@endforeach
						@if ($blank==true) <td>-</td> @endif
					@else
						<td>-</td>
					@endif

					
					@if ($student->marks->count() !=0)
						@foreach ($student->marks as $mark)
							@php
								$blank=true;
							@endphp
							@if($mark->student_id==$student->id && $mark->test->term=="Term 1" && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)<td>{{$ex1=$mark->marks}} @php $blank=false @endphp @break </td>  @endif
						@endforeach
						@if ($blank==true) <td>-</td> @endif
					@else
						<td>-</td>
					@endif

					<td> 
						@if ($test1 ==null && $ex1 ==null)
							@php
								$total1=null
							@endphp -
						@elseif ($test1 == null && $ex1 !=null)
							{{$total1=$ex1}}
						@elseif ($test1!=null && $ex1==null)
							{{$total1=$test1}}
						@else
							{{$total1=$test1+$ex1}}
						@endif
					</td>

					@if ($term==2 || $term==3)
						
						@php
							$test2 =null;
							$ex2=null;
						@endphp
						@if ($student->marks->count() !=0)
							@foreach ($student->marks as $mark)
								@php
									$blank=true;
								@endphp
								@if($mark->student_id==$student->id && $mark->test->term=="Term 2" && $mark->test->type=="Quiz" && $mark->test->course_id==$course->id)<td>{{$test2=$mark->marks}} @php $blank=false @endphp @break </td>  @endif
							@endforeach
							@if ($blank==true) <td>-</td> @endif
						@else
							<td>-</td>
						@endif

						@if ($student->marks->count() !=0)
							@foreach ($student->marks as $mark)
								@php
									$blank=true;
								@endphp
								@if($mark->student_id==$student->id && $mark->test->term=="Term 2" && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)<td>{{$ex2=$mark->marks}} @php $blank=false @endphp @break </td>  @endif
							@endforeach
							@if ($blank==true) <td>-</td> @endif
						@else
							<td>-</td>
						@endif

						<td> 
							@if ($test2 ==null && $ex2 ==null)
								@php
									$total2=null
								@endphp -
							@elseif ($test2 == null && $ex2 !=null)
								{{$total2=$ex2}}
							@elseif ($test2!=null && $ex2==null)
								{{$total2=$test2}}
							@else
								{{$total2=$test2+$ex2}}
							@endif
						</td>
					@else
					<td></td> <td></td> <td></td> @php
						$total2=null
					@endphp
					@endif

					<!-- Term 3 starts -->
					@if ($term==3)
						
						@php
							$test3 =null;
							$ex3=null;
						@endphp
						@if ($student->marks->count() !=0)
							@foreach ($student->marks as $mark)
								@php
									$blank=true;
								@endphp
								@if($mark->student_id==$student->id && $mark->test->term=="Term 3" && $mark->test->type=="Quiz" && $mark->test->course_id==$course->id)<td>{{$test3=$mark->marks}} @php $blank=false @endphp @break </td>  @endif
							@endforeach
							@if ($blank==true) <td>-</td> @endif
						@else
							<td>-</td>
						@endif

						@if ($student->marks->count() !=0)
							@foreach ($student->marks as $mark)
								@php
									$blank=true;
								@endphp
								@if($mark->student_id==$student->id && $mark->test->term=="Term 3" && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)<td>{{$ex3=$mark->marks}} @php $blank=false @endphp @break </td>  @endif
							@endforeach
							@if ($blank==true) <td>-</td> @endif
						@else
							<td>-</td>
						@endif

						<td> 
							@if ($test3 ==null && $ex3 ==null)
								@php
									$total3=null
								@endphp -
							@elseif ($test3 == null && $ex3 !=null)
								{{$total3=$ex3}}
							@elseif ($test3!=null && $ex3==null)
								{{$total3=$test3}}
							@else
								{{$total3=$test3+$ex3}}
							@endif
						</td>
					@else
					<td></td> <td></td> <td></td>@php
						$total3=null
					@endphp
					@endif

					<!-- Annual starts -->
					<td>{{$course_annual=$course->max * 3}}</td> <td>{{ $annual_mark=$total1+ $total2 + $total3}} </td> <td>@if($course_annual!=0) {{round(($annual_mark/$course_annual*100),2)}} @else 0 @endif</td>
					{{-- @foreach ($student->marks as $mark)
						@if($mark->student_id==$student->id && $mark->test->term=="Term 1" && $mark->test->type=="Quiz" && $mark->test->course_id==$course->id)<td>{{$test1=$mark->marks}}</td>@endif
						@php
							if($check=$mark->student_id==$student->id && $mark->test->term=="Term 1" && $mark->test->type=="Exam")
							{
								if($mark->test->course_id==$course->id){
									$ex1=$mark->marks;
								}
								else {
									$ex1="-";
								}
								echo"<td>{$ex1}</td>";
								break;
							}
						@endphp
					@endforeach --}}
					{{-- <td></td> --}}
					
					{{-- @foreach ($student->marks as $mark)
						@if($mark->student_id==$student->id && $mark->test->term=="Term 1" && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)<td>{{$exam1=$mark->marks}}</td>@endif
					@endforeach --}}

					{{-- <td>{{$test1+$exam1}}</td> --}}
					
					{{-- @foreach ($student->marks as $mark)
						@if($mark->student_id==$student->id && $mark->test->term=="Term 2" && $mark->test->type=="Quiz" && $mark->test->course_id==$course->id)<td>{{$test2=$mark->marks}}</td>@endif
					@endforeach

					@foreach ($student->marks as $mark)
						@if($mark->student_id==$student->id && $mark->test->term=="Term 2" && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)<td>{{$exam2=$mark->marks}}</td>@endif
					@endforeach
					<td>-</td>

					@foreach ($student->marks as $mark)
						@if($mark->student_id==$student->id && $mark->test->term=="Term 3" && $mark->test->type=="Quiz" && $mark->test->course_id==$course->id)<td>{{$test3=$mark->marks}}</td>@endif
					@endforeach

					@foreach ($student->marks as $mark)
						@if($mark->student_id==$student->id && $mark->test->term=="Term 3" && $mark->test->type=="Exam" && $mark->test->course_id==$course->id)<td>{{$exam3=$mark->marks}}</td>@endif
					@endforeach
					<td>-</td> --}}
					{{-- <td>{{$student->marks->join('tests', 'marks.test_id', '=', 'tests.id')
						->join('courses', 'tests.course_id', '=', 'courses.id')
						->where('tests.term','Term 1')->where('test.type','Quiz')->first()->marks}}</td> --}}
					
				</tr>
				{{-- @foreach ($course->tests as $test)
					<tr>
						<td width=25%>{{ $course->title }}</td><td></td><td></td><td>{{ $test->max }}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					</tr>
				@endforeach --}}
			@endforeach
			</tr>
			
			<tr>
			<td>Total</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
			<td colspan="4">%</td><td colspan="3"style="text-align:right">%</td><td colspan="3"style="text-align:right">%</td><td colspan="3"style="text-align:right">%</td><td colspan="3"style="text-align:right">%</td>
			</tr>
			<tr>
			<td colspan="4">Position</td><td colspan="3"style="text-align:center"></td><td colspan="3"style="text-align:center"></td><td colspan="3"style="text-align:center"></td><td colspan="3"style="text-align:center"></td>
			</tr>
			<tr style="height:20%">
			<td colspan="4">Teacher's signature</td>
			
			<td colspan="3"> @if($classroom->tutor && $classroom->tutor->signature !=Null) <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('signatures/'.$classroom->tutor->signature))) }}" alt="marks bill" height="20" width="50"> @endif</td> 
			<td colspan="3">@if($classroom->tutor && $classroom->tutor->signature !=Null)<img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('signatures/'.$classroom->tutor->signature))) }}" alt="marks bill" height="20" width="50">@endif</td>
			<td colspan="3">@if($classroom->tutor && $classroom->tutor->signature !=Null)<img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('signatures/'.$classroom->tutor->signature))) }}" alt="marks bill" height="20" width="50">@endif</td>
			<td colspan="3">@if($classroom->tutor && $classroom->tutor->signature !=Null)<img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('signatures/'.$classroom->tutor->signature))) }}" alt="marks bill" height="20" width="50">@endif</td>
			</tr>
			<tr>
			<td colspan="4">Parent's signature</td>
			
			<td colspan="3"></td>
			<td colspan="3"></td>
			<td colspan="3"></td>
			<td colspan="3"></td>
			</tr>
			<tr style="">
				<th colspan="16" style="width: 100%;height:20%">
					<table style="table-layout:fixed; border: 1px solid black;">
						<tr style="height:100%">
						<td style="text-align:left;" >
						End of YearEvaluation and Decision<br>
						1.  Promoted <br>
						2.  Advised to Repeat<br>
						3.  Discontinued

						</td>
						<td style=""> Done at {{ $classroom->archive->school->location }} {{date('d-m-Y')}}<br>
						Headmaster  <br>
						(stamp and signature)<br>
						{{-- <img src="{{ asset('stamps/' . $classroom->school->stamp) }}" alt="stamp" height="50px"/> --}}
						{{-- <img src="{{ asset('stamps/202207242157profile2.jpg') }}" alt="stamp" height="50px"/> --}}
						@if($classroom->archive->school->user->signature !=null) <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('signatures/'.$classroom->archive->school->user->signature))) }}" alt="mark bill" height="100"> @endif
						@if($classroom->archive->school->stamp !=null) <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('stamps/'.$classroom->archive->school->stamp))) }}" alt="mark bill" height="100">@endif
						{{-- {{$classroom->school->stamp}} --}}
						{{$classroom->archive->school->director}}
						</td>
						</tr>
					</table>
				</th>
			</tr>
		</table>
	
	</body>

</html>
@endforeach
  
     