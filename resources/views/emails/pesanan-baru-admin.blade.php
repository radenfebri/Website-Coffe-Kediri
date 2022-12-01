@component('mail::message')
## Hai, {{ $detail->name }}

Terima kasih telah melakukan pemesanan di toko kami. Berikut adalah order pemesanan anda:<br>


@component('mail::table')

| Nama Produk                 | Harga Produk                                      | Qty                                      | Sub Total                                      |
| ----------------------------|:-------------------------------------------------:|:----------------------------------------:|:----------------------------------------------:|
@php $total = 0; @endphp
@foreach ($detail->orderitem as $item)
| {{ $item->produks->name }}  | Rp. {{ number_format($item->price) }}             |     {{ number_format($item->qty) }}      |Rp. {{ number_format($item->price * $item->qty) }}
@php $total += ($item->price * $item->qty); @endphp
@endforeach
| **Total Bayar:**            | **Rp. {{ number_format($total) }}**               |                                         
| **Total Bayar + Kode Unik:**| **Rp. {{ number_format($detail->total_price) }}** |
@endcomponent


Metode Pembayaran: <b>{{ $detail->metode }}</b><br>
Nomor Pesanan: <b>{{ $detail->tracking_no }}</b><br>
Total Pembayaran: <b>Rp. {{ number_format($detail->total_price) }}</b><br>
Pesan Tambahan: <b>{{ $detail->message }}</b><br>
Alamat Pemesan: <b>{{ $detail->alamat }}</b><br>
Dibuat Pada Tanggal: <b>{{ date('d F Y',strtotime($detail->created_at)) }}</b><br>

Ada pesanan baru masuk mohon segera di Proses!! <br><br>

## Salam,
## Layanan Toko Online Putra Teguh <br> <br>

Terima Kasih,<br>
Tim Putra Teguh <br>
@endcomponent
