<?php
    $page_title = "The John Zone";
    $profile_name = "John Smith";
    $profile_image = "profile.png";
    $profile_tagline = " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultricies sit amet augue eget suscipit. Ut ipsum orci, egestas sed consequat nec, interdum eu sem. Aenean consequat velit in quam luctus, non feugiat urna lobortis. Etiam scelerisque tortor mi. Phasellus eleifend metus lorem, id pulvinar odio sagittis quis. Sed non nisl commodo nunc convallis gravida. In sagittis dapibus ullamcorper. Nam scelerisque neque ac turpis sodales malesuada. Curabitur semper dui non hendrerit mollis. Suspendisse fringilla magna nunc, ut sodales sapien ultricies sit amet. Aliquam id viverra sapien, nec ornare sapien. Nullam scelerisque mi elit, quis ullamcorper justo dictum auctor.";
    $colour_header = "#ecf3f7";
    $colour_main = "#ecf1f3";
    $colour_footer = "#e1ebf2";
    $colour_detail = "#d0d0d0";
    $colour_text_primary = "#105289";
    $colour_text_secondary = "#9189ae";
    $background_body = "";
    # $background_body = "Digital_graphic_pattern_90.png";
    $font_primary = "";
    # $font_primary = "\"Comic Sans MS\", \"Comic Sans\", cursive";
    $border_radius = "10"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-image: url("<?php echo $background_body; ?>");
            background-repeat:repeat-x repeat-y;
            font-family: <?php echo $font_primary; ?>;
            font-size: 10px;
        }
        .wrap-content{
            max-width:800px;
        }
        .block {
            border-radius: <?php echo $border_radius; ?>px;
            background: <?php echo $colour_main; ?>;
            padding: 10px;
            margin:10px;
            box-shadow: 2px 2px 5px lightgray;
            /*background-image: url('glass.jpg');
            background-size:cover;*/
        }

        .block-header {
            background: <?php echo $colour_header; ?>;
        }
        .block-footer {
            background: <?php echo $colour_footer; ?>;
        }
        .block-title{
            color: <?php echo $colour_text_primary; ?>;
            border-bottom: solid 1px <?php echo $colour_detail; ?>;
            font-weight:bold;
        }
        .block-flex {
            flex-grow:1;
            width:0;
            margin:5px;
        }
        .block-flex:first-child {
            margin-left:0;
        }
        .block-flex:last-child {
            margin-right:0;
        }
        .container-flex {
            display: flex;
            flex-flow: row;
            background:none;
            padding:0;
            width:100%;
        }
        .content-text {
            color: <?php echo $colour_text_secondary; ?>;
            
        }
    </style>
</head>
<body>
    <div class="wrap-content container-sm">
        <!-- header -->
        <!-- variable-width content blocks -->
        <div class="block container-flex">
            <div class="block block-header block-flex">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo $profile_image; ?>" class="profile_image img-fluid">
                        <p class="profile_name text-center"><?php echo $profile_name; ?></p>
                    </div>
                    <div class="col">
                        <h3 class="page-title"><?php echo $page_title; ?></h3>
                        <span class="profile_tagline"><?php echo $profile_tagline; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- main content -->
        <!-- variable-width content blocks -->
        <div class="block container-flex">
            <div class="block block-flex">
                <div class="block-glass"></div>
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
        </div>
        <!-- variable-width content blocks -->
        <div class="block container-flex">
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
        </div>
        <div class="block container-flex">
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
            <div class="block block-flex">
                <p class="block-title">HEADING</p>
                <p class="content-text">lorem ipsum etc.</p>
            </div>
        </div>

        <!-- footer -->
        <!-- variable-width content blocks -->
        <div class="block block-footer container">
            <p class="block-title">Footer</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>