<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- Theme JS -->
<!-- Vendor JS -->
<script src="{{ asset('admin/dist/assets/js/vendor.bundle.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('admin/dist/assets/js/theme.bundle.js') }}"></script>

<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'table lists',
        toolbar: 'blocks | bold italic underline | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | undo redo ',
        height: 300,
        menubar: ''
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
