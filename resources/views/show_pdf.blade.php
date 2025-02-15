

<!DOCTYPE html>
<head>
    <title>Surat Tugas</title>
    <meta charset="utf-8">
    <style>

        #judul{
            text-align:center;
        }

        #halaman{
            width: 650px; 
            height: auto; 
            margin-left: auto;
            margin-right: auto;
            padding-top: 30px; 
            padding-bottom: 80px;
            font-size: 16px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        #Header{
            width: 670px; 
            height: 140px;
            margin-left: auto;
            margin-right: auto;
        }

        .tr{
            vertical-align: top;
            text-align: justify;
        }
        
        td.a{
            padding-right: 30px;
        }

        td.b{
            padding-right: 50px;
        }

        td.c{
            text-align: center;
            margin-left: auto;
            padding-right: 110px;
        }

        td.d{
            padding-right: 58px;
        }

        td.e{
            padding-right: 20px;
            padding-left: 20px;
        }

        td.f{
            padding-left: 10px;
        }

        td.g{
            padding-right: 70px;
        }

        ol.a{
            list-style: lower-alpha;
            margin-top: 0px;
        }

        ol.b{
            margin-top: 0px;
        }

        ol.c{
            list-style: none;
            margin-top: 3px;
            padding-left: 15px;
            padding-right: 30px;
        }

        li{
            text-indent: 0px;
        }

        #Tanggal{
            margin-left: 420px; 
        }
    </style>

</head>
<body id=halaman>
	@php $i=1 @endphp
	@foreach($surat as $s)
    <div>
        <img src="{{ public_path('images/Header.png') }}" id="Header">
        <p id=judul><span><b><u>SURAT TUGAS</u></b></span> <br>Nomor: {{$s->NoSurat}}/BPSDMP.63/KP.01.06{{date('/m/Y',strtotime($s->TanggalBuat))}}</p>
        <table>
            <tr class="tr">
                <td class="a">Menimbang</td>
                <td>:</td>
                <ol class="a">
                    <li>{{$s->Menimbang}}</li>
                </ol>
            </tr>
            <tr class="tr">
                <td class="a">Dasar</td>
                <td>:</td>
                <ol class="b">
                    <li class="li">Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara;</li>
                    <li>Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara;</li>
                    <li>Peraturan Menteri Komunikasi dan Informatika Nomor 3 Tahun
                        2022 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis
                        Bidang Sumber Daya Manusia dan Penelitian Komunikasi dan
                        Informatika.</li>
                        <?php if(!empty($s->Dasar)) {
                            echo "<li>{$s->Dasar }</li>";
                        } else {
                            echo "";
                        } ?>
                </ol>
            </tr>
            <tr class="tr">
                <td></td>
                <td></td>
                <td class="c">MEMBERI TUGAS:</td>
            </tr>
        </table>
        @endforeach

        <table>
            <tr class="tr">
                <td class="d">Kepada</td>
                <td>:</td>
                <td class="e">Nama</td>
                <td>:</td>
                <td class="f">{{ $user->name}}</td>
            </tr>
            <tr class="tr">
                <td class="d"></td>
                <td></td>
                <td class="e">NIP</td>
                <td>:</td>
                <td class="f">{{ $user->NIP}}</td>
            </tr>
            <tr class="tr">
                <td class="d"></td>
                <td></td>
                <td class="e">Pangkat,Gol/ruang</td>
                <td>:</td>
                <td class="f">{{ $user->pangkat}}</td>
            </tr>
            <tr class="tr">
                <td class="d"></td>
                <td></td>
                <td class="e">Jabatan</td>
                <td>:</td>
                <td class="f">{{ $user->jabatan}}</td>
            </tr>
        </table>

        @foreach($surat as $s)
        <table>
            <tr class="tr">
                <td class="g">Untuk</td>
                <td>:</td>
                <ol class="b">
                    <li class="li">{{$s->Untuk}} 
                        {{ \Carbon\Carbon::parse($s->DariTanggal)->isoFormat('dddd') }} - {{ \Carbon\Carbon::parse($s->SampaiTanggal)->isoFormat('dddd') }}, 
                        {{ \Carbon\Carbon::parse($s->DariTanggal)->isoFormat('D') }} - {{ \Carbon\Carbon::parse($s->SampaiTanggal)->isoFormat('D MMMM YYYY') }}, di {{$s->KabKota}}, {{$s->Provinsi}}.
                    </li>
                <li>Biaya yang timbul akibat pelaksanaan kegiatan tersebut di atas
                    dibebankan pada DIPA BPSDMP KOMINFO Banjarmasin No. SP
                    DIPA-059.06.2.432696/2023 Tanggal 30 November 2022.</li>
            </ol>
            </tr>
        </table>
    </div>
    <p id="Tanggal">Banjarmasin, {{date('d F Y',strtotime($s->TanggalBuat))}}</p>
    @endforeach
    
</body>
</html>