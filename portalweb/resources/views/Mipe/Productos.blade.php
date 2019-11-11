@extends('PageMaster')
@section('content')
    <style>
        .id {
            border: 1px solid black;
        }
    </style>
    <div id="Productos" class="slideLeft">

        <section class="content espacioform">

            <div class="tituloform">
                <h3>Productos</h3>
            </div>
            <div class="box box-primary  col-lg-12">

                <div class="col-lg-12">


                            <table>
                                <tr>
                                    <td class="id">1274</td>
                                    <td class="id">796</td>
                                    <td class="id">34</td>
                                    <td class="id">414</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Limonion Silver pINK B</td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="3">
                                        <?php
                                        use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

                                        $barcode = new BarcodeGenerator();
                                        $barcode->setText("0123456789");
                                        $barcode->setType(BarcodeGenerator::Code128);
                                        $barcode->setScale(1);
                                        $barcode->setThickness(55);
                                        $barcode->setFontSize(10);
                                        $code = $barcode->generate();

                                        echo '<img src="data:image/png;base64,' . $code . '" />';
                                        ?>
                                    </td>
                                    <td>
                                        <input size="1"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4"> BLL3216116002</td>
                                </tr>
                            </table>



                            <table>
                                <tr>
                                    <td class="id">1275</td>
                                    <td class="id">796</td>
                                    <td class="id">34</td>
                                    <td class="id">414</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Limonion Silver pINK B</td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="3">
                                        <?php

                                        $barcode = new BarcodeGenerator();
                                        $barcode->setText("0123456789");
                                        $barcode->setType(BarcodeGenerator::Code128);
                                        $barcode->setScale(1);
                                        $barcode->setThickness(55);
                                        $barcode->setFontSize(10);
                                        $code = $barcode->generate();

                                        echo '<img src="data:image/png;base64,' . $code . '" />';
                                        ?>
                                    </td>
                                    <td>
                                        <input size="1"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="id"> BLL3216116002</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </section>


    </div>

    <script>


    </script>

@endsection
