@extends('layouts.show-doc')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Document</div>
                <div class="card-body">
                        {!! $content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
