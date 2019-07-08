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
    height: auto;
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
*{
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}
table.paleBlueRows {
  border: 1px solid #FFFFFF;
  width: auto;
  height: auto;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
    border : 1px solid #424242;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
  border : 1px solid #424242;
}
table.paleBlueRows tr:nth-child(even) {
  background: #D0E4F5;
}
table.paleBlueRows thead {
  background: #0B6FA4;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}
table.paleBlueRows thead th:first-child {
  border-left: none;
}

table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #333333;
  background: #D0E4F5;
  border-top: 3px solid #444444;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
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
                <table class="paleBlueRows" style="width:100%">
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