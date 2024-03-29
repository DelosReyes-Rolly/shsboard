
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: calc(4em + 10vw);
            text-align: center;
            color: #fff;
            background-image: linear-gradient(-225deg, #cf2778, #7c64d5, #4cc3ff);
            overflow: hidden;
        }

        h1 {
            font-size: 1em;
            font-weight: 700;
            text-shadow: 0 0 0.1em rgba(0, 0, 0, 0.5);
        }

        h1 span::after {
            content: '🕛';
            font-size: 0.9em;
            animation: clock 5s linear infinite;
        }

        h2 {
            font-size: 0.15em;
            font-weight: 700;
            line-height: 1.2;
            margin-top: 1em;
            text-shadow: 0 0 0.2em rgba(0, 0, 0, 0.5);
        }

        .apple-os h1 span {
            margin: 0 0.1em;
        }

        .apple-os h2 {
            margin-top: 0.4em;
        }

        @keyframes clock {
            8.333% {
                content: '🕐';
            }

            16.666% {
                content: '🕑';
            }

            25% {
                content: '🕒';
            }

            33.333% {
                content: '🕓';
            }

            41.666% {
                content: '🕔';
            }

            50% {
                content: '🕕';
            }

            58.333% {
                content: '🕖';
            }

            66.666% {
                content: '🕗';
            }

            75% {
                content: '🕘';
            }

            83.333% {
                content: '🕙';
            }

            91.666% {
                content: '🕚';
            }
        }
    </style>
    <title>Request Timed Out</title>
    <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}'/>
</head>
<body>
    <h1 aria-label="408 Error">4<span></span>8</h1>
    <h2>Server request timed out.</h2>
</body>
<script>
    if (navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i)) document.body.classList.add('apple-os');
</script>
</html>