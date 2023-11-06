<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Notes</title>
    <style>
        body{
            background-size: cover;
        }
        table td {
            font-size: 10px;
        }
        table.data td, table.data th {
            border: 1px solid #ccc;
            padding: 5px;
        }
        table.data {
            border-collapse: collapse;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .centered-text {
            text-align: center;
            font-size: 10px;
            color: #999; /* Muted color */
        }
        .watermark {
        position: relative;
    }

    .watermark::after {
        content: "ORIGINAL";
        color: rgba(0, 0, 0, 0.1); /* Change the color and opacity of the watermark */
        font-size: 80px;
        position: absolute;
        top: 22%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none; /* Ensures the watermark doesn't interfere with mouse events */
    }
    .watermark2 {
        position: relative;
    }

    .watermark2::after {
        content: "DUPLICATE";
        color: rgba(0, 0, 0, 0.1); /* Change the color and opacity of the watermark */
        font-size: 80px;
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none; /* Ensures the watermark doesn't interfere with mouse events */
    }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td rowspan="4" width="60%">
                <img src="{{ public_path($setting->path_logo) }}" alt="{{ $setting->path_logo }}" height="80" width="180">
                <br>
                &nbsp;&nbsp;{{ $setting->alamat }}
            </td>
            <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Date:</td>
            <td>{{ tanggal_indonesia(date('Y-m-d')) }}</td>
        </tr>
        <tr>
            <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Customer:</td>
            <td>{{ $penjualan->member->nama ?? '' }}</td>
        </tr>
        <tr>
            <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Address:</td>
            <td>{{ $penjualan->member->alamat ?? '' }}</td>
        </tr>
        <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Agent:</td>
    </table>
    <!-- Main content table -->
    <table class="data" width="100%">
        <thead>
            <tr style="font-size: 12px; font-family: arial">
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody class="watermark">
            @foreach ($detail as $key => $item)
            <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td>{{ $item->produk->nama_produk }}</td>
                <td>{{ $item->produk->kode_produk }}</td>
                <td class="text-right">{{  number_format($item->harga_jual, 0,',',',') }}</td>
                <td class="text-right">{{ format_uang($item->jumlah) }}</td>
                <td class="text-right">{{ $item->diskon }}</td>
                <td class="text-right">{{ number_format($item->subtotal, 0,',',',') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"><b></b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"><b></b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"></td>
            </tr>
        </tfoot>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right"><b>Total Price</b></td>
                <td class="text-right">{{ number_format($penjualan->total_harga, 0, ',', ',') }}</td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Discount</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->diskon) }}</b></td>
            </tr>
            
        </tfoot>
    </table>
    <h1 class style="font-size: 12px;">Prepared by:<br>Checked by:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received by:&nbsp;________________________<br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<i>Signature over Printed Name & Date</i>)<br>Delivered by:</h1>
    <table width="100%">
        <tr>
            <td style="color:red"><b><i>This is only a <u>Transfer Receipt</u> Form and it is not an invoice. Invoice
                        will follow upon final receipt and
                        liquidation</i><br>==============================================================================================================================</b>
            </td>
            <p class="text-center"></p>
        </tr>
    </table>

    <!-- Duplicate your content for printing -->
    <br>
    <table width="100%">
        <tr>
            <td rowspan="4" width="60%">
                <img src="{{ public_path($setting->path_logo) }}" alt="{{ $setting->path_logo }}" height="80" width="180">
                <br>
                &nbsp;&nbsp;{{ $setting->alamat }}
            </td>
            <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Date:</td>
            <td>{{ tanggal_indonesia(date('Y-m-d')) }}</td>
        </tr>
        <tr>
            <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Customer:</td>
            <td>{{ $penjualan->member->nama ?? '' }}</td>
        </tr>
        <tr>
            <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Address:</td>
            <td>{{ $penjualan->member->alamat ?? '' }}</td>
        </tr>
        <td class style="text-align:right;">&nbsp;&nbsp;&nbsp;Agent:</td>
    </table>
    <!-- Duplicate content table -->
    <table class="data" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody class="watermark2">
            @foreach ($detail as $key => $item)
            <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td>{{ $item->produk->nama_produk }}</td>
                <td>{{ $item->produk->kode_produk }}</td>
                <td class="text-right">{{ format_uang($item->harga_jual) }}</td>
                <td class="text-right">{{ format_uang($item->jumlah) }}</td>
                <td class="text-right">{{ $item->diskon }}</td>
                <td class="text-right">{{ number_format($item->subtotal, 0,',',',') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b></b></td>
                <td class="text-right"><b></b></td>
            </tr>
        <tfoot>
        <tr>
                <td colspan="6" class="text-right"><b>Discount</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->diskon) }}</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Total Price</b></td>
                <td class="text-right">{{ number_format($penjualan->total_harga, 0, ',', ',') }}</td>
            </tr>
      
        </tfoot>
    </table>
    <h1 class style="font-size: 12px;">Prepared by:<br>Checked by:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received by:&nbsp;________________________<br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<i>Signature over Printed Name & Date</i>)<br>Delivered by:</h1>
    <table width="100%">
        <tr>
        <td style="color:red"><b><i>This is only a <u>Transfer Receipt</u> Form and it is not an invoice. Invoice
                        will follow upon final receipt and
                        liquidation</i><br>==============================================================================================================================</b>
            </td>
            <p class="text-center"></p>
        </tr>
    </table>
</body>
</html>
