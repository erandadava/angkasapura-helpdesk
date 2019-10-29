<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pemeriksaan Perangkat</title>
    <style>
        table {
            width: 100%;
        }

        .container {
            padding: 25px;
            margin: 5px;
            border: 2px solid black;
        }

        .field {
            width: 30%;
        }

        .titik_dua {
            width: 1%;
        }

        .teks {
            width: 69%;
            border-bottom: 1px solid black;
        }

        .tabel-atas {
            border-collapse: separate;
            border-spacing: 0 1em;
        }

        .bagian-atas {
            border-top: 2px solid black;
        }

        h2 {
            text-decoration: underline;
        }

        .bagian-tengah {
            border-top: 2px solid black;
        }

        .tabel-tengah {
            border-collapse: separate;
            border-spacing: 0 1em;
        }

        .kotak-ceklis {
            width: 50px;
            height: 25px;
            display: table-cell;
            vertical-align: middle;
            border: 1px solid black;
            text-align: center;
            border-radius: 10px;
        }

        .input-box {
            width: 98%;
            padding: 5px;
            border: 1px solid black;
        }

        .bagian-bawah {
            border-top: 2px solid black;
        }

        .tabel-bawah {
            border-collapse: collapse;
            margin-top: 10px;
            text-align: center;
        }
        .tabel-bawah td{
            border: 1px solid black;
        }
        .td-header{
            padding:5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td style="width:80%;text-align:right;padding-right:40px;">
                                <h2>FORM PEMERIKSAAN PERANGKAT</h2>
                </td>
                <td style="width:20%">
                        
                            <img src="{{ public_path().'/img/solusi.png'}}" style="width:100%" alt="">
                </td>
            </tr>
        </table>
        <div class="bagian-atas">
            <table class="tabel-atas">
                <tr>
                    <td class="field">
                        Nama Pengguna PC
                    </td>
                    <td class="titik-dua">
                        :
                    </td>
                    <td class="teks">
                        {{$value->nama_pengguna_pc??''}}
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        Lokasi
                    </td>
                    <td class="titik-dua">
                        :
                    </td>
                    <td class="teks">
                        {{$value->lokasi??''}}
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        Serial Number
                    </td>
                    <td class="titik-dua">
                        :
                    </td>
                    <td class="teks">
                        {{$value->serial_number??''}}
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        Tanggal Pengecekan
                    </td>
                    <td class="titik-dua">
                        :
                    </td>
                    <td class="teks">
                        {{$value->tanggal_pengecekan??''}}
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        Jam Pengecekan
                    </td>
                    <td class="titik-dua">
                        :
                    </td>
                    <td class="teks">
                        {{$value->mulai_jam_pengecekan??''}} - {{date('H:i:s', strtotime($value->selesai_jam_pengecekan))??''}}
                    </td>
                </tr>
            </table>
        </div>

        <div class="bagian-tengah">
            <table class="tabel-tengah">
                <tr>
                    <td>
                        Full Computer Name
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->full_computer_name??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Join Domain
                    </td>
                    <td>
                        YES
                    </td>
                    <td>
                            @if ($value->join_domain == 1)
                                <div class="kotak-ceklis">
                                    <span style='font-size:24px;'>&#10004;</span>
                                </div>
                            @else
                                <div class="kotak-ceklis">
                                    
                                </div>
                            @endif
                        
                    </td>
                    <td>
                        NO
                    </td>
                    <td>
                        @if ($value->join_domain != 1)
                            <div class="kotak-ceklis">
                                <span style='font-size:24px;'>&#10004;</span>
                            </div>
                        @else
                            <div class="kotak-ceklis">
                                    
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Update Kaspersky
                    </td>
                    <td>
                        YES
                    </td>
                    <td>
                        @if ($value->update_kaspersky == 1)
                            <div class="kotak-ceklis">
                                <span style='font-size:24px;'>&#10004;</span>
                            </div>
                        @else
                            <div class="kotak-ceklis">
                                
                            </div>
                        @endif
                    </td>
                    <td>
                        NO
                    </td>
                    <td>
                        @if ($value->update_kaspersky != 1)
                            <div class="kotak-ceklis">
                                <span style='font-size:24px;'>&#10004;</span>
                            </div>
                        @else
                            <div class="kotak-ceklis">
                                    
                            </div>
                        @endif
                    </td>
                    <td colspan="2">
                        <div class="input-box" style="width:94%">
                            Tanggal Update : {{date('d-m-Y', strtotime($value->tanggal_update??''))}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipe Koneksi
                    </td>
                    <td>
                        LAN
                    </td>
                    <td>
                        @if ($value->tipe_koneksi == "LAN")
                            <div class="kotak-ceklis">
                                <span style='font-size:24px;'>&#10004;</span>
                            </div>
                        @else
                            <div class="kotak-ceklis">
                                    
                            </div>
                        @endif
                    </td>
                    <td>
                        WiFi
                    </td>
                    <td>
                        @if ($value->tipe_koneksi == "WIFI")
                            <div class="kotak-ceklis">
                                <span style='font-size:24px;'>&#10004;</span>
                            </div>
                        @else
                            <div class="kotak-ceklis">
                                    
                            </div>
                        @endif
                    </td>
                    <td style="width:10%;">
                        NONE
                    </td>
                    <td>
                        @if ($value->tipe_koneksi == "NONE")
                            <div class="kotak-ceklis">
                                <span style='font-size:24px;'>&#10004;</span>
                            </div>
                        @else
                            <div class="kotak-ceklis">
                                    
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipe IP
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->tipe_ip??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Mac Address
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->mac_address??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        IP Address
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->ip_address??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Subnet Mask
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->subnet_mask??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gateway
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->gateway??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        DNS1
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->dns1??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        DNS2
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->dns2??''}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        DNS3
                    </td>
                    <td colspan="6">
                        <div class="input-box">
                            {{$value->dns3??''}}
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="bagian-bawah">
            <table class="tabel-bawah">
                <tr>
                    <td class="td-header">
                        IT Senior Staff APS
                    </td>
                    <td class="td-header">
                        Admin APS
                    </td>
                    <td class="td-header">
                        Teknisi APS
                    </td>
                    <td class="td-header">
                        User / Koordinator
                    </td>
                    <td class="td-header">
                        IT Non Public Service
                    </td>
                </tr>
                <tr>
                    <td>
                        <center></center><img src="{{ public_path().'/storage/'.$value->ttd_it_senior}}" alt="" style="width:100%"></center>
                    </td>
                    <td>
                        <center><img src="{{ public_path().'/storage/'.$value->ttd_admin_aps}}" alt="" style="width:100%"></center>
                    </td>
                    <td>
                        <center><img src="{{ public_path().'/storage/'.$value->teknisi_aps}}" alt="" style="width:100%"></center>
                    </td>
                    <td>
                        <center><img src="{{ public_path().'/storage/'.$value->user}}" alt="" style="width:100%"></center>
                    </td>
                    <td>
                        <center><img src="{{ public_path().'/storage/'.$value->it_non_public}}" alt="" style="width:100%"></center>
                    </td>   
                </tr>
            </table>
        </div>
    </div>
</body>

</html>