                </div>
            </div>

</html>

<?php
    if ($_SERVER['REQUEST_URI'] == "/ohub/") {
?>
    <script type="text/javascript">
        $("#email").focus( function() {
            $("#icon-check").removeClass("glyphicon-envelope");
            $("#icon-check").addClass("glyphicon-refresh spinner");
        });

        $("#email").focusout(function() {
            var access_key = '5ccad6381207ebb917a7359b355340e1';
            var email_address = $("#email").val();

            $.ajax({
                url: 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address, 
                dataType: 'jsonp', 
                success: function(json) {
                    console.log(json.format_valid);
                    //console.log(json.smtp_check);
                    console.log(json.score);

                    $("#icon-check").removeClass("glyphicon-envelope");
                    $("#icon-check").removeClass("glyphicon-refresh");
                    $("#icon-check").removeClass("spinner");

                    switch(json.format_valid) {
                        case false:
                            $("#icon-check").removeClass("glyphicon-ok");
                            $("#icon-check").addClass("glyphicon-remove");
                            break;
                        case true:
                            $("#icon-check").removeClass("glyphicon-remove");
                            $("#icon-check").addClass("glyphicon-ok");
                            break;
                        default:
                            $("#icon-check").removeClass("glyphicon-ok");
                            $("#icon-check").removeClass("glyphicon-remove");
                            $("#icon-check").addClass("glyphicon-envelope");
                    }
                },
            });

        });
    </script>

    <style type="text/css" media="screen">
        .title {
            margin-bottom: 80px;
        }
        .btn {
            padding: 10px;
            border: solid 1px #FFF;
            font-size: 150%;
        }
        .glyphicon {
            margin-top: 10px;
        }
        .spinner {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }
        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }
        @media (min-width: 992px) {
            .bg-full {
                background-size: 100%;
            }
        }
    </style>

<?php } else { ?>

    <style type="text/css" media="screen">
        @media (min-width: 992px) {
            .bg-full {
                background-size: 120%;
            }
        }
    </style>

<?php } ?>

    <style type="text/css" media="screen">
        .topo {
            min-height: 70px;
            background: transparent url("<?php echo DOMAIN; ?>/view/assets/img/ohub-logo.jpg") no-repeat 0 0;
            background-color: #FFF;
            background-position: 45px -10px;
            background-size: 90px 90px;
        }
        .myDiv {
            position: relative;
            z-index: 5;
            background:#000;
            min-height: 300px;
        }
        .bg-full {
            position: absolute;
            width: 100%;
            height: 100%;
            background-position: center;
            filter: alpha(opacity=50);
            -moz-opacity: 0.5;
            -khtml-opacity: 0.5;
            opacity: 0.5;
            z-index: -1;
        }
        .centralizar {
            width:80%;
            margin-left:auto;
            margin-right:auto;
            margin-bottom: 10%;
        }
        .title {
            color: #FFF;
        }
        .form-control {
            padding: 25px;
            font-size: 150%;
        }
        @media (max-width: 992px) {
            .bg-full {
                background: transparent url("<?php echo DOMAIN; ?>/view/assets/img/bg-mobile.jpg") no-repeat 0 0;
                background-size: 100%;
            }
            .row{ padding-bottom: 10%; }
            .title {
                margin-bottom: 20px;
            }
        }
        @media (min-width: 992px) {
            .bg-full {
                background: transparent url("<?php echo DOMAIN; ?>/view/assets/img/bg-full.jpg") no-repeat 0 0;
            }
        }
    </style>