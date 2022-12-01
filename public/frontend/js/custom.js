$(document).ready(function () {
    loadcart();
    // loadorder();
    loadwishlist();
    // loadpesanan();
    
    function loadcart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
            },
        });
    }
    
    function loadwishlist() {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-data",
            success: function (response) {
                $(".wish-count").html("");
                $(".wish-count").html(response.count);
            },
        });
    }
    
    // function loadorder() {
    //     $.ajax({
    //         method: "GET",
    //         url: "/load-order-data",
    //         success: function (response) {
    //             $(".order-count").html("");
    //             $(".order-count").html(response.count);
    //         },
    //     });
    // }
    
    // function loadpesanan() {
    //     $.ajax({
    //         method: "GET",
    //         url: "/load-pesanan-data",
    //         success: function (response) {
    //             $(".pesanan-count").html("");
    //             $(".pesanan-count").html(response.count);
    //         },
    //     });
    // }
    
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        
        var produk_id = $(this).closest(".produk_data").find(".prod_id").val();
        var produk_qty = $(this)
        .closest(".produk_data")
        .find(".qty-input")
        .val();
        
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                produk_id: produk_id,
                produk_qty: produk_qty,
            },
            success: function (response) {
                if (response.status == "warning") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Login Sekarang",
                        // footer: '<a href="">Why do I have this issue?</a>',
                    }).then(function () {
                        window.location = "/login";
                    });
                } else if (response.status == "success") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "info") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "error") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                }
                
                loadcart();
            },
        });
    });
    
    $(".addToWishlist").click(function (e) {
        e.preventDefault();
        
        var produk_id = $(this).closest(".produk_data").find(".prod_id").val();
        
        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                produk_id: produk_id,
            },
            success: function (response) {
                if (response.status == "warning") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Login Sekarang",
                        // footer: '<a href="">Why do I have this issue?</a>',
                    }).then(function () {
                        window.location = "/login";
                    });
                } else if (response.status == "success") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "info") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "error") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                }
                
                loadwishlist();
            },
        });
    });
    
    // KONDISI UNTUK DESKTOP
    $(document).on("click", ".delete-cart-item", function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest(".produk_data").find(".prod_id").val();
        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                $(".produk").load(location.href + " .produk");
                if (response.status == "warning") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Login Sekarang",
                        // footer: '<a href="">Why do I have this issue?</a>',
                    }).then(function () {
                        window.location = "/login";
                    });
                } else if (response.status == "success") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "info") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "error") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                }
                
                // window.location.reload();
                loadcart();
            },
        });
    });
    
    // KONDISI UNTUK DESKTOP
    $(document).on("click", ".delete-favorit-item", function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest(".produk_data").find(".prod_id").val();
        
        $.ajax({
            method: "POST",
            url: "/delete-favorit-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                $(".favorit").load(location.href + " .favorit");
                if (response.status == "warning") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Login Sekarang",
                        // footer: '<a href="">Why do I have this issue?</a>',
                    }).then(function () {
                        window.location = "/login";
                    });
                } else if (response.status == "success") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "info") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "error") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                }
                
                // window.location.reload();
                loadwishlist();
            },
        });
    });
    
    // KONDISI UNTUK DESKTOP
    $(document).on("click", ".changeQuantity", function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest(".produk_data").find(".prod_id").val();
        var qty = $(this).closest(".produk_data").find(".qty-input").val();
        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                $(".cartItem").load(location.href + " .cartItem");
                // swal("", response.status, "info");
            },
        });
    });
    
    // KONDISI UNTUK MOBILE
    $(document).on("click", ".delete-cart-item-mobile", function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest(".produk_data").find(".prod_id").val();
        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                $(".produk_mobile").load(location.href + " .produk_mobile");
                if (response.status == "warning") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Login Sekarang",
                        // footer: '<a href="">Why do I have this issue?</a>',
                    }).then(function () {
                        window.location = "/login";
                    });
                } else if (response.status == "success") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "info") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "error") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                }
                
                // window.location.reload();
                loadcart();
            },
        });
    });
    
    // KONDISI UNTUK MOBILE
    $(document).on("click", ".delete-favorit-item-mobile", function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest(".produk_data").find(".prod_id").val();
        
        $.ajax({
            method: "POST",
            url: "/delete-favorit-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                $(".favorit_mobile").load(location.href + " .favorit_mobile");
                if (response.status == "warning") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Login Sekarang",
                        // footer: '<a href="">Why do I have this issue?</a>',
                    }).then(function () {
                        window.location = "/login";
                    });
                } else if (response.status == "success") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "success",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "info") {
                    Swal.fire({
                        title: "Berhasil",
                        text: response.message,
                        icon: "info",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                } else if (response.status == "error") {
                    Swal.fire({
                        title: "Gagal",
                        text: response.message,
                        icon: "error",
                        timer: 5000,
                        confirmButtonColor: "#f35a38",
                        confirmButtonText: "Oke",
                    });
                }
                
                // window.location.reload();
                loadwishlist();
            },
        });
    });
    
    // KONDISI UNTUK MOBILE
    $(document).on("click", ".changeQuantity-mobile", function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest(".produk_data").find(".prod_id").val();
        var qty = $(this).closest(".produk_data").find(".qty-input").val();
        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                $(".cartItem_mobile").load(location.href + " .cartItem_mobile");
                // swal("", response.status, "info");
            },
        });
    });
    
    // KONDISI UNTUK DESKTOP
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();
        
        var inc_value = $(this).closest('.produk_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.produk_data').find('.qty-input').val(value);
        }
    });
    
    // KONDISI UNTUK DESKTOP
    $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();
        
        var dec_value = $(this).closest('.produk_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.produk_data').find('.qty-input').val(value);
        }
    });
    
    
    // KONDISI UNTUK MOBILE
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();
        
        var inc_value = $(this).closest('.produk_mobile').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.produk_mobile').find('.qty-input').val(value);
        }
    });
    
    // KONDISI UNTUK MOBILE
    $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();
        
        var dec_value = $(this).closest('.produk_mobile').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.produk_mobile').find('.qty-input').val(value);
        }
    });
});
