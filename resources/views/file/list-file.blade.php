@extends('template')

@section('content')

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

	<script>
		$(document).ready( function () {
			$('#list-file').DataTable();
		} );
	</script>

	<body>

      <div class="container ">
		{{-- <h1> Selamat Datang di DropBix {{ Auth::user()->name }}!</h1> --}}

		<div class ="col col-lg-8 ">
		<h3>List Dokumen: </h3>
			<br>
		<br>
		 <table id="list-file" class="display">
			<thead>
			  <tr>
				<th>Nama Dokumen</th>
				<th>Nomor Dokumen</th>
				<th>Tanggal Dokumen</th>
				<th>Tanggal Perubahan Terakhir</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			@foreach($files as $file)
				<tr>
				<td>{{$file->name}}</td>
				<td>{{ $file->nomor_dokumen }}</td>
				<td>{{ $file->tgl_dokumen }}</td>
				<td>{{$file->updated_at}}</td>
				<td>
					<a href="{{route(('detail-file'), $file->id)}}"><button type="submit">Edit</button></a>
				</td>
			  </tr>
			@endforeach
			</tbody>
		  </table>

		</div>

	  </div>

	  <br>
	  <br>
	  <br>
	  <br>
	</body>
@endsection