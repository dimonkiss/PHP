<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Додати</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
<div class="container py-3">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/_header.php";
    ?>

    <h1 class="text-center">Додати категорію</h1>

    <form class="col-md-6 offset-md-3" id="categoryForm" onsubmit="return validateForm()">
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" name="name" id="name">
            <span id="nameError" class="text-danger"></span>
        </div>

        <div class="row">
            <div class="col-md-4">
                <img src="https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg" alt="Обране фото" width="100%" id="selectedImage" onclick="changeImage()">
                <span id="imageError" class="text-danger"></span>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="image" class="form-label">Оберіть фото</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*" onchange="displaySelectedImage()">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
</div>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    function displaySelectedImage() {
        var input = document.getElementById('image');
        var selectedImage = document.getElementById('selectedImage');
        var imageError = document.getElementById('imageError');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                selectedImage.src = e.target.result;
                imageError.textContent = ''; // Clear the error message when an image is selected.
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function changeImage() {
        var selectedImage = document.getElementById('selectedImage');
        var newImagePath = prompt('Enter the new image URL:');

        if (newImagePath) {
            selectedImage.src = newImagePath;
        }
    }

    function validateForm() {
        var name = document.getElementById('name').value;
        var image = document.getElementById('image').value;
        var nameError = document.getElementById('nameError');
        var imageError = document.getElementById('imageError');

        // Reset error messages
        nameError.textContent = '';
        imageError.textContent = '';

        if (name.trim() === "") {
            nameError.textContent = "Ви не ввели назву.";
            return false;
        }

        if (image.trim() === "") {
            imageError.textContent = "Ви не вибрали фото.";
            return false;
        }

        return true;
    }
</script>
</body>
</html>

