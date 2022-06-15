<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plex Share :: Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon"
          href="//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.34.1-b51c37a/favicon.ico">
    <?php
    echo \Asset::css(['normalize_login.css', 'plex_login.css']);
    ?>
    <style type="text/css">
        body {
            background-color:#3f4245
        }
        #plex,body,html {
            min-height:100%;
            width:100%;
            display:flex;
            justify-content:center
        }
        #plex {
            display:flex;
            flex-direction:column;
            align-items:stretch;
            justify-content:center
        }

    </style>
    <?php echo $start_js; ?>
</head>
<body>
<div id="plex">
    <div>
        <div class="_1uBGxd">
            <div class="_1uBGxd"
                 style="background-image: url('//assets.plex.tv/deploys/service-auth/env-648be0c1b2073a057d6c7eec3633dee2/3.38.0-f9084a3/common/img/backgrounds/preset-dark.64cc1c942221cd2c153244bd8ecfb67a.png'); background-size: 100% 100%;"></div>
            <div class="_1uBGxd"
                 style="background-image: url('//assets.plex.tv/deploys/service-auth/env-648be0c1b2073a057d6c7eec3633dee2/3.38.0-f9084a3/common/img/backgrounds/noise.8b05ce45d0df59343e206bc9ae78d85d.png');"></div>
        </div>
        <div class="_1QZ31E">
            <div class="_39jOML">
                <div class="_3qSICF">
                    <div class="NE-7v1">
                        <div class="_2K4VHL"></div>
                        <div>Share</div>
                    </div>
                    <div class="_2zl_7T">
                        <?php if(isset($error) && $error) : ?>
                        <div class="_3arxVY">
                            <span class="FCU2Ru"><?php echo $error; ?></span>
                        </div>
                        <?php endif; ?>
                        <form action method="post" class="_19Nqmf" novalidate="">
                            <div class="_192KBC Gtcqpe"><label class="_3XRky5 _2aLJ9b " for="email">
                                    Email or Username</label><input
                                        tabindex="1" autocomplete="username email" id="email" name="email" value=""
                                        class="_3fC-K0 _1VMuma _1P2Vi4 _2sz70T _3wNGTy  " type="email"></div>
                            <div class="_192KBC Gtcqpe"><label class="_2EAOvR _3XRky5 _2aLJ9b " for="password">
                                    Password</label><input tabindex="2"
                                                                                                      autocomplete="current-password"
                                                                                                      id="password"
                                                                                                      name="password"
                                                                                                      value=""
                                                                                                      class="_2rbSul _3fC-K0 _1VMuma _1P2Vi4 _2sz70T _3wNGTy  "
                                                                                                      type="password">
                                <button tabindex="3" role="button" class="KTFiTP _2n0yJn _2n0yJn _2XA2bN      "
                                        type="button">Forgot?
                                </button>
                            </div>
                            <button type="submit" role="button"
                                    class="_1SYIVj _1I3Olm _1A8EcL _2kT68l _2n0yJn _3S9UdJ _1A8EcL _2kT68l _2n0yJn  _2kT68l _2n0yJn _3fwLzo _3S9UdJ _2n0yJn _2XA2bN">
                                <span class="_1NdZWc">
                                    <div class="_1TgDPI Niere7 _2kLwt_ _3PStHE Niere7 _2kLwt_" aria-label="Loading"></div>
                                </span>
                                <span class="qxG01S">Sign in</span>
                            </button>
                        </form>
                        <?php if($registration) : ?>
                        <span class="_3kVXYV _3TSWy2">Need an account? <a href="/register" role="link" class=" _2n0yJn _1vcAGA ">Create an account!</a></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<devBy style="display: none;">Created By Chewbaka69 // https://github.com/Chewbaka69/PlexShare</devBy>
</body>
</html>