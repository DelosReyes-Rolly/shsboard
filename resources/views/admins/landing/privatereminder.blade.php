@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
        <!-- form -->
    <div class="">
            <form method="POST" id="createPrivatereminder" class="needs-validation" novalidate>
                @csrf
                <div class="px-2 mt-2 left-to-left">
                    <!-- page navigation-->
                    <h3 style="font-size: 28px; font-weight: 800;">Create Private Reminder</h3>
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
                                        <div class="">
                                        <div class="mb-3" style="color: red">
                                            * required field
                                        </div>
                                            <!-- Form Group (content)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80" required>{{ old('content') }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please input content.
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expiry Date</label>
                                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}" required>
                                                    <div class="invalid-feedback">
                                                        Please input expiry date.
                                                    </div>
                                                </div>
                                            </div><br/>
                                            <!-- Save changes button-->
                                            <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                </div>
            </form>
        <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script> -->
        @if ($message = Session::get('approval'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
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
            var form = $('#createPrivatereminder')[0];
            var form_data =  new FormData(form);
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('add.privatereminder') }}",
                data:form_data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response) {
                        $("#createPrivatereminder")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Private reminder has been added successfully',
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