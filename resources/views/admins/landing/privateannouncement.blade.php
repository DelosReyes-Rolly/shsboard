@include('partials.adminheader')
<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
        <!-- form -->
    <div class="">
        <form method="POST" id="createPrivateannouncement" class="needs-validation" novalidate>
            @csrf
            <div class="px-2 mt-2">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Create Private Announcement </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">
                                <div id="whoops" class="alert alert-danger" style="display: none;">
                                    <b>Whoops! There is a problem in your input</b> <br/>
                                    <div id="validation-errors"></div>
                                </div>
                                <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
                                </div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="r   ow gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="subject" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                            <input style="font-size:20px;" class="form-control @error('subject') is-invalid @enderror" id="subject" type="text" placeholder="Enter the title" name="subject"  value="{{ old('subject') }}" required>
                                            <div class="invalid-feedback">
                                                Please input subject.
                                            </div>
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="date" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                                            <input style="font-size:20px;" type="date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="Enter the date" name="date"  value="{{ old('date') }}" required>
                                            <div class="invalid-feedback">
                                                Please input date.
                                            </div>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                             <div class="form-group">
                                                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time</label><br>
                                                <input style="font-size:20px;" type="time" id="time" class="form-control" name="time" value="{{ old('time') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input time.
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="sender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                                                <input style="font-size:20px;" class="form-control @error('sender') is-invalid @enderror" id="sender" type="text" placeholder="Enter the sender" name="sender"  value="{{ old('sender') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input sender.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="recipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                                                <input style="font-size:20px;" class="form-control @error('recipient') is-invalid @enderror" id="recipient" type="text" placeholder="Enter the recipients" name="recipient"  value="{{ old('recipient') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input recipient.
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="location" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                                                <input style="font-size:20px;" class="form-control @error('location') is-invalid @enderror" id="location" type="text" placeholder="Enter the location" name="location"  value="{{ old('location') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input location.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <br><label for="post_expiration" style="font-size: 20px;"><span style="color: red">*</span> Post Expiration</label>
                                                <input style="font-size:20px;" type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="post_expiration" placeholder="Enter the date" name="post_expiration"  value="{{ old('post_expiration') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input expiry date.
                                                </div>
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-md-12">
                                                <br/><label for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                <textarea style="font-size:20px;" class="form-control @error('editor') is-invalid @enderror" id="editor" type="text" rows="10" cols="60" placeholder="Enter the information" name="editor" required>{{ old('content') }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please input content.
                                                </div>
                                            </div><br/>
                                        </div><br/>
                                        
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (img)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="image" style="font-size: 20px;">Image (Only png and jpg files are allowed)</label>
                                                <div class ="form-group row">
                                                    <div class="col-md-8"></div>
                                                    <input style="font-size:20px;" type="file" name = "image" class="form-control">
                                                </div> 
                                            </div>
                                            <!-- Save changes button-->
                                        </div>
                                        <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </form>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
    <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
    <script>
        var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form = $('#createPrivateannouncement')[0];
            var form_data =  new FormData(form);
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('add.privateannouncement') }}",
                data:form_data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response) {
                        $("#createPrivateannouncement")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Private announcement has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    if(xhr.responseJSON.error != undefined){
                        $("#validation-errors").html("");
                        $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                    }
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            }).ajaxStop(function () {
                $loading.hide();
            });
        }
</script>
</main>
<br><br><br><br>