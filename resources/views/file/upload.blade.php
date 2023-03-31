@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Upload Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_file" class="form-label">Nama File</label>
                                <input type="text"
                                       class="form-control form-control-sm @error('nama_file') is-invalid @enderror"
                                       id="nama_file"
                                       name="nama_file"
                                       value="{{ old('nama_file') }}"
                                       placeholder="Masukkan nama file">
                                @error('nama_file')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                <input type="text" id="nomor_dokumen" name="nomor_dokumen"
                                       value="{{ old('nomor_dokumen') }}"
                                       class="form-control form-control-sm @error('nomor_dokumen') is-invalid @enderror"
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
                                       value="{{ old('tgl_dokumen') ?? now()->format('Y-m-d') }}"
                                       class="form-control form-control-sm @error('tgl_dokumen') is-invalid @enderror"
                                       placeholder="Masukkan Tanggal dokumen">
                                @error('tgl_dokumen')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control form-control-sm @error('catatan') is-invalid @enderror"
                                          name="catatan" id="catatan" rows="3"
                                          placeholder="Masukkan catatan">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Dokumen</label>
                                <input class="form-control form-control-sm @error('file') is-invalid @enderror"
                                       type="file" id="formFile" name="file">
                                @error('file')
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mt-5 text-end">
                                <a href="{{ route('file.index') }}">
                                    <button type="button" class="btn btn-sm btn-secondary shadow">Kembali</button>
                                </a>
                                <button type="submit" class="btn btn-sm btn-primary shadow ms-1">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
