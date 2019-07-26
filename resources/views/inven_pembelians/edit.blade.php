@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pembelian Inventaris        
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($invenPembelian, ['route' => ['invenPembelians.update', $invenPembelian->id], 'method' => 'patch']) !!}

                        @include('inven_pembelians.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection