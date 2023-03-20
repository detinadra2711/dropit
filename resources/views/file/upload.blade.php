@extends('template')

@section('content')

		<link rel="stylesheet" href="{{ URL::asset('css/upload.css') }}">
	<body>
    <div class="container ">

		<div class ="col col-lg-8 ">
		<h3>Upload Dokumen</h3>
		<br>

		<form role="form" method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
			{{ csrf_field()}}
			{{-- <div class="form-group">
				<label>Kategori Dokumen</label>
				<select name="kategori_id" class="form-control" id="">
					@forelse ($kategori as $item)
						<option value="{{ $item->id }}">{{ $item->kategori }}</option>
					@empty
						<option value="">Document Not Found</option>
					@endforelse
				</select>
			</div> --}}

		<div class="form-group">
			<label for="exampleInputEmail1">Nama File</label>
			<input type="text"  name="nama_file" class="form-control" placeholder="Masukkan nama file">
		  </div>
		  <div class="form-grup">
			<label for="exampleInputEmail">Nomor Dokumen</label>
			<input type="text" name="nomor_dokumen" class="form-control" placeholder="Masukkan nomor dokumen">
		  </div>
		  <br>
		  <div class="form-grup">
			<label for="exampleInputEmail">Tanggal Dokumen</label>
			<input type="date" name="tgl_dokumen" class="form-control" placeholder="Masukkan Tanggal dokumen" >
		  </div>
		  <br>
		  <br>
		  <div class="form-grup">
			<label for="exampleInputEmail">Catatan</label>
			<input type="text" name="catatan" class="form-control" placeholder="Masukkan catatan" >
		  </div>
		  <br>
		  <label for="exmapleInputEmail">Upload Dokumen</label>
         <section class="jumbotron text-center">
			<div class="container">
				<div class="file-upload-wrapper" data-text="Pilih File Kamu!">
				  <input type="file" name="file" class="file-upload-field" value="">
				</div>

			</div>
		 </section>
		 <button type="submit" id="buttonUpload" class="btn btn-primary">Upload</button>

		</form>
		</div>

	  </div>

	  <br>
	  <br>
	  <br>
	</body>
@endsection