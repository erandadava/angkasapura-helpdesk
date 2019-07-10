@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

{!! Form::open(['url' => 'exportpdflaporanharian', 'method' => 'post', 'class' => 'formcheck']) !!}
    {!! Form::hidden('exportid', null, ['id' => 'val-export-id']) !!}
{!! Form::close() !!}
@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script>
        // var value_export = [];
        var old_value = [];

        $('#dataTableBuilder').on('processing.dt', function (e, settings, processing) {
            if (processing) {
                null;     // **I do not get this**
            } else {
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

        function submitcheck(){
            // value_export = [];
            // $('input[name^="exportid"]').each(function() {
            //     if($(this).prop("checked") == true){
            //         value_export.push($(this).val());
            //     }    
            // });
            $('#val-export-id').val(old_value);  
            $('.formcheck').submit();
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