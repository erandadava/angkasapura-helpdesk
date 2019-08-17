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
            <div class="btn-group">
                <a class="btn btn-warning" style="margin-top: -10px;margin-bottom: 5px" onclick="submitcheck('exportpdflaporanharian')" target="_blank">Export To PDF</a>
                <input type="button" style="margin-top: -10px;margin-bottom: 5px" class="check btn btn-primary" value="Check All" />
            </div>
            </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('laporans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

