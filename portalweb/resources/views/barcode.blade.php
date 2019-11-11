<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<html>
<head>

</head>
<style>
    .id {
        border: 1px solid black;

    }

    .letra {
        font-size: 10px;
        margin-top: 0.3em;
        margin-left: 0.6em;
    }
</style>
<body>

<header>
    <?php
    use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

    ?>

    <div style="margin-left: -10px; margin-top: -10px">
        <table>
            @php($count =0)
            @foreach($impresion as $impresiones)
                @if($count%3==0 || $count==0)
                    <tr class="">
                        @endif
                        <td style="width: 34mm;height: 28mm">
                            <span style="border: 1px solid #0a0a0a;padding:3px; font-size: 12px">{{ $impresiones-> SemanUltimoMovimiento }}M</span>
                            @if($impresiones-> SemanaDespacho=='2019')
                                <span style="border: 1px solid #0a0a0a;padding:3px; font-size: 12px"></span><br>
                            @else
                                <span style="border: 1px solid #0a0a0a;padding:3px; font-size: 12px">{{ $impresiones-> SemanaDespacho }}D</span><br>
                            @endif
                            <span colspan="4" style="font-size:9px">{{ $impresiones-> Nombre_Variedad }}</span><br>
                            <span colspan="4" style="font-size:16px; display: inline-block">{{ $impresiones-> Indentificador }}</span><br>
                            <div style="margin-top: 6px"><span align="center" style="margin-top: 100%" colspan="4" id="BarCode">
                        <?php
                                    $barcode = new BarcodeGenerator();
                                    $barcode->setText($impresiones->BarCode);
                                    $barcode->setType(BarcodeGenerator::Code128);
                                    $barcode->setScale(0);
                                    $barcode->setThickness(15);
                                    $barcode->setFontSize(10);
                                    $code = $barcode->generate();
                                    echo '<img src="data:image/png;base64,' . $code . '" />';
                                    ?>
                    </span>
                                @if($impresiones-> FaseActual=='1')
                                    <label style="margin-left:-28px; font-size:13px">-I</label>
                                @elseif($impresiones-> FaseActual=='2')
                                    <label style="margin-left:-28px; font-size:13px">-T1</label>
                                @elseif($impresiones-> FaseActual=='3')
                                    <label style="margin-left:-28px; font-size:13px">-T2</label>
                                @elseif($impresiones-> FaseActual=='4')
                                    <label style="margin-left:-28px; font-size:13px">-BG</label>
                                @elseif($impresiones-> FaseActual=='5')
                                    <label style="margin-left:-28px; font-size:13px">-ST</label>
                                @elseif($impresiones-> FaseActual=='6')
                                    <label style="margin-left:-28px; font-size:13px">-M</label>
                                @elseif($impresiones-> FaseActual=='7')
                                    <label style="margin-left:-28px; font-size:13px">-E</label>
                                @elseif($impresiones-> FaseActual=='8')
                                    <label style="margin-left:-28px; font-size:13px">-A</label>
                                @elseif($impresiones-> FaseActual=='9')
                                    <label style="margin-left:-28px; font-size:13px">-D</label>
                                @endif
                            </div>

                        </td>
                        @php($count++)
                        @if($count%3==0)
                    </tr>
                @endif
            @endforeach

        </table>
    </div>
</header>


</body>

</html>
