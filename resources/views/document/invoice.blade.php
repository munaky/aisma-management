<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AISMA Office & School Furniture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        .testimony::-webkit-scrollbar {
            display: none;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body style="font-family: 'Montserrat', sans-serif;">

    <!-- Header -->
    <header class="mb-4 mt-3">
        <div class="flex items-center">
            <img src="https://i.ytimg.com/vi/rex8RRK0ZjQ/maxresdefault.jpg" alt="Logo PT. NAWASENA AISMA PERSADA"
                class="w-1/5">
            <div class="absolute top-18 right-20 -ml-20 text-right">
                <div class="text-2xl font-bold">{{ $data->company }}</div>
                <div>{{ $data->company_address }}</div>
                <div>{{ $data->contact }}</div>
                <div>NIB: {{ $data->company_nib }}</div>
                <div>NPWP: {{ $data->company_npwp }}</div>
                <div>Email: {{ $data->company_email }}</div>
            </div>
        </div>
    </header>

    <!-- Judul dan Informasi Tanggal dan Penerima -->

    <div class="container mx-auto flex flex-col items-center mb-4">
        <h1 class="text-3xl font-bold mb-2">FAKTUR PEMBELIAN</h1>
        <div class="text-left ml-80 -mr-40">
            <p>Bogor, Oktober 2023</p>
            <p>Kepada Yth.</p>
            <p>{{ $data->client }}</p>
            <p>Di Tempat</p>
        </div>
    </div>

    <!-- Isi faktur pembelian dapat ditambahkan di sini -->
    <div class="container mx-auto mb-4">

        <!-- Table -->
        <table class="w-full border-collapse border border-gray-800">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-800 p-2 w-1">No</th>
                    <th class="border border-gray-800 p-2 w-2/5">Deskripsi</th>
                    <th class="border border-gray-800 p-2 w-1">Qty</th>
                    <th class="border border-gray-800 p-2 w-1">Satuan</th>
                    <th class="border border-gray-800 p-2 w-1/5">Harga</th>
                    <th class="border border-gray-800 p-2 w-1/5">Jumlah</th>
                </tr>
            </thead>

            <tbody>
                <!-- Example rows (you can duplicate this for multiple items) -->
                <!-- Row 1 -->
                @foreach ($data->products as $i => $val)
                <tr>
                    <td class="border border-gray-800 p-2 text-center">{{ $i + 1 }}</td>
                    <td class="border border-gray-800 p-2">{{ $val['name']}}</td>
                    <td class="border border-gray-800 p-2 text-center">{{ $val['amount'] }}</td>
                    <td class="border border-gray-800 p-2 text-center">{{ $val['unit']}}</td>
                    <td class="border border-gray-800 p-2 text-center">Rp. {{ $val['price'] }}</td>
                    <td class="border border-gray-800 p-2 text-center">Rp. {{ $val['total'] }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="flex justify-between">
        <div class="text-md ml-40">
            <p><strong>Catatan:</strong></p>
            <ol class="list-decimal ml-4">
                <li>Barang yang sudah dibeli tidak dapat dikembalikan.</li>
                <li>Pembayaran melalui bilyet giro a.n {{ $data->company }}.</li>
                <li>Pembayaran via transfer Bank BCA:</li>
                <ul class="list-disc ml-6">
                    <li class="font-bold">No rek: 4270337215</li>
                    <li class="font-bold">a.n {{ $data->company }}</li>
                </ul>
                <li>NPWP: {{ $data->company_npwp }}</li>
            </ol>
        </div>

        <div class="mt-4 mr-40">
            <div class="flex justify-between">
                <div class="w-1/4">
                    <div class="flex justify-between">
                        <span class="mr-3">Subtotal</span>
                        <span class="text-nowrap">{{ $data->total }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Diskon</span>
                        <span class="ml-20">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="mr-7">DP</span>
                        <span class="ml-20 -mr-20">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="mr-6">Tax</span>
                        <span class="ml-20 -mr-20">-</span>
                    </div>
                    <div class="font-bold flex justify-between">
                        <span class="mr-9">Total</span>
                        <span class="text-nowrap">{{ $data->total }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex justify-between mb-40">
        <div class="mt-8 ml-40">
            <p class="text-center text-xl">Tanda Terima</p>
            <!-- Tambahkan tempat tanda tangan di sini -->
            <div class="mt-8">

            </div>
            <p>(Nama Penerima)</p>
        </div>

        <div class="mt-8 mr-40">
            <p class="text-center text-xl">Hormat Kami</p>
            <!-- Tambahkan tempat tanda tangan di sini -->
            <div class="mt-8">

            </div>
            <p class="font-bold">{{ $data->director }}</p>
        </div>
    </div>

    <!-- Header -->
    <header class="mb-4 mt-3">
        <div class="flex items-center">
            <img src="https://i.ytimg.com/vi/rex8RRK0ZjQ/maxresdefault.jpg" alt="Logo PT. NAWASENA AISMA PERSADA"
                class="w-1/5">
            <div class="absolute top-18 right-20 -ml-20 text-right">
                <div class="text-2xl font-bold">{{ $data->company }}</div>
                <div>{{ $data->company_address }}</div>
                <div>{{ $data->contact }}</div>
                <div>NIB: {{ $data->company_nib }}</div>
                <div>NPWP: {{ $data->company_npwp }}</div>
                <div>Email: {{ $data->company_email }}</div>
            </div>
        </div>
    </header>

    <!-- Judul dan Informasi Tanggal dan Penerima -->
    <div class="ml-10">
        <div class="container mx-auto flex flex-col items-center mb-4">
            <h1 class="text-4xl font-bold mb-2">KWITANSI </br> RECEIPT</h1>
            <div class="text-left ml-80 -mr-40">
                <p style="display: inline;">Nomor </br> Number.</p>
                <p style="display: inline;">{{ $data->serial_number . $data->serial_desc}}</p>

            </div>

        </div>

        <div class="mb-4 flex justify-between mt-20 mb-5">
            <div class="ml-20 text-xl">
                <p class="mb-20">Telah terima dari : </br> Received from</p>
                <p class="mb-20">Sejumlah Uang : </br> Amount received</p>
                <p class="">Untuk pembayaran : </br> In payment of</p>
            </div>
            <div class="text-left mr-80 text-2xl font-bold">
                <p class="mb-40">{{ $data->client }}</p>
                <p class="mb-40 -mt-10 bg-gray-200">{{ $data->total_word }}</p>
                @foreach ($data->products as $i)
                <p class="mb-40 -mt-20">{{ $i['name'] . " " . $i['amount'] . " " . $i['unit'] }}</p>
                @endforeach
                <p class="mb-4 text-4xl bg-gray-200 inline-block px-4">{{ $data->total }}</p>

            </div>
        </div>

        <div class="mb-4 flex justify-between mt-20">
            <div class="ml-20 text-xl">
                <p class="mb-20">Setuju dibayar,</br>Kuasa Pengguna Anggaran</p>
            </div>
            <div class="text-left mr-80 text-xl ">
                <p class="mb-20">Lunas dibayar,</br>Bendahara Pengeluaran</p>
            </div>
            <div class="text-left mr-80 text-xl ">
                <p class="mb-20">Bogor, Oktober 2023
                    </br>Penerima </br>Direktur</p>
            </div>
        </div>

        <div class="mb-4 flex justify-between mt-20">
            <div class="ml-20 text-xl">
                <p class="mb-20 mr-60">(…...................................)</p>
            </div>
            <div class="text-left mr-80 text-xl ">
                <p class="mb-20">(…...................................)</p>
            </div>
            <div class="text-left mr-80 text-xl ">
                <p class="mb-20 ml-20 font-bold">{{ $data->director }}</p>
            </div>
        </div>
    </div>

</body>

</html>
