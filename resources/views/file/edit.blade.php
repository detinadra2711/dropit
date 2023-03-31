@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{ $file->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('file.update', $file->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="nama_file" class="form-label">Edit Nama Dokumen</label>
                                <input type="text"
                                       class="form-control form-control-sm @error('nama_file') is-invalid @enderror"
                                       id="nama_file" name="nama_file"
                                       value="{{  old('nama_file') ?? $file->name }}" placeholder="Masukkan nama file">
                                @error('nama_file')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomor_dokumen" class="form-label">Edit Nomor Dokumen</label>
                                <input type="text"
                                       class="form-control form-control-sm @error('nomor_dokumen') is-invalid @enderror"
                                       id="nomor_dokumen"
                                       name="nomor_dokumen"
                                       value="{{ old('nomor_dokumen') ?? $file->nomor_dokumen }}"
                                       placeholder="Masukkan nomor dokumen">
                                @error('nomor_dokumen')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_dokumen" class="form-label">Tanggal Dokumen</label>
                                <input type="date" id="tgl_dokumen" name="tgl_dokumen"
                                       class="form-control form-control-sm @error('tgl_dokumen') is-invalid @enderror"
                                       value="{{ old('tgl_dokumen') ?? $file->tgl_dokumen }}"
                                       placeholder="Edit tanggal dokumen">
                                @error('tgl_dokumen')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Edit Catatan</label>
                                <input type="text"
                                       class="form-control form-control-sm @error('catatan') is-invalid @enderror"
                                       id="catatan" name="catatan"
                                       value="{{  $file->catatan }}" placeholder="Edit catatan">
                                @error('catatan')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                Preview Dokumen:
                                <a href="{{ URL::asset($file->url) }}" target="_blank">{{$file->name}}</a>
                            </div>

                            <div class="mb-3">
                                Edit Uploaded Dokumen:
                                <p style="color: red; font-size: 12px;">
                                    Required: Upload ulang dokumen!!
                                </p>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Dokumen</label>
                                <input class="form-control form-control-sm" type="file" id="formFile" name="file">
                            </div>

                            <div class="text-end">
                                <a href="{{ route('file.index') }}">
                                    <button type="button" class="btn btn-sm btn-secondary shadow">Kembali</button>
                                </a>
                                <button type="submit" name="submit" class="btn btn-sm btn-info shadow ms-1">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
