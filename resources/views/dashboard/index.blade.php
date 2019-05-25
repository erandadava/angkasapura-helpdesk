@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dashboard</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-orange"><i class="fa fa-file"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">Keluhan</span>
                            <span class="info-box-number">{{$jumlah_keluhan}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon {{ $performa>50 ? 'bg-green' : 'bg-red' }}"><i class="fa fa-tachometer"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">Performa</span>
                            <span class="info-box-number">{{$performa}}%</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><i class="fa fa-check-square-o"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">Keluhan Selesai</span>
                            <span class="info-box-number">{{$jumlah_keluhan_selesai}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Keluhan Berdasarkan Prioritas</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="">
                                <canvas id="chartPrioritas"></canvas>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Keluhan Berdasarkan Kategori</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="">
                                <canvas id="chartKategori"></canvas>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Keluhan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="">
                                <canvas id="chartKeluhan"></canvas>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                            <h3 class="box-title">Keluhan Berdasarkan Bulan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="">
                                <canvas id="chartBulan"></canvas>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
    @include('dashboard.script')
@endsection
