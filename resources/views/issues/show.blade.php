@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tiket
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('issues.show_fields')
                </div>
                <div class="row" style="padding-left: 20px">
                    <div class="col-md-12">
                        <a href="{!! route('issues.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
