<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EAPsoftware</title>

    <!-- Favicons -->
    <link href="{{asset('assets/landing/img/Tongle_Logo.png')}}" rel="icon">
    <link href="{{asset('assets/landing/img/Tongle_Logo.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/landing/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/landing/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/landing/css/owl.theme.default.min.css')}}" rel="stylesheet">

    <style>
        .custom-header-btn {
            font-family: "Lato", Sans-serif;
            font-size: 12px;
            font-weight: 700;
            line-height: 18px;
            fill: #002332;
            color: #002332 !important;
            background-color: transparent;
            background-image: linear-gradient(90deg, #FE612C 15%, #FFA12C 100%);
            border-radius: 40px 40px 40px 40px;
            padding: 9px 33px 6px 33px;
            border: none !important;
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .logo a img {
            width: 75px;
            height: 75px;
            object-fit: cover;
        }

        .card-top-img {
            width: 66px;
            height: 66px;
            object-fit: cover;
            position: absolute;
            left: 50%;
            top: -10%;
            transform: translate(-50%, 0%);
        }

        .card-left-img {
            width: 66px;
            height: 66px;
            object-fit: cover;
            position: absolute;
            top: 10%;
            transform: translate(-75%, 0%);
        }

        .card-left-center-img {
            width: 66px;
            height: 66px;
            object-fit: cover;
            position: absolute;
            top: 50%;
            transform: translate(-75%, -50%);
            border-radius: 50%;
        }

        .text-yellow {
            color: #FFA12C !important;
        }

        .rotated-text {
            color: white;
            transform: rotate(-70deg);
            right: 70px;
            font-size: 20px;
        }

        .header-text {
            color: #002332;
            font-size: 29px;
            font-weight: 700;
            line-height: 35px;
        }

        #developmentRequestForm label {
            font-size: 14px;
        }

        #developmentRequestForm input::placeholder, #developmentRequestForm textarea::placeholder, #developmentRequestForm input[type='file'] {
            color: #999999;
            font-size: 12px;
        }

        .vertical-separator {
            padding: 1px;
            height: 200px;
            background-color: #002332;
        }

        .vertical-separator-orange {
            padding: 1px;
            height: 200px;
            background-color: #ffa12c;
        }

        .custom-card-header {
            color: #ffa12c;
            font-family: "Poppins", Sans-serif;
            font-size: 30px;
            font-weight: 700;
            line-height: 39px;
            font-style: italic;
        }

        .card-body-text {
            text-align: left;
            font-family: "Lato", Sans-serif;
            font-size: 15px;
            font-weight: 400;
            font-style: italic;
            line-height: 25px;
        }

        .all-divs {
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: 1fr;
            grid-column-gap: 30px;
            grid-row-gap: 30px;
        }

        .review-divs {
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: 1fr;
            grid-column-gap: 30px;
            grid-row-gap: 30px;
        }

        .all-divs div {
            min-height: 120px;
        }

        .italic-separator {
            height: 100%;
            background: #FFA12C;
            width: 1px;
            /*position: absolute;*/
            /*left: 0;*/
            /*top: 50%;*/
            transform: translateY(-50%) rotate(13deg);
        }
        .review-card {
            border-radius: 30px;border-color: #ffa12c;border-style: solid;
            border-width: 1px 1px 1px 1px;
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            padding: 51px 29px 33px 32px;
            z-index: -1;
        }
        .quotes-img {
            height: auto;
            width: 45px !important;
            position: absolute;
            top: -10%;
            left: 12%;
            z-index: 999;
            transform: translate(-50%, 0%);
        }
    </style>
</head>
