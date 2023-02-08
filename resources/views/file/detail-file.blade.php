@extends('template')

@section('content')
	<body>
		
		<h3 align="center"><b>{{ $file->name }}</b></h3>
			<br>
		{{-- <center><embed src="{{ asset('dokumen/' . $file->url) }}#toolbar=0" width='60%' height='700px' /></center> --}}
		
    	<div class="container ">

		<div class ="col col-lg-8 ">

		<br><br>
		<form id="form-add-course" role="form" method="post" action="{{ route('update') }}" enctype="multipart/form-data">
			<input type="hidden" name="id" value="{{ $file->id}}">
			{{ csrf_field()}}

		<div class="form-group">
			<label for="exampleInputEmail1">Edit Nama File</label>
			<input type="text" class="form-control" placeholder="Masukkan nama file" name="nama_file" value = "{{$file->name}}">
		</div>
		<p>Tanggal Perubahan Terakhir: "{{$file->updated_at}}" </p>
		<p>User: {{ Auth::user()->name }}</p>
			@if (Auth::user()->bagian_id == 1)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 2)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/umper/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 3)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/yanmed/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 4)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/jangmed/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 5)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/keuangan
			/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 6)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/pengembangan/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 7)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/sdm/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 8)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/kom-keperawatan/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 9)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/kom-medik/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 10)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/kom-mutu/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 11)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/kom-nakes-lain/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@elseif (Auth::user()->bagian_id == 12)
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/kom-rekam-medik/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@else
				<p>Preview Dokumen: <a href="{{URL::asset('dokumen/other/'.$file->url)}}" target="_blank">{{$file->name}}</a> </p>
			@endif

         <section class="jumbotron text-center">
			<div class="container">


				<div class="file-upload-wrapper" data-text="Pilih File Kamu!">
				  <input name="file" type="file" class="file-upload-field" value="">
				</div>

			</div>
		 </section>
		 <button type="submit" id="buttonUpload" name="submit" value="update" class="btn btn-warning">Update</button>
		 <button type="submit" id="buttonUpload" name="submit" value="delete" class="btn btn-danger">Delete</button>
		 <a href="/list-file" class="btn btn-secondary">Kembali</a>
 
		</form>
		</div>

	  </div>

	</body>
@endsection