<!DOCTYPE html>
<html>
<head>
	<title>Business Promotion Council</title> 
	<style>
		table {
			/* border:1px solid #b3adad; */
			border-collapse:collapse;
			padding:5px;
		}
		table th {
			border:1px solid #b3adad;
			padding:5px;
			background: #f0f0f0;
			color: #313030;
		}
		table td {
			border:1px solid #b3adad;
			text-align:center;
			padding:5px;
			background: #ffffff;
			color: #313030;
		}

        .heading{
            text-align: center;
        }

      
	</style>
</head>
<body>
    <h3 style="text-align: center"><span style="color:maroon">Business Promotion Council</span></h3>
	<table>
		<thead>
		
		</thead>
		<tbody>
            @foreach($get_activities_by_council as $activities)

            
            <tr>
            
                <td colspan="4">{{ $activities->getCouncil->name }}</td>
                <td colspan="4">{{ $activities->activity_title }}</td>
            
            </tr>

            <tr>
                        
                <th>name</th>
                <th>phone</th>
                <th>email</th>
                <th>gender</th>
                <th>organization</th>
                <th>qualification</th>
                <th>designation</th>
                <th>covid_status</th>
        
            </tr>

            @foreach($activities->getTrainees as $row)

            <tr>
                        
                <td>{{ $row->name }}.</td>
                <td>{{ $row->phone }}.</td>
                <td>{{ $row->email }}.</td>
                <td>{{ $row->gender }}.</td>
                <td>{{ $row->organization }}.</td>
                <td>{{ $row->qualification }}.</td>
                <td>{{ $row->designation }}.</td>
                <td>{{ $row->covid_status }}.</td>
        
            </tr>

            @endforeach

        @endforeach
			
		</tbody>
	</table>
</body>
</html>