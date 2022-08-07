<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>
<body>

	<div class="panel-body">
		<table class="table table-bordered" id="myTable">
			<thead>
				<th>ID</th>
				<th>Registro</th>
				<th>Actualizado</th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->created_at}}</td>
							<td>{{$user->updated_at}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});

</script>



</body>
</html>