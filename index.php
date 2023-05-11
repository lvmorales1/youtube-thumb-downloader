<?php
if (isset($_POST['button'])) {
    $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $download = curl_exec($ch);
    curl_close($ch);

    header('Content-type: image/jpg');
    header('Content-Disposition: attachment; filename="thumbnail.jpg"');
    echo $download;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Youtube Thumbnail Downloader</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <header>Download Thumbnail</header>
        <div class="url-input">
            <span class="title">Paste video url:</span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/watch?v=0w4K8yW8gOg" required>
                <input class="hidden-input" type="hidden" name="imgurl">
                <div class="bottom-line"></div>
            </div>
        </div>
        <div class="preview-area">
            <img class="thumbnail" src="" alt="thumbnail">
            <i class='bx bxs-cloud-download icon'></i>
            <span>Paste video url to see preview</span>
        </div>
        <button class="download-btn" type="submit" name="button">Download thumbnail</button>
    </form>

    <script src="js/script.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>