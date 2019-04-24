<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <?php
    echo \Asset::css(['normalize.css', 'plex.css', 'main.css']);
    echo \Asset::js(['jquery.min.js']);
    ?>
    <link rel="shortcut icon"
          href="//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.34.1-b51c37a/favicon.ico">
</head>