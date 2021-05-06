@push('scripts')
<script>
    Dropzone.options.fileUpload{{$id}} = {
        url: "admin/product/details/{{$type}}/{{$id}}",
        addRemoveLinks: true,
        accept: function(file) {
            let fileReader = new FileReader();

            fileReader.readAsDataURL(file);
            fileReader.onloadend = function() {

                let content = fileReader.result;
                // $('#file').val(content);
                $('#fileUpload{{$id}}').append('<input hidden name="files[]" value='+content+'/>')
                file.previewElement.classList.add("dz-success");
            }
            file.previewElement.classList.add("dz-complete");
        }
    }
</script>
@endpush
