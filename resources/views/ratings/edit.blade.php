@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rating
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rating, ['route' => ['ratings.update', $rating->id], 'method' => 'patch']) !!}

                        @include('ratings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection