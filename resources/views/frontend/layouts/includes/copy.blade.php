<script>
    let copyText = document.querySelector('.copy-text');
    copyText.querySelector('button').addEventListener('click', function() {
        let input = copyText.querySelector('input');
        input.select();
        document.execCommand('copy');
        Swal.fire({
            title: "Berhasil",
            text: 'Text berhasil dicopy',
            icon: "success",
            timer: 1500,
            showConfirmButton: false,
        });
    });
</script>
