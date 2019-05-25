<!-- Issue Id Field -->
<div class="form-group">
    {!! Form::label('issue_id', 'ID Keluhan:') !!}
    <p>{!! $issues->issue_id !!}</p>
</div>

<!-- Cat Id Field -->
<div class="form-group">
    {!! Form::label('cat_id', 'Kategori:') !!}
    <p>{!! $issues->category->cat_name !!}</p>
</div>

<!-- Prio Id Field -->
<div class="form-group">
    {!! Form::label('prio_id', 'Prioritas:') !!}
    <p>{!! $issues->priority->prio_name !!}</p>
</div>

<!-- Request Id Field -->
<div class="form-group">
    {!! Form::label('request_id', 'Request:') !!}
    <p>{!! $issues->request->name ?? '' !!}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Lokasi:') !!}
    <p>{!! $issues->location !!}</p>
</div>

<!-- Prob Desc Field -->
<div class="form-group">
    {!! Form::label('prob_desc', 'Deskripsi Keluhan:') !!}
    <p>{!! $issues->prob_desc !!}</p>
</div>

<!-- Reason Desc Field -->
<div class="form-group">
    {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
    <p>{!! $issues->reason_desc !!}</p>
</div>

<div class="form-group">
    {!! Form::label('solution_desc', 'Deskripsi Solusi:') !!}
    <p>{!! $issues->solution_desc !!}</p>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>
    @if ($issues->status == null) <span class='label label-info'>Menunggu IT Administrator</span> @endif
    @if ($issues->status == 'RITADM') <span class='label label-danger'>Ditolak & Menunggu Alasan Dari IT Administrator</span> @endif
    @if ($issues->status == 'AITADM') <span class='label label-success'>Diterima IT Administrator</span> @endif
    @if ($issues->status == 'ITSP') <span class='label label-info'>Diteruskan ke IT Support</span> @endif
    @if ($issues->status == 'RITSP') <span class='label label-danger'>Ditolak & Menunggu Alasan Dari IT Support</span> @endif
    @if ($issues->status == 'AITSP') <span class='label label-Warning'>Menunggu Solusi Dari IT Support</span> @endif
    @if ($issues->status == 'ITOPS') <span class='label label-Warning'>Menunggu Solusi Dari IT OPS</span> @endif
    @if ($issues->status == 'CLOSE') <span class='label label-default'>Keluhan Ditutup</span> @endif
    @if ($issues->status == 'SLITADM') <span class='label label-success'>Solusi Telah Diberikan IT Administrator</span> @endif
    @if ($issues->status == 'SLITOPS') <span class='label label-success'>Solusi Telah Diberikan IT OPS</span> @endif
    </p>
</div>

<div class="form-group">
    {!! Form::label('request_id', 'Request:') !!}
    <p>{!! $issues->request->name ?? '' !!}</p>
</div>

<div class="form-group">
    {!! Form::label('assign_it_support', 'Assign User IT Support:') !!}
    <p>{!! $issues->assign_it_support_relation->name ?? '' !!}</p>
</div>

<div class="form-group">
    {!! Form::label('assign_it_ops', 'Assign User IT Operasional:') !!}
    <p>{!! $issues->assign_it_ops_relation->name ?? '' !!}</p>
</div>

<!-- Complete By Field -->
<div class="form-group">
    {!! Form::label('complete_by', 'Selesai Oleh:') !!}
    <p>{!! $issues->complete->name ?? ''!!}</p>
</div>

<!-- Issue Date Field -->
<div class="form-group">
    {!! Form::label('issue_date', 'Waktu Keluhan:') !!}
    <p>{!! $issues->issue_date !!}</p>
</div>

<!-- Complete Date Field -->
<div class="form-group">
    {!! Form::label('complete_date', 'Waktu Selesai:') !!}
    <p>{!! $issues->complete_date !!}</p>
</div>

<!-- Is Archive Field
<div class="form-group">
    {!! Form::label('is_archive', 'Is Archive:') !!}
    <p>{!! $issues->is_archive !!}</p>
</div> -->

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $issues->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diubah Pada:') !!}
    <p>{!! $issues->updated_at !!}</p>
</div>


@if($issues->status == 'ITSP')
<div class="form-group col-md-2 col-sm-12">
        <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItOPS">
            <i class="glyphicon glyphicon-share"></i> Ajukan ke  IT OPS
        </button>
</div>
@endif

@if($issues->status == null)
<div class="form-group col-md-2 col-sm-12">
        <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItSupport">
            <i class="glyphicon glyphicon-share"></i> Ajukan ke  IT Support
        </button>
</div>
@endif


<!-- Button untuk IT NP -->
<div class="form-group col-md-2 col-sm-12">

        <button class='btn btn-success btn-md' data-toggle="modal" data-target="#myModal">
            <i class="glyphicon glyphicon-folder-close"></i> Tutup Keluhan
        </button>

</div>
<!-- ---------------------- -->



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tutup Keluhan</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
            {!! Form::hidden('status', 'CLOSE', ['class' => 'form-control'])!!}
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('solution_desc', 'Deskripsi Solusi:') !!}
                {!! Form::textarea('solution_desc', null, ['class' => 'form-control', 'id' => 'editor']) !!}
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" onclick="return confirm('Yakin?')">Simpan</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

<div id="myModalItOPS" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajukan ke IT OPS</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
        {!! Form::hidden('status', 'ITOPS', ['class' => 'form-control'])!!}
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
            {!! Form::textarea('reason_desc', null, ['class' => 'form-control', 'id' => 'editor2']) !!}
        </div>
        <div class="form-group col-sm-12 col-lg-6">
            {!! Form::label('assign_it_ops', 'Assign User :') !!}
          </br>
            {!! Form::select('assign_it_ops',$it_ops, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" onclick="return confirm('Yakin?')">Simpan</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

<div id="myModalItSupport" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajukan ke IT Support</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
        {!! Form::hidden('status', 'ITSP', ['class' => 'form-control'])!!}
        <div class="form-group col-sm-12 col-lg-6">
            {!! Form::label('assign_it_support', 'Assign User :') !!}
          </br>
            {!! Form::select('assign_it_support',$it_support, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" onclick="return confirm('Yakin?')">Simpan</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
