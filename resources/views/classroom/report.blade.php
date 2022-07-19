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
</style>
</head>

<body>
	<div class="d-flex justify-content-end mb-4">
		<a class="btn btn-primary" href="{{ route('download',$classroom->id) }}" target="blank">Export to PDF</a>
	</div>
	@foreach ($classroom->students as $student)
		<table style="width:100%;table-layout:fixed; border: 1px solid black;">
		<tr style="width:100%;height:50%">
		<th colspan="16">
		<div style="text-align:left">
		<p style="font-size:13px;">REPUBLIC OF RWANDA<br>MINISTRY OF EDUCATION<BR>
		{{ $classroom->school->location }}<BR>{{ $classroom->school->name }}<BR>TEL:.....<BR>E-MAIL:.....
		<H1 style="text-align:center">STUDENT REPORT FORM</H1></p>
		</div> 
		</th>
		</tr>
		
		<tr> 
		<th colspan="16">
		<div style="text-align:left">
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
			
			<td>Test</td>
			<td>Ex</td>
			<td>Tot</td>
			<td>Test</td>
			<td>Ex</td>
			<td>Tot</td>
			<td>Test</td>
			<td>Ex</td>
			<td>Tot</td>
			<td>Test</td>
			<td>Ex</td>
			<td>Tot</td>
			<td>MAX</td>
			<td>Tot</td>
			<td>%</td>
			</tr>
			<tr>
			<td>Behavior</td>
			<td colspan="3" style="text-align:right">120</td>
			<td colspan="3" style="text-align:right"></td>
			<td colspan="3"style="text-align:right"></td>
			<td colspan="3"style="text-align:right"></td>
			
			<td style="text-align:right"></td>
			<td style="text-align:right"></td>
			<td style="text-align:right"></td>
			@foreach ($classroom->courses as $course)
			<tr><td width=25%>{{ $course->title }}</td><td>{{ $course->max }}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
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
			
			<td colspan="3"></td> 
			<td colspan="3"></td>
			<td colspan="3"></td>
			<td colspan="3"></td>
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
						<td style=""> Done at ...............<br>
						Headmaster<br>
						(stamp and signature)<br>
						BARANYERETSE Noel
						</td>
						</tr>
					</table>
				</th>
			</tr>
		</table>
	@endforeach
</body>

</html>

  
     