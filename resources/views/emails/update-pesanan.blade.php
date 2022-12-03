@component('mail::message')
## Hai, {{ $order->name }}

Kami informasikan kembali untuk pesanan anda saat ini, dengan kode pesanan #{{ $order->tracking_no }}.<br>
Berikut adalah status pesanan anda:
@if ($order->status == '0') 
## BELUM BAYAR
@elseif($order->status == '1')
## PROSES PACKING
@elseif($order->status == '2')
## PROSES KIRIM
@elseif($order->status == '3')
## TRANSAKSI SELESAI
@endif
<br>

@if ($order->message_admin == null)
    
@else
Note dari kami: <b><i>{{ $order->message_admin }}</i></b><br><br>
@endif

Terimakasih Telah order di toko kami, Ditunggu Next Ordernya!! <br><br>

<b>Salam Dari Kami,</b><br>
<b>Tim Putra Teguh</b><br>
@endcomponent
