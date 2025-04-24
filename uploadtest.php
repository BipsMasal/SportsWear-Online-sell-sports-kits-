<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Title: <input type="text" name="title"> <br>
        Price: <input type="text" name="price"> <br>
        Description: <textarea rows="20" cols="50" name="description"></textarea> <br>
    <input type="file" name="file"> <br>
    <button type="submit" name="submit">Upload</button>
    </form>

    </body>
</html>

