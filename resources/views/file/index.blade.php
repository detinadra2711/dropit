@extends('layouts.web')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>List Dokumen</h4>

                        <a href="{{ route('file.create') }}">
                            <button class="btn btn-primary">Upload</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="list-file" class="table">
                            <thead>
                            <tr>
                                <th>Nama Dokumen</th>
                                <th>Nomor Dokumen</th>
                                <th>Tanggal Dokumen</th>
                                <th>Perubahan Terakhir</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->nomor_dokumen }}</td>
                                    <td>{{ Carbon\Carbon::parse($file->tgl_dokumen)->isoFormat('DD MMMM YYYY') }}</td>
                                    <td>{{ $file->updated_at->isoFormat('DD MMMM YYYY - H:m') }}</td>
                                    <td>
                                        <a href="{{ asset($file->url) }}" target="_blank">
                                            <button class="btn btn-sm btn-dark">Preview</button>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center justify-content-end">
                                        <a href="{{ route(('file.edit'), $file->id) }}">
                                            <button class="btn btn-sm btn-info">Edit</button>
                                        </a>

                                        <a href="#" class="ms-2"
                                           onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                            <form id="delete-form" action="{{ route(('file.destroy'), $file->id) }}"
                                                  method="post"
                                                  hidden>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
