<!DOCTYPE html>
<html>
<style>
body{
    font-family:arial;
}
table{
    border : 1px solid black;
    margin-top :25px;
    border-collapse: collapse;
}
td{
    border : 1px solid black;
    padding : 4px;
}
th{
    text-align:center;
    border : 1px solid black;
    padding : 4px;
}
</style>
<head>
	<title>PDF</title>
</head>
<body>
    <div class="container"></div>
        <div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <h1>{{$title}}</h1>
            <small>{!! \Carbon\Carbon::now() !!}</small>
        </div>
        <div class="col-sm-12">
            <div class="table">
                <table class="table table-condensed" style="width:100%">
                    <tr>
                        <th>No</th>
                        @foreach($head as $dt)
                            <th>
                                {{$dt}}
                            </th>
                        @endforeach
                    </tr>
                    <tbody>
                        @foreach($value as $key => $dt)
                            <tr>
                            <td><center>{{$key+1}}</center></td>
                                @foreach($dt as $key2 => $dt2)
                                    <td>
                                        {!! $dt2 !!}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>