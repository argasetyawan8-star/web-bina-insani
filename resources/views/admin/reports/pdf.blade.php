<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<style>

body{

font-family: DejaVu Sans;

font-size:12px;

}

table{

width:100%;

border-collapse:collapse;

margin-top:20px;

}

th,td{

border:1px solid #ccc;

padding:8px;

}

th{

background:#2563eb;

color:white;

}

h2{

text-align:center;

}

</style>

</head>

<body>

<h2>

Laporan Peserta Bina Insani

</h2>

<table>

<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Program</th>

<th>Pembayaran</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($registrations as $item)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $item->full_name }}

</td>

<td>

{{ $item->program->name }}

</td>

<td>

{{ ucfirst($item->payment_status) }}

</td>

<td>

{{ ucfirst($item->status) }}

</td>

<td>

{{ $item->created_at->format('d-m-Y') }}

</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>