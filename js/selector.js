tinymce.init({
    selector: 'textarea#siuu',
    plugins: [
      'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
      'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
      'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
      'alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help | image | link image',
      image_title: true,
      automatic_uploads: true,
      file_picker_types: 'image',
      file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
    
        input.addEventListener('change', (e) => {
          const file = e.target.files[0];
    
          const reader = new FileReader();
          reader.addEventListener('load', () => {
            const id = 'blobid' + (new Date()).getTime();
            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), { title: file.name });
          });
          reader.readAsDataURL(file);
        });
    
        input.click();
      },
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
      language: "es"
  });