document.getElementById('image').addEventListener('change', function() {
    var fileName = this.files.length ? this.files[0].name : document.getElementById('file-name').dataset.nofile;
    document.getElementById('file-name').textContent = fileName;
});
