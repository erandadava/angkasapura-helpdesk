
<div class="row">
  <div class="col-md-3">
    <!-- Issue Id Field -->
    <div class="form-group">
        {!! Form::label('issue_id', 'ID Keluhan:') !!}
        <p>{!! $issues->issue_id !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <!-- Cat Id Field -->
    <div class="form-group">
        {!! Form::label('cat_id', 'Kategori:') !!}
        <p>{!! $issues->category->cat_name ?? '' !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <!-- Prio Id Field -->
    <div class="form-group">
        {!! Form::label('prio_id', 'Prioritas:') !!}
        <p>{!! $issues->priority->prio_name ?? '' !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <!-- Request Id Field -->
    <div class="form-group">
        {!! Form::label('request_id', 'Request:') !!}
        <p>{!! $issues->request->name ?? '' !!}</p>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-3">
    <!-- Location Field -->
    <div class="form-group">
        {!! Form::label('location', 'Lokasi:') !!}
        <p>{!! $issues->location !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      {!! Form::label('dev_ser_num', 'Serial Number/ID Perangkat:') !!}
      <p>{!! $issues->sernum->sernumid ?? '' !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    
  </div>

  <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        <p>
            @if ($issues->status == null) <span class='label label-default'>Menunggu IT Administrator</span> @endif
            @if ($issues->status == 'AITADM') <span class='label label-success'>Diterima IT Administrator</span> @endif
            @if ($issues->status == 'ITADM') <span class='label label-info'>Diteruskan ke IT Administrator</span> @endif
            @if ($issues->status == 'ITSP') <span class='label label-info'>Diteruskan ke IT Support</span> @endif
            @if ($issues->status == 'RITADM') <span class='label label-danger'>Keluhan Tidak Dapat Diatasi Oleh IT Administrator</span> @endif
            @if ($issues->status == 'RITSP') <span class='label label-danger'>Keluhan Tidak Dapat Diatasi Oleh IT Support</span> @endif
            @if ($issues->status == 'AITSP') <span class='label label-warning'>Menunggu Tindakan Dari IT Support</span> @endif
            @if ($issues->status == 'ITOPS') <span class='label label-warning'>Menunggu Tindakan Dari IT OPS</span> @endif
            @if ($issues->status == 'CLOSE') <span class='label label-success'>Keluhan Selesai</span> @endif
            @if ($issues->status == 'SLITADM') <span class='label label-success'>Solusi Telah Diberikan IT Administrator</span> @endif
            @if ($issues->status == 'SLITOPS') <span class='label label-success'>Solusi Telah Diberikan IT OPS</span> @endif
            @if ($issues->status == 'SLITSP') <span class='label label-success'>Solusi Telah Diberikan IT Support</span> @endif
            @if ($issues->status == 'LITADM') <span class='label label-info'>IT Administrator Menuju ke Lokasi</span> @endif
            @if ($issues->status == 'LITOPS') <span class='label label-info'>IT OPS Menuju ke Lokasi</span> @endif
            @if ($issues->status == 'LITSP') <span class='label label-info'>IT Support Menuju ke Lokasi</span> @endif
            @if ($issues->status == 'DLITADM') <span class='label label-warning'>Sedang Dalam Tindakan IT Administrator</span> @endif
            @if ($issues->status == 'DLITOPS') <span class='label label-warning'>Sedang Dalam Tindakan IT OPS</span> @endif
            @if ($issues->status == 'DLITSP') <span class='label label-warning'>Sedang Dalam Tindakan IT Support</span> @endif
            @if ($issues->status == 'RT') <span class='label label-warning'>User Telah Memberi Rating</span> @endif
        </p>
    </div>
  </div>
</div>
<style type="text/css">
.rowlight{
  padding-top: 1rem;
  padding-bottom: 1rem;
  border-top: thin dotted #888;
  border-bottom: thin dotted #888;
  width: 100%;
  margin-bottom: 1rem;
}
.colred{
  background-color: #ce5757;
  border-radius: .5rem;
  color: #FFF;
  min-height:7rem;
}
.colblue{
  background-color: #005b7f;
  border-radius: .5rem;
  color:#fff;
  min-height:7rem;
}
.colgreen{
  background-color: #598527;
  border-radius: .5rem;
  color: #FFF;
  min-height:7rem;
}
</style>
<div class="row rowlight">
  <div class="col-md-4 colred">
    <!-- Prob Desc Field -->
    <div class="form-group ">
        {!! Form::label('prob_desc', 'Deskripsi Keluhan:') !!}
        <?php if($issues->prob_desc == ""){
        ?>
          <p>-</p>
        <?php
        }else{
        ?>
          <p>{!! $issues->prob_desc !!}</p>
        <?php
        }
        ?>
    </div>
  </div>
  <div class="col-md-4 colblue">
    <!-- Reason Desc Field -->
    <div class="form-group">
        {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
        <?php if($issues->reason_desc == ""){
        ?>
          <p>-</p>
        <?php
        }else{
        ?>
          <p>{!! $issues->reason_desc !!}</p>
        <?php
        }
        ?>
    </div>
  </div>
  <div class="col-md-4 colgreen">
    <div class="form-group">
        {!! Form::label('solution_desc', 'Deskripsi Solusi:') !!}
        <?php if($issues->solution_desc == ""){
        ?>
          <p>-</p>
        <?php
        }else{
        ?>
          <p>{!! $issues->solution_desc !!}</p>
        <?php
        }
        ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('assign_it_admin', 'Assign User IT Administrator:') !!}
        <p>{!! $issues->assign_it_admin_relation->name ?? '' !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('assign_it_support', 'Assign User IT Support:') !!}
        <p>{!! $issues->assign_it_support_relation->name ?? '' !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
        {!! Form::label('assign_it_ops', 'Assign User IT Operasional:') !!}
        <p>{!! $issues->assign_it_ops_relation->name ?? '' !!}</p>
    </div>
  </div>

  <div class="col-md-3">
     <!-- Complete By Field -->
     <div class="form-group">
        {!! Form::label('complete_by', 'Selesai Oleh:') !!}
        <p>{!! $issues->complete->name ?? '' ?? ''!!}</p>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-3">
     <!-- Complete By Field -->
     <div class="form-group">
        {!! Form::label('unit_kerja', 'Unit Kerja:') !!}
        <p>{!! $issues->unit_kerja->nama_uk ?? '' ?? ''!!}</p>
    </div>
  </div>
  
  <div class="col-md-3">
       <!-- Issue Date Field -->
    <div class="form-group">
        {!! Form::label('issue_date', 'Waktu Keluhan:') !!}
        <p>{!! $issues->issue_date !!}</p>
    </div>
  </div>

  <div class="col-md-3">
     <!-- Complete Date Field -->
     <div class="form-group">
        {!! Form::label('complete_date', 'Waktu Selesai:') !!}
        <p>{!! $issues->complete_date !!}</p>
    </div>
  </div>

  <div class="col-md-3">
    <!-- Complete Date Field -->
    <div class="form-group">
       {!! Form::label('waktu_tindakan', 'Waktu Tindakan:') !!}
       <p>{!! $issues->waktu_tindakan !!}</p>
   </div>
 </div>
</div>

<div class="row">
    <div class="col-md-3">
        <!-- Complete Date Field -->
        <div class="form-group">
           {!! Form::label('solution_date', 'Waktu Solusi Diberikan:') !!}
           <p>{!! $issues->solution_date !!}</p>
       </div>
      </div>
      <div class="col-md-3">
          <!-- Complete Date Field -->
          <div class="form-group">
             {!! Form::label('no_tlp', 'Nomor Telepon:') !!}
             <p>{!! $issues->no_tlp !!}</p>
         </div>
        </div>
      
        <div class="col-md-3">
            <!-- Created At Field -->
          <div class="form-group">
              {!! Form::label('created_at', 'Dibuat Pada:') !!}
              <p>{!! $issues->created_at !!}</p>
          </div>
        </div>
      
        <div class="col-md-3">
            <!-- Updated At Field -->
          <div class="form-group">
              {!! Form::label('updated_at', 'Diubah Pada:') !!}
              <p>{!! $issues->updated_at !!}</p>
          </div>
        </div>
      </div>
      
</div>

<div class="row">
  <div class="col-md-4">
  <div class="form-group">
      {!! Form::label('rating', 'Rating:') !!}
      <p>
      <input id="input-6" name="input-6" class="rating rating-loading" value="{{$issues->rating->rate??0}}" data-min="0" data-max="5" data-step="1" data-readonly="true">
      </p>
  </div>
  </div>

  <div class="col-md-4">
    
  </div>

  <div class="col-md-4">
    
  </div>
</div>

<!-- Is Archive Field
<div class="form-group">
    {!! Form::label('is_archive', 'Is Archive:') !!}
    <p>{!! $issues->is_archive !!}</p>
</div> -->

{{-- UNTUK IT SUPPORT --}}
@hasrole('IT Support')
  @if($issues->status == 'ITSP')
  <div class="form-group col-md-2 col-sm-12">
    {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
        {!! Form::hidden('status', 'LITSP', ['class' => 'form-control'])!!}
        <button class='btn btn-danger btn-md' type="submit" onclick="return confirm('Yakin?')">
          <i class="glyphicon glyphicon-random"></i> Menuju Lokasi
        </button>
    {!! Form::close() !!} 
  </div>
  @endif

  @if ($issues->status == "LITSP")
    <div class="form-group col-md-2 col-sm-12">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
          {!! Form::hidden('status', 'DLITSP', ['class' => 'form-control'])!!}
          <button class='btn btn-info btn-md' type="submit" onclick="return confirm('Yakin?')">
            <i class="glyphicon glyphicon-wrench"></i> Mulai Kerja
          </button>
      {!! Form::close() !!} 
    </div>
  @endif

  @if ($issues->status == "DLITSP")
      <!-- Button untuk IT NP -->
    <div class="form-group col-md-2 col-sm-12">
    
            <button class='btn btn-success btn-md' data-toggle="modal" data-target="#myModal">
                <i class="glyphicon glyphicon-folder-close"></i> Solusi
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
          <h4 class="modal-title">Solusi</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
              {!! Form::hidden('status', 'SLITSP', ['class' => 'form-control'])!!}
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
  @endif

  @if ($issues->status == 'LITSP' || $issues->status == 'DLITSP')
    <div class="form-group col-md-3 col-sm-12">
      <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItOPS">
          <i class="glyphicon glyphicon-share"></i> Tidak Dapat Mengatasi Keluhan
      </button>
    </div>
    <div id="myModalItOPS" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tidak Dapat Mengatasi Keluhan</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
      {!! Form::hidden('status', 'RITSP', ['class' => 'form-control'])!!}
      <div class="form-group col-sm-12 col-lg-12">
          {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
          {!! Form::textarea('reason_desc', null, ['class' => 'form-control', 'id' => 'editor2']) !!}
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
  @endif
@endhasrole


{{-- UNTUK IT ADMIN --}}
@hasrole('IT Administrator')
  @if($issues->status == null)
  <div class="row">
      <div class="form-group col-md-2 col-sm-6">
          <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItSupport">
              <i class="glyphicon glyphicon-share"></i> Ajukan ke  IT Support
          </button>
      </div>

      <div class="form-group col-md-2 col-sm-6">
          <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItAdmNull">
              <i class="glyphicon glyphicon-share"></i> Ajukan ke  IT Administrator
          </button>
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

<div id="myModalItAdmNull" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Ajukan ke IT Administrator</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
      {!! Form::hidden('status', 'ITADM', ['class' => 'form-control'])!!}
      <div class="form-group col-sm-12 col-lg-6">
          {!! Form::label('assign_it_admin', 'Assign User :') !!}
        </br>
          {!! Form::select('assign_it_admin',$it_admin, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
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

  @endif
  

  @if($issues->status == 'RITSP' || $issues->status == 'RITADM')
  <div class="form-group col-md-2 col-sm-12">
          <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItOPS">
              <i class="glyphicon glyphicon-share"></i> Ajukan ke IT OPS
          </button>
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
        <div class="form-group col-sm-12 col-lg-6">
            {!! Form::label('assign_it_ops', 'Assign IT OPS :') !!}
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

  @endif
@endhasrole

@hasrole('IT Administrator')
  @if($issues->status == 'ITADM')
  <div class="form-group col-md-2 col-sm-12">
    {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
        {!! Form::hidden('status', 'LITADM', ['class' => 'form-control'])!!}
        <button class='btn btn-danger btn-md' type="submit" onclick="return confirm('Yakin?')">
          <i class="glyphicon glyphicon-random"></i> Menuju Lokasi
        </button>
    {!! Form::close() !!} 
  </div>
  @endif

  @if ($issues->status == "LITADM")
    <div class="form-group col-md-2 col-sm-12">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
          {!! Form::hidden('status', 'DLITADM', ['class' => 'form-control'])!!}
          <button class='btn btn-info btn-md' type="submit" onclick="return confirm('Yakin?')">
            <i class="glyphicon glyphicon-wrench"></i> Mulai Kerja
          </button>
      {!! Form::close() !!} 
    </div>
  @endif

  @if ($issues->status == "DLITADM")
      <!-- Button untuk IT NP -->
    <div class="form-group col-md-2 col-sm-12">
    
            <button class='btn btn-success btn-md' data-toggle="modal" data-target="#myModalItadmdl">
                <i class="glyphicon glyphicon-folder-close"></i> Solusi
            </button>
    
    </div>
    <!-- ---------------------- -->
  <!-- Modal -->
  <div id="myModalItadmdl" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Solusi</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
              {!! Form::hidden('status', 'SLITADM', ['class' => 'form-control'])!!}
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
  @endif

  @if ($issues->status == 'LITADM' || $issues->status == 'DLITADM')
    <div class="form-group col-md-3 col-sm-12">
      <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItAdmSl">
          <i class="glyphicon glyphicon-share"></i> Tidak Dapat Mengatasi Keluhan
      </button>
    </div>
    <div id="myModalItAdmSl" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tidak Dapat Mengatasi Keluhan</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
      {!! Form::hidden('status', 'RITADM', ['class' => 'form-control'])!!}
      <div class="form-group col-sm-12 col-lg-12">
          {!! Form::label('reason_desc', 'Deskripsi Alasan:') !!}
          {!! Form::textarea('reason_desc', null, ['class' => 'form-control', 'id' => 'editor2']) !!}
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
  @endif
@endhasrole


{{-- UNTUK IT SUPPORT SAAT JAM 16:30:00 --}}
@hasrole('IT Support')
  @if($issues->status == null && $status_jam == 1)
  <div class="row">
      <div class="form-group col-md-2 col-sm-6">
          <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItSupport">
              <i class="glyphicon glyphicon-share"></i> Ajukan ke  IT Support
          </button>
      </div>

      <div class="form-group col-md-2 col-sm-6">
          <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItAdmNull">
              <i class="glyphicon glyphicon-share"></i> Ajukan ke  IT Administrator
          </button>
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

<div id="myModalItAdmNull" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Ajukan ke IT Administrator</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
      {!! Form::hidden('status', 'ITADM', ['class' => 'form-control'])!!}
      <div class="form-group col-sm-12 col-lg-6">
          {!! Form::label('assign_it_admin', 'Assign User :') !!}
        </br>
          {!! Form::select('assign_it_admin',$it_admin, null, ['class' => 'form-control select2', 'style'=>'width:100%;']) !!}
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

  @endif
  @if(($issues->status == 'RITSP' || $issues->status == 'RITADM') && $status_jam == 1)
  <div class="form-group col-md-2 col-sm-12">
          <button class='btn btn-default btn-md' data-toggle="modal" data-target="#myModalItOPS">
              <i class="glyphicon glyphicon-share"></i> Ajukan ke IT OPS
          </button>
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
        <div class="form-group col-sm-12 col-lg-6">
            {!! Form::label('assign_it_ops', 'Assign IT OPS :') !!}
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

  @endif
@endhasrole

{{-- UNTUK IT OPS --}}
@hasrole('IT Operasional')
    @if($issues->status=="ITOPS") 
    <div class="form-group col-md-2 col-sm-12">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
          {!! Form::hidden('status', 'LITOPS', ['class' => 'form-control'])!!}
          <button class='btn btn-danger btn-md' type="submit" onclick="return confirm('Yakin?')">
            <i class="glyphicon glyphicon-random"></i> Menuju Lokasi
          </button>
      {!! Form::close() !!} 
    </div>
  @endif

  @if ($issues->status == "LITOPS")
    <div class="form-group col-md-2 col-sm-12">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
          {!! Form::hidden('status', 'DLITOPS', ['class' => 'form-control'])!!}
          <button class='btn btn-info btn-md' type="submit" onclick="return confirm('Yakin?')">
            <i class="glyphicon glyphicon-wrench"></i> Mulai Kerja
          </button>
      {!! Form::close() !!} 
    </div>
  @endif

  @if ($issues->status == "DLITOPS")
      <!-- Button untuk IT NP -->
    <div class="form-group col-md-2 col-sm-12">
    
            <button class='btn btn-success btn-md' data-toggle="modal" data-target="#myModal">
                <i class="glyphicon glyphicon-folder-close"></i> Solusi
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
          <h4 class="modal-title">Solusi</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
              {!! Form::hidden('status', 'SLITOPS', ['class' => 'form-control'])!!}
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
  @endif
@endhasrole


@hasrole('User')
{{-- UNTUK USER --}}
@if ((Auth::check()) && ($issues->request_id == Auth::user()->id))
@if(($issues->status == 'SLITSP' || $issues->status == 'SLITOPS' || $issues->status == 'SLITADM' && $issues->assign_it_support != null && $issues->complete_by == $issues->assign_it_support)||($issues->status == 'SLITSP' || $issues->status == 'SLITOPS' || $issues->status == 'SLITADM' && $issues->assign_it_ops != null && $issues->complete_by == $issues->assign_it_ops)||($issues->status == 'SLITSP' || $issues->status == 'SLITOPS' || $issues->status == 'SLITADM' && $issues->assign_it_admin != null && $issues->complete_by == $issues->assign_it_admin)) 
<!-- Button untuk IT NP -->
<div class="form-group col-md-2 col-sm-12">

        <button class='btn btn-warning btn-md' data-toggle="modal" data-target="#rate">
            <i class="glyphicon glyphicon-star"></i> Beri Penilaian
        </button>

</div>
<!-- ---------------------- -->
<!-- Modal -->
<div id="rate" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Penilaian</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
      {!! Form::hidden('status', 'CLOSE', ['class' => 'form-control'])!!}
          <div class="form-group col-sm-12 col-lg-12">
              <center>
                <h3>Beri rating untuk pelayanan kami</h3>
                </br>
                <input id="input-id" name="rate" type="text" class="rating" data-size="lg" data-min="0" data-max="5" data-step="1">
              </center>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-default" onclick="return confirm('Yakin?')">Kirim</button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
</div>
@endif
@endif
@endhasrole

{{-- UNTUK IT NON PUBLIC --}}
@hasrole('IT Non Public')
    @if ($issues->status == 'RT')
      @if(($issues->assign_it_support != null && $issues->complete_by == $issues->assign_it_support)||($issues->assign_it_ops != null && $issues->complete_by == $issues->assign_it_ops)) 
          <div class="form-group col-md-2 col-sm-12">
            {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
                {!! Form::hidden('status', 'CLOSE', ['class' => 'form-control'])!!}
                <button class='btn btn-info btn-md' type="submit" onclick="return confirm('Yakin?')">
                  <i class="glyphicon glyphicon-check"></i> Selesai
                </button>
            {!! Form::close() !!} 
          </div>
      @endif
    @endif

    @if($issues->status == 'SLITSP' || $issues->status == 'SLITOPS' && $issues->assign_it_ops != null && $issues->complete_by == $issues->assign_it_ops) 
    <!-- Button untuk IT NP -->
    <div class="form-group col-md-2 col-sm-12">
    
            <button class='btn btn-warning btn-md' data-toggle="modal" data-target="#rate">
                <i class="glyphicon glyphicon-star"></i> Beri Penilaian
            </button>
    
    </div>
    <!-- ---------------------- -->
  <!-- Modal -->
  <div id="rate" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rating</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          {!! Form::open(['route' => ['issues.update', $issues->id], 'method' => 'patch']) !!}
              {!! Form::hidden('status', 'RT', ['class' => 'form-control'])!!}
              <div class="form-group col-sm-12 col-lg-12">
                  <center>
                    <h3>Beri rating untuk pelayanan kami</h3>
                    </br>
                    <input id="input-id" name="rate" type="text" class="rating" data-size="lg" data-min="0" data-max="5" data-step="1">
                  </center>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" onclick="return confirm('Yakin?')">Kirim</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
  @endif
@endhasrole

@section('scripts')
<script>
  $("#input-id").rating({'size':'lg'});
</script>
@endsection