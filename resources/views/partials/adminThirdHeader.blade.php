<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- title of site -->
    <title>SVNHS-SHS BOARD</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome-5.12.1.css') }}">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->
  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script> -->

	<!-- head -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-4.7.0.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/google-font-raleway.css') }}">
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-body.css') }}">


</head>
<body>
    <!--sidebar end-->
    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
</body>
</html>