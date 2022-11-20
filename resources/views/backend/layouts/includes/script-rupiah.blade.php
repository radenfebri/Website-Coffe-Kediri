<script>
    var harga_asli = document.getElementById("harga_asli");
    harga_asli.addEventListener("keyup", function(e) {
        harga_asli.value = formatRupiah(this.value, "Rp. ");
    });
    
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        harga_asli = split[0].substr(0, sisa),
        harga_asli = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            separator = sisa ? "." : "";
            harga_asli += separator + ribuan.join(".");
        }
        
        harga_asli = split[1] != undefined ? harga_asli + "," + split[1] : harga_asli;
        return prefix == undefined ? harga_asli : harga_asli ? "Rp. " + harga_asli : "";
    }
    
    
    var harga_promo = document.getElementById("harga_promo");
    harga_promo.addEventListener("keyup", function(e) {
        harga_promo.value = formatRupiah(this.value, "Rp. ");
    });
    
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        harga_promo = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            harga_promo += separator + ribuan.join(".");
        }
        
        harga_promo = split[1] != undefined ? harga_promo + "," + split[1] : harga_promo;
        return prefix == undefined ? harga_promo : harga_promo ? "Rp. " + harga_promo : "";
    }
    
</script>