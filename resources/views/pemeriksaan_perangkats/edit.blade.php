@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemeriksaan Perangkat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pemeriksaanPerangkat, ['route' => ['pemeriksaanPerangkats.update', $pemeriksaanPerangkat->id], 'method' => 'patch', 'class' => 'form-perangkat', 'enctype'=>'multipart/form-data']) !!}

                        @include('pemeriksaan_perangkats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection