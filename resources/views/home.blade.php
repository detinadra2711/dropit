@extends('layouts.web')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="text-center">ARSIP ERBA</h4>
                        @auth
                            <p class="text-muted text-center fs-6">
                                Welcome {{ auth()->user()->name }}
                            </p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
