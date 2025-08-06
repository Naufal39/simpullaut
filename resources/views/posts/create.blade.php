<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.css">
</head>

<body>
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>

        <label for="content">Content</label>
        <input id="content" type="hidden" name="content">
        <trix-editor input="content"></trix-editor>

        <br><br>

        <button type="submit">Create</button>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

    <script src="https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.js"></script>
    <script>
        // Menangani upload gambar ke server saat gambar disisipkan di Trix
        document.addEventListener('trix-attachment-add', function(event) {
            var attachment = event.attachment;

            if (attachment.file) {
                // Mengirim file gambar ke server
                var formData = new FormData();
                formData.append('file', attachment.file);

                // Kirim file gambar ke server untuk di-upload
                fetch('{{ route('upload-image') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Ganti URL base64 dengan URL gambar yang valid
                        attachment.setAttributes({
                            url: data.url
                        });
                    })
                    .catch(error => console.error('Error uploading image:', error));
            }
        });
    </script>
</body>

</html>
