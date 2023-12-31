<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AISMA Office & School Furniture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .testimony::-webkit-scrollbar {
            display: none;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
<body style="font-family: 'Montserrat', sans-serif;">

    <!-- Header -->
    <header class="mb-4 mt-3 ml-20">
        <div class="flex items-center">
            <img src="https://i.ytimg.com/vi/rex8RRK0ZjQ/maxresdefault.jpg" alt="Logo PT. NAWASENA AISMA PERSADA" class="w-1/5">
            <div class="text-left mt-5">
                <div class="text-2xl font-bold">{{ $data->company }}</div>
                <div>{{ $data->company_address }}</div>
                <div>{{ $data->contact }}</div>
                <div>NIB: {{ $data->company_nib }}</div>
                <div>NPWP: {{ $data->company_npwp }}</div>
                <div>Email: {{ $data->company_email }}</div>

            </div> <h1 class="text-3xl font-bold mb-2 ml-60 -mt-20">SURAT JALAN</h1>
            <div class="mt-40 -ml-60">
                <p>No Surat Jalan: '{{ $data->serial_number . $data->serial_desc}}'</p>
                <p>Tanggal: '{{ $data->date }}'</p>
                <p>Nomor PO: </p>
                <p>Dikirim dengan: {{ $data->sent_via }}</p>
                <p>Nama Pengemudi: {{ $data->driver_name}}</p>
            </div>
        </div>
        <div class="border border-solid border-gray-700 border-t-4 border-r-4 border-b-4 border-l-4 inline-block px-4 py-2 ml-40 font-bold mb-5">
            <p>Kepada Yth.</p>
            <p>{{ $data->client }}</p>
            <p>Di Tempat</p>
        </div>


    </header>

    <div class="mx-auto max-w-screen-2xl mt-3">
        <p class="mb-6">Harap diterima dengan baik barang-barang tersebut di bawah ini</p>
        <table class="border-collapse w-full mt-4 table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-solid border-gray-700 p-2">No</th>
                    <th class="border border-solid border-gray-700 p-2">Nama Barang</th>
                    <th class="border border-solid border-gray-700 p-2">Qty</th>
                    <th class="border border-solid border-gray-700 p-2">Satuan</th>
                    <th class="border border-solid border-gray-700 p-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add rows with your data here -->
                @foreach ($data->products as $i => $val)
                <tr>
                    <td class="border border-solid border-gray-700 p-2 text-center">{{ $i + 1 }}</td>
                    <td class="border border-solid border-gray-700 p-2">{{ $val->detail->name }}</td>
                    <td class="border border-solid border-gray-700 p-2 text-center">{{ $val->amount }}</td>
                    <td class="border border-solid border-gray-700 p-2 text-center">{{ $val->detail->unit }}</td>
                    <td class="border border-solid border-gray-700 p-2" style="max-width: 200px">{{ $val->detail->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<div class="">
<div class="mb-4 flex justify-between mt-20">
    <div class="ml-40 text-2xl">
        <p class="mb-20 ml-10 font-bold">Penerima</p>
    </div>
    <div class="text-lefttext-xl ">
        <p class="mb-20 font-bold">Pengirim</p>
    </div>
    <div class="text-lefttext-xl ">
        <p class="mb-20 -ml-60 font-bold">Operational Manager</p>
    </div>
    <div class="text-lefttext-xl ">
        <p class="mb-20 -ml-60 font-bold">Direktur</p>
    </div>
</div>

<div class="mb-4 flex justify-between mt-20">
    <div class="ml-40 text-xl">
        <p class="mb-20 ml-2 font-bold">(....................................)</p>
    </div>
    <div class="text-lefttext-xl -ml-8">
        <p class="mb-20 ml-40 font-bold"> ({{ $data->driver_name }})</p>
    </div>
    <div class="text-lefttext-xl ">
        <p class="mb-20  font-bold -ml-10">{{ $data->manager }}</p>
    </div>
    <div class="text-lefttext-xl ">
        <p class="mb-20  font-bold mr-20 -ml-3">{{ $data->director }}</p>
    </div>
</div>
</div>
</body>
</html>
