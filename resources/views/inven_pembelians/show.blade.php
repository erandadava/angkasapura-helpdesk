@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inven Pembelian
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px;padding-bottom:20px">
                    <div class="btn-group">
                        <div class="btn btn-default print-btn-detail">
                            <span><i class="fa fa-print"></i> Print</span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-left: 20px">
                    @include('inven_pembelians.show_fields')
                    <a href="{!! route('invenPembelians.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
