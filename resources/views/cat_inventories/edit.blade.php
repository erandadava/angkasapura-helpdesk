@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kategori Inventaris
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($catInventory, ['route' => ['catInventories.update', $catInventory->id], 'method' => 'patch']) !!}

                        @include('cat_inventories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection