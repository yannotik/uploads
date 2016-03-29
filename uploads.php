<html>
<head>
    <title>upload</title>
    <style>
        .item_img{
            width: 20%;
            float: left;
        }
        .item_img img{
            max-width: 100%;
            height: auto;
            display: block;
        }
        p{
            clear: both;
            margin: 5px 0;
        }
    </style>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="40000">
    <input multiple="multiple" type="file" name="file_name[]"><br><br>
    <input type="submit" name="submit">
</form>

<?php
$dir = scandir("uploads/");
function getExtension1($filename) {
    return end(explode(".", $filename));
}

if(isset($_POST['submit'])){
    //print_r($_POST);
    //print_r($_FILES);
    foreach($_FILES['file_name']['tmp_name'] as $k => $v){
        move_uploaded_file($v, "uploads/".$_FILES['file_name']['name'][$k]);
    }
}

foreach($dir as $k => $itemDir) {
    if ($itemDir != '.' && $itemDir != '..') {
        if (getExtension1($itemDir) === 'png' || getExtension1($itemDir) === 'jpg' || getExtension1($itemDir) === 'PNG' ||getExtension1($itemDir) === 'JPG') {
            echo "<div class='item_img'><img src='http://localhost/1/uploads/$itemDir'></div>";
        } else {
            echo "<p>";
            echo "<a href=?file_name=$itemDir>$itemDir</a>";
            echo "</p>";
        }
    }
}
?>
</body>
</html>

