@section('css')
    @include('layouts.datatables_css')
@endsection

<div class="table-responsive">
    {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
</div>
{!! Form::open(['url' => 'exportpdflaporanharian', 'method' => 'post', 'class' => 'formcheck', 'target' => '_blank']) !!}
    {!! Form::hidden('exportid', null, ['id' => 'val-export-id']) !!}
{!! Form::close() !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script>
            // var value_export = [];
            var old_value = [];
            var check_all = false;
            var first = false;
            var all = null;
            $(document).ready(function(){
                
                var old_check = false;
                $('.check:button').click(function(){
                    if(old_check == false){
                        $('input:checkbox').attr('checked','checked');
                        $(this).val('Uncheck All');
                        old_value = [];
                        all.forEach(element => {
                            old_value.push(element.id);
                        });
                        old_check = true;
                        check_all = true;
                    }else{
                        $('input:checkbox').removeAttr('checked');
                        $(this).val('Check All');
                        old_check = false;
                        check_all = false;
                        old_value = [];
                    }
                });
            });
    
    
            $('#dataTableBuilder').on('processing.dt', function (e, settings, processing) {
                if (processing) {
                    null;     // **I do not get this**
                } else {
                    if(first == false){
                        first = true;
                        all = LaravelDataTables['dataTableBuilder'].ajax.json().all_data;
                    }
                    $.each( old_value, function( key, value ) {
                        $('#checkexport'+value).attr('checked','checked');
                    }); // **I get this**
                }
            });
    
            function tocheck(id){
                if($('#checkexport'+id).prop("checked") == true){
                    old_value.push(id);
                }else{
                    old_value.splice($.inArray(id, old_value),1);
                }   
            }
    
            function submitcheck(val){
                // value_export = [];
                // $('input[name^="exportid"]').each(function() {
                //     if($(this).prop("checked") == true){
                //         value_export.push($(this).val());
                //     }    
                // });
                $('#val-export-id').val(old_value);  
                $('.formcheck').attr('action', val).submit();
            }
            
        </script>
    

    @hasrole('Admin|IT Non Public')
        <script>
            setInterval(function () {
                $(".btn-ulang").click();
                }, 20000);
        </script>
    @endhasrole
@endsection