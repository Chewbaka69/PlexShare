<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plex Share :: Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon"
          href="//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.34.1-b51c37a/favicon.ico">
    <?php
        echo \Asset::css(['normalize_login.css', 'normalize.css', 'plex_login.css']);
    ?>
    <style type="text/css">
        .progress {
            height: 10px;
            margin-top: 6px;
            margin-bottom: 2px;
        }
        .progress {
            height: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
            box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        }
        .progress {
            height: 10px;
            margin-top: 6px;
            margin-bottom: 2px;
        }
        .progress-bar {
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #337ab7;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
            box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
            -webkit-transition: width .6s ease;
            -o-transition: width .6s ease;
            transition: width .6s ease;
        }
        .progress-bar-success {
            background-color: #5cb85c;
        }
        .progress-bar-warning {
            background-color: #f0ad4e;
        }
        .progress-bar-danger {
            background-color: #d9534f;
        }
    </style>
    <?php echo $start_js; ?>
</head>
<body>
<div id="plex">
    <div>
        <div class="_1uBGxd">
            <div class="_1uBGxd"
                 style="background-image: url('//assets.plex.tv/deploys/service-auth/env-648be0c1b2073a057d6c7eec3633dee2/3.34.0-9beaaa2/common/img/backgrounds/preset-dark.64cc1c942221cd2c153244bd8ecfb67a.png'); background-size: 100% 100%;"></div>
            <div class="_1uBGxd"
                 style="background-image: url('//assets.plex.tv/deploys/service-auth/env-648be0c1b2073a057d6c7eec3633dee2/3.34.0-9beaaa2/common/img/backgrounds/noise.8b05ce45d0df59343e206bc9ae78d85d.png');"></div>
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
                        <form method="post" action="" class="_19Nqmf">
                            <div class="_192KBC Gtcqpe"><label class="_3XRky5 _2aLJ9b" for="email">
                                    Email address</label><input
                                        autocomplete="email" id="email" name="email" value=""
                                        class="_3fC-K0 _1VMuma _1P2Vi4 _2sz70T _3wNGTy" type="text"></div>
                            <div class="_192KBC Gtcqpe"><label class="_3XRky5 _1sr1fk " for="username">
                                    Username </label><input
                                        autocomplete="username" id="username" name="username" value=""
                                        class="_3fC-K0 _1VMuma _1P2Vi4 _2sz70T _3wNGTy" type="text"></div>
                            <div class="_1jIT2S Gtcqpe" style="display: block"><label class="_2EAOvR _3XRky5 _2aLJ9b " for="password">
                                    Create password</label><input
                                        autocomplete="new-password" id="password" name="password" value=""
                                        placeholder="8 characters minimum"
                                        class="_2rbSul _3fC-K0 _1VMuma _1P2Vi4 _2sz70T _3wNGTy" type="password"></div>
                            <div class="_1jIT2S Gtcqpe"><label class="_2EAOvR _3XRky5 _2aLJ9b"
                                                                        for="confirm_password">
                                    Confirm password</label><input
                                        autocomplete="new-password" id="confirm_password" name="confirm_password"
                                        value=""
                                        placeholder="8 characters minimum"
                                        class="_2rbSul _3fC-K0 _1VMuma _1P2Vi4 _2sz70T _3wNGTy" type="password"></div>
                            <button type="submit" role="button"
                                    class="_1SYIVj _1I3Olm _1A8EcL _2kT68l _2n0yJn _3S9UdJ _1A8EcL _2kT68l _2n0yJn  _2kT68l _2n0yJn _3fwLzo _3S9UdJ _2n0yJn _2XA2bN">
                                <span class="_1NdZWc"><div class="_1TgDPI Niere7 _2kLwt_ _3PStHE Niere7 _2kLwt_"
                                                           aria-label="Loading"></div></span><span class="_1Rv20d">Create an account</span>
                            </button>
                        </form>
                        <span class="_3kVXYV _3TSWy2">Already have an account?
                            <span class="_32cscE">—</span>
                            <a href="/login" role="link" class="_2XYrUh _2-G21v">Sign in!</a>
                            </span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $end_js; ?>
<script type="text/javascript">
    $('#password').on('keydown', function () {
        if($('.progress').length === 0)
            $('#password').pwstrength();
    });
</script>
<devBy style="display: none;">Created By Chewbaka69 // https://github.com/Chewbaka69/PlexShare</devBy>
</body>
</html>