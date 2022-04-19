@extends('layouts.app')
@section('main-container')
    <style>
        .box {
            position: relative;
        }
        .box::before {
            content: "";
            width: 370px;
            height: 370px;
            background-color: #fdca6e;
            position: absolute;
            z-index: -1;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }
        .box-body {
            position: relative;
            height: 200px;
            width: 200px;
            margin-top: 123.3333333333px;
            background-color: #cc761e;
            border-bottom-left-radius: 5%;
            border-bottom-right-radius: 5%;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.3);
            background: linear-gradient(#764e2c,#cc761e);
        }
        .box-body .img{
            opacity: 0;
            ransform: translateY(0%);
            transition: all 0.5s;
            margin: 0 auto;
            display: block;
        }
        .box-active {
            cursor: pointer;
            -webkit-animation: box-body 1s forwards ease-in-out;
            animation: box-body 1s forwards ease-in-out;
        }
        .box-active .img{
            opacity: 1;
            z-index: 0;
            transform: translateY(-157px);
        }
        .box-active .box-lid {
            -webkit-animation: box-lid 1s forwards ease-in-out;
            animation: box-lid 1s forwards ease-in-out;
        }
        .box-active .box-bowtie::before {
            -webkit-animation: box-bowtie-left 1.1s forwards ease-in-out;
            animation: box-bowtie-left 1.1s forwards ease-in-out;
        }
        .box-active .box-bowtie::after {
            -webkit-animation: box-bowtie-right 1.1s forwards ease-in-out;
            animation: box-bowtie-right 1.1s forwards ease-in-out;
        }
        .box-body::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            width: 50px;
            background: linear-gradient(#ffffff,#ffefa0);}
        .box-lid {
            position: absolute;
            z-index: 1;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            bottom: 90%;
            height: 40px;
            background-color: #cc761e;
            height: 40px;
            width: 220px;
            border-radius: 5%;
            box-shadow: 0 8px 4px -4px rgba(0, 0, 0, 0.3);
        }
        .box-lid::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            width: 50px;
            background: linear-gradient(#ffefa0,#fff)
        }
        .box-bowtie {
            z-index: 1;
            height: 100%;
        }
        .box-bowtie::before, .box-bowtie::after {
            content: "";
            width: 83.3333333333px;
            height: 83.3333333333px;
            border: 16.6666666667px solid white;
            border-radius: 50% 50% 0 50%;
            position: absolute;
            bottom: 99%;
            z-index: -1;
        }
        .box-bowtie::before {
            left: 50%;
            -webkit-transform: translateX(-100%) skew(10deg, 10deg);
            transform: translateX(-100%) skew(10deg, 10deg);
        }
        .box-bowtie::after {
            left: 50%;
            -webkit-transform: translateX(0%) rotate(90deg) skew(10deg, 10deg);
            transform: translateX(0%) rotate(90deg) skew(10deg, 10deg);
        }

        @-webkit-keyframes box-lid {
            0%,
            42% {
                -webkit-transform: translate3d(-50%, 0%, 0) rotate(0deg);
                transform: translate3d(-50%, 0%, 0) rotate(0deg);
            }
            60% {
                -webkit-transform: translate3d(-85%, -230%, 0) rotate(-25deg);
                transform: translate3d(-85%, -230%, 0) rotate(-25deg);
            }
            90%, 100% {
                -webkit-transform: translate3d(-119%, 225%, 0) rotate(-70deg);
                transform: translate3d(-119%, 225%, 0) rotate(-70deg);
            }
        }

        @keyframes  box-lid {
            0%,
            42% {
                -webkit-transform: translate3d(-50%, 0%, 0) rotate(0deg);
                transform: translate3d(-50%, 0%, 0) rotate(0deg);
            }
            60% {
                -webkit-transform: translate3d(-85%, -230%, 0) rotate(-25deg);
                transform: translate3d(-85%, -230%, 0) rotate(-25deg);
            }
            90%, 100% {
                -webkit-transform: translate3d(-119%, 225%, 0) rotate(-70deg);
                transform: translate3d(-119%, 225%, 0) rotate(-70deg);
            }
        }
        @-webkit-keyframes box-body {
            0% {
                -webkit-transform: translate3d(0%, 0%, 0) rotate(0deg);
                transform: translate3d(0%, 0%, 0) rotate(0deg);
            }
            25% {
                -webkit-transform: translate3d(0%, 25%, 0) rotate(20deg);
                transform: translate3d(0%, 25%, 0) rotate(20deg);
            }
            50% {
                -webkit-transform: translate3d(0%, -15%, 0) rotate(0deg);
                transform: translate3d(0%, -15%, 0) rotate(0deg);
            }
            70% {
                -webkit-transform: translate3d(0%, 0%, 0) rotate(0deg);
                transform: translate3d(0%, 0%, 0) rotate(0deg);
            }
        }
        @keyframes  box-body {
            0% {
                -webkit-transform: translate3d(0%, 0%, 0) rotate(0deg);
                transform: translate3d(0%, 0%, 0) rotate(0deg);
            }
            25% {
                -webkit-transform: translate3d(0%, 25%, 0) rotate(20deg);
                transform: translate3d(0%, 25%, 0) rotate(20deg);
            }
            50% {
                -webkit-transform: translate3d(0%, -15%, 0) rotate(0deg);
                transform: translate3d(0%, -15%, 0) rotate(0deg);
            }
            70% {
                -webkit-transform: translate3d(0%, 0%, 0) rotate(0deg);
                transform: translate3d(0%, 0%, 0) rotate(0deg);
            }
        }
        @-webkit-keyframes box-bowtie-right {
            0%,
            50%,
            75% {
                -webkit-transform: translateX(0%) rotate(90deg) skew(10deg, 10deg);
                transform: translateX(0%) rotate(90deg) skew(10deg, 10deg);
            }
            90%,
            100% {
                -webkit-transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
                transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
                box-shadow: 0px 4px 8px -4px rgba(0, 0, 0, 0.3);
            }
        }
        @keyframes  box-bowtie-right {
            0%,
            50%,
            75% {
                -webkit-transform: translateX(0%) rotate(90deg) skew(10deg, 10deg);
                transform: translateX(0%) rotate(90deg) skew(10deg, 10deg);
            }
            90%,
            100% {
                -webkit-transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
                transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
                box-shadow: 0px 4px 8px -4px rgba(0, 0, 0, 0.3);
            }
        }
        @-webkit-keyframes box-bowtie-left {
            0% {
                -webkit-transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
                transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
            }
            50%,
            75% {
                -webkit-transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
                transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
            }
            90%,
            100% {
                -webkit-transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
                transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
            }
        }
        @keyframes  box-bowtie-left {
            0% {
                -webkit-transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
                transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
            }
            50%,
            75% {
                -webkit-transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
                transform: translate(-50%, -15%) rotate(45deg) skew(10deg, 10deg);
            }
            90%,
            100% {
                -webkit-transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
                transform: translateX(-100%) rotate(0deg) skew(10deg, 10deg);
            }
        }
        #box {
            cursor: pointer;
        }
        .box-image {
            border-radius: 10px;
            box-shadow: 0 0 20px #00000024;
        }
        .box-logo {
            position: absolute;
            top: 34%;
            right: 9%;
            height: 75px;
            z-index: 10000;
        }
    </style>
    <section class="terms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center text-dark mb-5"><strong>Apasă pe cadou pentru a-ți remedia caștigul</strong></h3>
                </div>
                <div class="col-12 mt-3 d-flex justify-content-center">
                    <div class="box">
                        <div id="box" class="box-body">
                            <img class="img box-image" src="http://127.0.0.1:8000/items/1649811564.jpg" height="130">
                            <img class="box-logo" src="{{ asset('/assets/images/logo.png') }}">
                            <div class="box-lid">
                                <div class="box-bowtie"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#box').click(function () {
            $('#box').addClass('box-active');
        });
    </script>
@endsection
