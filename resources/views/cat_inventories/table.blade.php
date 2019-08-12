@section('css')
    @include('layouts.datatables_css')
@endsection

<div class="table-responsive">
    {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
</div>
@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection