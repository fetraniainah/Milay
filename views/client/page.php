<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title()?></title>
</head>

<body>
    <form action="/admin/post/detail" method="POST" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple>
        <button type="submit">Télécharger</button>
    </form>
</body>

</html>