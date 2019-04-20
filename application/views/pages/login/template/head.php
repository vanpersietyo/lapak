<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 18/04/2019
 * Time: 14:34
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAPAK - Aplikasi Laporan Aktivitas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/login_v14/images/pemkot/edpa.png')?>"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login_v14/')?>css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=base_url('assets/third_party/')?>sweetalert/dist/sweetalert2.css">
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login_v14/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body style="background-color: #666666;">
<style>
    #fountainG{
        position:relative;
        width:234px;
        height:28px;
        margin:auto;
    }

    .fountainG{
        position:absolute;
        top:0;
        background-color:rgb(0,0,0);
        width:28px;
        height:28px;
        animation-name:bounce_fountainG;
        -o-animation-name:bounce_fountainG;
        -ms-animation-name:bounce_fountainG;
        -webkit-animation-name:bounce_fountainG;
        -moz-animation-name:bounce_fountainG;
        animation-duration:1.5s;
        -o-animation-duration:1.5s;
        -ms-animation-duration:1.5s;
        -webkit-animation-duration:1.5s;
        -moz-animation-duration:1.5s;
        animation-iteration-count:infinite;
        -o-animation-iteration-count:infinite;
        -ms-animation-iteration-count:infinite;
        -webkit-animation-iteration-count:infinite;
        -moz-animation-iteration-count:infinite;
        animation-direction:normal;
        -o-animation-direction:normal;
        -ms-animation-direction:normal;
        -webkit-animation-direction:normal;
        -moz-animation-direction:normal;
        transform:scale(.3);
        -o-transform:scale(.3);
        -ms-transform:scale(.3);
        -webkit-transform:scale(.3);
        -moz-transform:scale(.3);
        border-radius:19px;
        -o-border-radius:19px;
        -ms-border-radius:19px;
        -webkit-border-radius:19px;
        -moz-border-radius:19px;
    }

    #fountainG_1{
        left:0;
        animation-delay:0.6s;
        -o-animation-delay:0.6s;
        -ms-animation-delay:0.6s;
        -webkit-animation-delay:0.6s;
        -moz-animation-delay:0.6s;
    }

    #fountainG_2{
        left:29px;
        animation-delay:0.75s;
        -o-animation-delay:0.75s;
        -ms-animation-delay:0.75s;
        -webkit-animation-delay:0.75s;
        -moz-animation-delay:0.75s;
    }

    #fountainG_3{
        left:58px;
        animation-delay:0.9s;
        -o-animation-delay:0.9s;
        -ms-animation-delay:0.9s;
        -webkit-animation-delay:0.9s;
        -moz-animation-delay:0.9s;
    }

    #fountainG_4{
        left:88px;
        animation-delay:1.05s;
        -o-animation-delay:1.05s;
        -ms-animation-delay:1.05s;
        -webkit-animation-delay:1.05s;
        -moz-animation-delay:1.05s;
    }

    #fountainG_5{
        left:117px;
        animation-delay:1.2s;
        -o-animation-delay:1.2s;
        -ms-animation-delay:1.2s;
        -webkit-animation-delay:1.2s;
        -moz-animation-delay:1.2s;
    }

    #fountainG_6{
        left:146px;
        animation-delay:1.35s;
        -o-animation-delay:1.35s;
        -ms-animation-delay:1.35s;
        -webkit-animation-delay:1.35s;
        -moz-animation-delay:1.35s;
    }

    #fountainG_7{
        left:175px;
        animation-delay:1.5s;
        -o-animation-delay:1.5s;
        -ms-animation-delay:1.5s;
        -webkit-animation-delay:1.5s;
        -moz-animation-delay:1.5s;
    }

    #fountainG_8{
        left:205px;
        animation-delay:1.64s;
        -o-animation-delay:1.64s;
        -ms-animation-delay:1.64s;
        -webkit-animation-delay:1.64s;
        -moz-animation-delay:1.64s;
    }

    @keyframes bounce_fountainG{
        0%{
            transform:scale(1);
            background-color:rgb(0,0,0);
        }

        100%{
            transform:scale(.3);
            background-color:rgb(255,255,255);
        }
    }

    @-o-keyframes bounce_fountainG{
        0%{
            -o-transform:scale(1);
            background-color:rgb(0,0,0);
        }

        100%{
            -o-transform:scale(.3);
            background-color:rgb(255,255,255);
        }
    }

    @-ms-keyframes bounce_fountainG{
        0%{
            -ms-transform:scale(1);
            background-color:rgb(0,0,0);
        }

        100%{
            -ms-transform:scale(.3);
            background-color:rgb(255,255,255);
        }
    }

    @-webkit-keyframes bounce_fountainG{
        0%{
            -webkit-transform:scale(1);
            background-color:rgb(0,0,0);
        }

        100%{
            -webkit-transform:scale(.3);
            background-color:rgb(255,255,255);
        }
    }

    @-moz-keyframes bounce_fountainG{
        0%{
            -moz-transform:scale(1);
            background-color:rgb(0,0,0);
        }

        100%{
            -moz-transform:scale(.3);
            background-color:rgb(255,255,255);
        }
    }
</style>