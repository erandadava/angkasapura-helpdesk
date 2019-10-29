@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemeriksaan Perangkat
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px;padding-bottom:20px">
                    <div class="btn-group">
                        <a href="/exportpdfpemeriksaan/{{Crypt::encrypt($pemeriksaanPerangkat->id)}}">
                            <div class="btn btn-default print-btn-detail">
                                    <span><i class="fa fa-print"></i> Print</span>
                            </div>
                        </a>
                    </div>
                </div>
                    @include('pemeriksaan_perangkats.show_fields')
                    <a href="{!! route('pemeriksaanPerangkats.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
