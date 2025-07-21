const fileInput = document.getElementById('fileInput');
const previewContainer = document.getElementById('preview-container');
const preview = document.getElementById('preview');

    fileInput.addEventListener('change', function () {
        const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
                preview.style.display = 'none';
            }
        });