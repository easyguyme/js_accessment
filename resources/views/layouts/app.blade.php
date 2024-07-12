<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job search engine implementation">

    <title>Search - {{ config('app.name') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="preload"
          as="style">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        @media(min-width: 768px) {
            #aemploye-profile .modal-wrapper {
                width: 30% !important;
                margin: 1.75rem auto !important;
            }
        }

        #aemploye-profile .modal-body {
            overflow-x: hidden !important;
            overflow-y: auto !important;
        }

        .benefits-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .benefits-tags input,
        .technologies input {
            position: absolute;
            opacity: 0;
        }

        .benefits-tags span {
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #474C54;
            background: rgba(241, 242, 244, 0.4);
            border: 1px solid #E4E5E8;
            border-radius: 4px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .benefits-tags input:checked~span,
        .benefits-tags span.active {
            color: #0A65CC;
            background: #E7F0FA;
            border: 1px solid #0A65CC;
            border-radius: 4px;
        }

        .mr--10px {
            margin-right: 10px
        }

        .ml--10px {
            margin-left: 10px
        }

        .tooltip-inner {
            max-width: 300px;
        }

        .whatsapp-button {
            background: rgb(243, 243, 243);
            border-radius: 35px;
            display: flex;
            -webkit-box-flex: 2;
            flex-grow: 2;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            height: 40px;
            border: 1px solid rgb(223, 223, 223);
            width: 144px;
            max-width: 160px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 15px;
        }
    </style>
    @vite(['resources/frontend/sass/app.scss', 'resources/frontend/app.css'])

    <style>
        :root {
            --primary-500: #0A65CC !important;
            --primary-600: #0851a4 !important;
            --primary-200: #b6d1f0 !important;
            --primary-100: #cee1f5 !important;
            --primary-50: #eef5fc !important;
            --gray-20: #fbfcfe !important;
        }
    </style>
</head>


<body>
@include('partials.header')
@yield('main')
@include('partials.footer')
@include('partials.scripts')
<script>
    // Hide the preloader when loaded
    var el = document.querySelector(".preloader");
    el && window.addEventListener("load", () => el.style.display = "none");
</script>

</body>
</html>
