<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <script src="{{ asset('assets/js/fontawesome-solid-5.0.13.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome-5.0.13.js') }}"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.css" integrity="sha512-OYICNnYNhX7ixX/LTrUu7Ao9FfMOfIh0AU7iQIt4zzdjZhm6sF5VLMkJ3VNvyzhxpWOd9VwnYFgZykPbmVslBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Go back from top -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <script>
        let mybutton = document.getElementById("myBtn");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <footer class="footer-section" style="padding-top: 40px;">
        <div class="container">
            <div class="footer-cta pt-5 pb-5 left-to-right">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <a href="https://www.google.com/maps/place/Signal+Village+National+High+School/@14.5117582,121.0563753,17z/data=!3m1!4b1!4m5!3m4!1s0x3397cf4a1d73ce63:0xee3c515e804d53cb!8m2!3d14.5117302!4d121.0585702"><span class="footer-a">Ballecer, Taguig, Metro Manila</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <a href="tel:09192749312"><span class="footer-a">0919 274 9312</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <a href="mailto: sdotapat.svnhs@deped.gov.ph"><span class="footer-a">sdotapat.svnhs@deped.gov.ph</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <br>
            <div class="footer-content pt-5 pb-5 right-to-left">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">

                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a class="a-footer" href="https://www.facebook.com/soarhighseniorhigh/"><i class="fab facebook-bg footer-fb" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: bold; font-size: 22px;">f</i></a>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <ul class="ul-footer">
                                    <li class="li-footer"><a class="a-footer" href='{{ url("/") }}'>Home</a></li>
                                    <li class="li-footer"><a class="a-footer" href='{{ url("generalannouncements") }}'>Announcements</a></li>
                                    <li class="li-footer"><a class="a-footer" href='{{ url("events") }}'>Events</a></li>
                                    <li class="li-footer"><a class="a-footer" href='{{ url("/faculty") }}'>Faculty</a></li>
                                    <li class="li-footer"><a class="a-footer" href='{{ url("/login/students") }}'>Student Login</a></li>
                                    <li class="li-footer"><a class="a-footer" href='{{ url("/faculties") }}'>Faculty Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-3 text-center text-lg-left">
                        <div class="copyright-text">
                            <p><b>Copyright &copy; 2022.</b><a class="systematech" href="mailto: systematechbsit@gmail.com"> SystemaTECH.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>