'use strict';

var PhotoUtils = (function() {
    var fileInput = document.getElementsByClassName('custom-file-input')[0];
    var fileLabel = fileInput.nextElementSibling;
    var image = document.getElementsByClassName('img-thumbnail')[0];


    // Letter
    var convertFileToFileList = (file) => {
        let dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        return dataTransfer.files;
    };

    var getPhotoFile = (photo) => {
        let bstr = atob(photo.content);
        let n = bstr.length;
        let u8arr = new Uint8Array(n);
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], photo.filename, { type: photo.type });
    };

    var setFile = (file) => {
        fileInput.files = convertFileToFileList(file);
    };

    var reloadPhoto = () => {
        let photoHidden = document.getElementsByClassName('json-photo')[0];
        if (typeof photoHidden !== 'undefined') {
            let photo = JSON.parse(photoHidden.value);
            let file = getPhotoFile(photo);
            setFileName(file);
            loadImage(file);
        }
    };

    // This is the thing
    var loadImage = (file) => {
        let reader = new FileReader();
        reader.onload = function (e) {
            image.src = e.target.result;
        };
        reader.readAsDataURL(file);
    };

    var setFileName = (file) => {
        let filename = file.name;
        fileLabel.innerText = filename;
    };

    var getFile = () => {
        return fileInput.files[0];
    };

    var photoPreview = () => {
        let file = getFile();
        setFileName(file);
        loadImage(file);
    };


    var onFileInputChange = function (event) {
        photoPreview();
    };

    var init = () => {
        fileInput.onchange = onFileInputChange;
    };

    return {
        init: init,
        reloadPhoto: reloadPhoto
    };

})();
