@extends('layouts.app')

@section('content')
<style>
    tr.group,
    tr.group:hover {
        background-color: #16a085 !important;
        color:white;
    }
    </style>
    <section class="content-header">
        <h1 class="pull-left">Laporan Harian</h1>
            <h1 class="pull-right">
            @hasrole('IT Operasional|IT Non Public')
                <div class="btn-group">
                    <a class="btn btn-warning" style="margin-top: -10px;margin-bottom: 5px" onclick="submitcheck('exportpdflaporanharian')" target="_blank">Export To PDF</a>
                    <input type="button" style="margin-top: -10px;margin-bottom: 5px" class="check btn btn-primary" value="Check All" />
                </div>
            @endhasrole
            </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-md-6">
                            {!! Form::open(['url' => 'laporanhari','method'=>'GET','class'=>'form-inline']) !!}

                                <div class="form-group">
                                    {!! Form::label('tgl', 'Tanggal:') !!}
                                    <input type="text" name="tgl" id='tgl-range' class="form-control" value='{{$tgl??''}}' autocomplete='off'>
                                </div>
                                <button type="submit" class="btn btn-primary">Lihat</button>
        
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @include('laporans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection




