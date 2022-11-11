@include('partials.landingheader')
    <!-- login start -->
    <br/><br/><br/><br/>
    <div class="loginchoice">     
			<div class="col-md-12 text-center">
        <div class="box-form">
          <div class="left">
            <div class="overlay">
              <center>
                <img src="img/shs.png">
                <h6>SENIOR HIGH <br> SCHOOL BOARD</h6>
              </center>
            </div>
          </div>
          <div class="right">
            <br><br>
            <b style="font-size:40px; color: #266C2A;"> Hello Signalian! </b><br><br>
            <b style="font-size:20px"> Please click below to proceed to your destination. </b><br><br>
            <center><br><br>
              <a href="/login/admins"><button class="buttones btn btn-primary left-to-right" style="border-radius: 10px; background-color:green">ADMIN</button></a><br><br>
              <a href="/login/students"><button class="buttones btn btn-primary right-to-left" style="border-radius: 10px;">STUDENT</button></a><br><br>
              <a href="/login/faculties"><button class="buttones buttones2 btn btn-primary left-to-right" style="border-radius: 10px;">FACULTY</button></a><br><br>
            </center>
          </div>
        </div>
        <br><br><br><br>
      </div>
    </div>
    
      <!-- login end -->
@include('partials.landingfooter')