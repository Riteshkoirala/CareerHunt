
        let input = document.getElementById('image');
        let change = document.getElementById('changing');
        let changed = document.getElementById('cropped');
        let cropper = document.getElementById('cropper');
        let croppedImageData = document.getElementById('cropped-image-name');

        let croppieInstance = null; // Declare a global variable to hold the Croppie instance

        function initializeCroppie(input) {
            if (input.files && input.files[0]) {
                let fil = input.value;
                let extension = fil.split('.');

                if(extension[1] === 'jpg'){
                    extension[1] = 'jpeg';
                }
                change.classList.remove('d-none');

                var reader = new FileReader();
                reader.onload = function (e) {
                    if (croppieInstance) {
                        croppieInstance.destroy(); // Destroy the previous Croppie instance if it exists
                    }
                    croppieInstance = new Croppie(cropper, {
                        viewport: { width: 400, height: 200, type: 'rectangle'},
                        boundary: { width: 450, height: 300 },
                        showZoomer: true,
                        mouseWheelZoom: 'ctrl',
                    });
                    croppieInstance.bind({
                        url: e.target.result,
                        zoom: 0,
                        orientation: 4
                    });
                    change.addEventListener('click', function () {
                        changed.classList.remove('d-none');
                        croppieInstance.result({
                            type: 'canvas',
                            size: 'original',
                            format: extension[1],
                            quality: 1
                        }).then(function (result) {
                            document.getElementById('cropped-image').src = result;
                            croppedImageData.value = result;
                        });
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        input.addEventListener('change', function () {
            initializeCroppie(this);
        });



