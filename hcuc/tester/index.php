
<!DOCTYPE html>
<html lang="en" class="">

<head>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="../zata_da/src/cp/210427.3ogdpiq0mr040c.png?1032650002" />
    <link href="../zata_da/plug-in/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/plug-in/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/plug-in/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/plug-in/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/plug-in/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/plug-in/animate.min.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/var.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/fonts.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/menu.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/header.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/footer.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/default.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/style.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/theme.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/products.css" rel="stylesheet" type="text/css">
    <link href="../zata_da/css/fields.css" rel="stylesheet" type="text/css">
    <script src="../zata_da/plug-in/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/parallaxie.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/smooth-scrollbar.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/jquery.lettering.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/panzoom.min.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/masonry.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/owl.carousel.min.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/jquery.inview.min.js" type="text/javascript"></script>
    <script src="../zata_da/plug-in/jquery-ui-1.12.1.min.js" type="text/javascript"></script>
    <script src="../zata_da/js/style.js" type="text/javascript"></script>
    <script src="../zata_da/js/form.js" type="text/javascript"></script>
    <script src="../zata_da/js/dekami.js" type="text/javascript"></script>
    <script src="../zata_da/js/menu.js" type="text/javascript"></script>
    <script>
        const DOT = `../`;
    </script>
</head>

<body>
<section mn="testform">
    <div class="container">
        <form enctype="multipart/form-data">
            <input type="file" name="file">
            <button class="btn-gen">Upload</button>
        </form>
    </div>
</section>
<script>
    $(()=>{
        let mn = 'testform',
            main = $(`[mn="${mn}"]`);

        let form = $('form', main);
        form.dekami({
            id: false,
            dot: DOT, 
            submittingText: `<p>Saving</p> `,
            link: `upload.php`,
            done: async (D) => {
                console.log(D); 

                let json = JSON.parse(D.res); 
                let w = D.form.parent();
                // w.css({
                //     'height': w.outerHeight()
                // });
                w.animate({
                    'opacity': '0'
                }, () => {
                    w.html(`<div class="wrap" style="text-align: left;"><h2>File Uploaded</h2><a target="_blank" class="btn-gen" href="src/${json?.filename}">Click Here to View File</a></div>`).queue((q) => {
                        w.animate({
                            'opacity': '1'
                        });
                        q();
                    });
                });
            }
        });
    })
</script>
</body>

</html>