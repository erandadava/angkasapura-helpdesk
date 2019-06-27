@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Ticket</h1>
            <h1 class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-warning" style="margin-top: -10px;margin-bottom: 5px" href="/exportpdf/{{Crypt::encrypt('issues')}}">Export To PDF</a>
                    <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('issues.create') !!}">Add New</a>
                </div>
            </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('issues.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

