@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>List Dokumen</h4>

                        <a href="{{ route('file.create') }}">
                            <button class="btn btn-sm btn-primary shadow">Upload</button>
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
                                            <button class="btn btn-sm btn-dark shadow">Preview</button>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center justify-content-end">
                                        <a href="{{ route(('file.edit'), $file->id) }}">
                                            <button class="btn btn-sm btn-info shadow">Edit</button>
                                        </a>

                                        <button class="btn btn-sm btn-danger shadow ms-2" data-bs-toggle="modal"
                                                data-bs-target="#modal-delete"
                                                data-url="{{ route('file.destroy', $file->id) }}"
                                                data-title="{{ $file->name }}">Delete
                                        </button>
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

    <!-- Delete Modal Component -->
    <x-modal-delete id="modal-delete" />
    <!-- End Delete Modal Component -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#modal-delete").on("show.bs.modal", (event) => {
                const url = $(event.relatedTarget).data("url");
                const title = $(event.relatedTarget).data("title");
                $("#form-delete").attr("action", url);
                $("#text-value").text(title);
            });
        });
    </script>
@endpush
