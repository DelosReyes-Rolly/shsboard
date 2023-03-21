@include('partials.landingheader')
<style>
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #d3d0cf;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
<input type="hidden" id="isOpen" name="isOpen" value="{{$schoolyear->isRegister}}">
<main style="padding: 80px 40px 0px 40px;"><br /><br />
    <!-- announcements -->
    <section id="about" class="about fade-in-text">
        <div class="announcementletter" style="color: green; font-weight:bold;">MODIFIED BASIC EDUCATION ENROLLMENT FORM</div>
        <hr style="border: 1px solid black">
        <div id="main-content" class="blog-page">
            <div>
                <div class="mb-3" style="color: red">
                    * required field
                </div>
                <form action="javascript:void(0)" id="RegisterForm" name="RegisterForm" class="form-horizontal" method="POST">
                    <div class="row">
                        <span class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade level to enroll') }}</label><br>
                            <select id="gradelevel_id" name="gradelevel_id" id="gradelevel_id" class="form-control" style="font-size: 18px;" required>
                                <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                @foreach($gradelevels as $gradelevel_id)
                                <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                                @endforeach
                            </select>
                        </span>
                        <span class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label class="container">
                                No LRN
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </span>
                        <span class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label class="container">
                                With LRN
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </span>
                        <span class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label class="container">
                                Returning (Balik-Aral)
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label><br /><br /><br /><br />
                        </span>

                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;">STUDENT INFORMATION</div>

                        <div class="col-lg-6 col-md-12 col-sm-12"><br /><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> PSA Birth Certificate No. (if available upon registration)</label>
                            <input id="psa_no" type="text" name="psa_no" class="form-control @error('psa_no') is-invalid @enderror" value="{{ old('psa_no') }}" style="font-size: 18px;" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12"><br /><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> LRN</label>
                            <input id="lrn" type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{ old('LRN') }}" style="font-size: 18px;" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br /><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                            <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br /><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                            <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br /><br />
                            <label style="font-size: 20px;"> Middle Name</label>
                            <input id="middle_name" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br /><br />
                            <label style="font-size: 20px;">Suffix</label>
                            <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12"><br /><br />
                            <label style="font-size: 20px;">Birthdate</label>
                            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" style="font-size: 20px;" placeholder="Enter the date" name="birthdate" value="{{ old('birthdate') }}" required>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12"><br /><br />
                            <label style="font-size: 20px;">Sex</label>
                            <select id="gender" name="gender" class="form-control" style="font-size: 18px;" required>
                                <option value="" {{old('gender') == "" ?'selected' : ''}} disabled> Please Select Sex </option>
                                <option value="Male">Male </option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12"><br /><br />
                            <label style="font-size: 20px;"> Age</label>
                            <input type="number" id="age" name="age" class="form-control @error('age') is-invalid @enderror" style="font-size: 20px;" onkeypress="return onlyNumberKey(event)" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            Belonging to any Indigenous Peoples (IP) Community/Indigenous Cultural Community?
                            <label class="container">
                                YES
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">
                                NO
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"> Please Specify</label>
                            <input id="isIndigenous" type="text" name="isIndigenous" class="form-control @error('isIndigenous') is-invalid @enderror" value="{{ old('isIndigenous') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> Mother Tongue</label>
                            <input id="mother_tongue" type="text" name="mother_tongue" class="form-control @error('mother_tongue') is-invalid @enderror" value="{{ old('mother_tongue') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;"><br /><br /><br /><br />
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;">ADDRESS</div>

                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> House Number and Street</label>
                            <input id="street" type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> Barangay</label>
                            <input id="city" type="text" name="barangay" class="form-control @error('barangay') is-invalid @enderror" value="{{ old('barangay') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> City/Municipality/Province/Country</label>
                            <input id="city" type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> Zip code</label>
                            <input style="font-size: 16px;" type="text" class="form-control @error('zip_code') is-invalid @enderror" onkeypress="return onlyNumberKey(event)" name="zip_code"><br /><br /><br /><br />
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;">PARENT’S/GUARDIAN’S INFORMATION</div>

                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Father's Last Name</label>
                            <input id="father_last_name" type="text" name="father_last_name" class="form-control @error('father_last_name') is-invalid @enderror" value="{{ old('father_last_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Father's First Name</label>
                            <input id="father_first_name" type="text" name="father_first_name" class="form-control @error('father_first_name') is-invalid @enderror" value="{{ old('father_first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Father's Middle Name</label>
                            <input id="father_middle_name" type="text" name="father_middle_name" class="form-control @error('father_middle_name') is-invalid @enderror" value="{{ old('father_middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Father's Suffix</label>
                            <input id="father_suffix" type="text" name="father_suffix" class="form-control @error('father_suffix') is-invalid @enderror" value="{{ old('father_suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Mother's Last Name</label>
                            <input id="mother_last_name" type="text" name="mother_last_name" class="form-control @error('mother_last_name') is-invalid @enderror" value="{{ old('mother_last_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Mother's First Name</label>
                            <input id="mother_first_name" type="text" name="mother_first_name" class="form-control @error('mother_first_name') is-invalid @enderror" value="{{ old('mother_first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Mother's Middle Name</label>
                            <input id="mother_middle_name" type="text" name="mother_middle_name" class="form-control @error('mother_middle_name') is-invalid @enderror" value="{{ old('mother_middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Mother's Suffix</label>
                            <input id="mother_suffix" type="text" name="mother_suffix" class="form-control @error('mother_suffix') is-invalid @enderror" value="{{ old('mother_suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Guardian's Last Name</label>
                            <input id="guardian_last_name" type="text" name="guardian_last_name" class="form-control @error('guardian_last_name') is-invalid @enderror" value="{{ old('guardian_last_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;"><span style="color: red">*</span> Guardian's First Name</label>
                            <input id="guardian_first_name" type="text" name="guardian_first_name" class="form-control @error('guardian_first_name') is-invalid @enderror" value="{{ old('guardian_first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Guardian's Middle Name</label>
                            <input id="guardian_middle_name" type="text" name="guardian_middle_name" class="form-control @error('guardian_middle_name') is-invalid @enderror" value="{{ old('guardian_middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Guardian's Suffix</label>
                            <input id="guardian_suffix" type="text" name="guardian_suffix" class="form-control @error('guardian_suffix') is-invalid @enderror" value="{{ old('guardian_suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Telephone No. </label>
                            <input style="font-size: 16px;" type="text" class="form-control @error('phone_number') is-invalid @enderror" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="11" name="phone_number">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12"><br />
                            <label style="font-size: 20px;">Cellphone No. </label>
                            <input style="font-size: 16px;" type="text" class="form-control @error('cellphone_number') is-invalid @enderror" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="11" name="cellphone_number"><br /><br /><br /><br />
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;">For Returning Learners (Balik-Aral) and Those Who Shall Transfer/Move In</div>

                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> Last Grade Level Completed </label>
                            <input type="number" id="last_grade_level" name="last_grade_level" class="form-control @error('last_grade_level') is-invalid @enderror" style="font-size: 20px;" onkeypress="return onlyNumberKey(event)" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"><br />
                            <label style="font-size: 20px;"> Last School Year Completed </label>
                            <input type="number" id="last_school_year" name="last_school_year" class="form-control @error('last_school_year') is-invalid @enderror" style="font-size: 20px;" onkeypress="return onlyNumberKey(event)" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12"><br />
                            <label style="font-size: 20px;">School Name</label>
                            <input id="school_name" type="text" name="school_name" class="form-control @error('school_name') is-invalid @enderror" value="{{ old('school_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12"><br />
                            <label style="font-size: 20px;">School Address</label>
                            <input id="school_address" type="text" name="school_address" class="form-control @error('school_address') is-invalid @enderror" value="{{ old('school_address') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;"><br /><br /><br /><br />
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;"> For Learners in Senior High School</div>

                        <div class="col-lg-4 col-md-4 col-sm-12"><br />
                            <span class="col-lg-4 col-md-4 col-sm-12" style="font-size: 20px;">Semester</span>
                            <span class="col-lg-4 col-md-4 col-sm-12">
                                <label class="container">
                                    1st sem
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12">
                                <label class="container">
                                    2nd sem
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12"><br />
                            <label style="font-size: 20px;">Track</label>
                            <input id="track" type="text" name="track" class="form-control @error('track') is-invalid @enderror" value="{{ old('track') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12"><br />
                            <label style="font-size: 20px;">Strand (if any)</label>
                            <input id="strand" type="text" name="strand" class="form-control @error('strand') is-invalid @enderror" value="{{ old('strand') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;"><br /><br /><br /><br />
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;"> Preferred Distance Learning Modality/ies</div>

                        <div class="col-lg-12 col-md-12 col-sm-12"><br />
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Modular (Print)
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Online
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Radio-based instruction
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Blended
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Modular (Digital)
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Educational TV
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span>
                            <span class="col-lg-4 col-md-4 col-sm-12"><br />
                                <label class="container">Homeschooling
                                    <input type="checkbox">
                                    <span class="checkmark"></span><br />
                                </label>
                            </span><br /><br />
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #e0e4f4; font-size: 20px; font-weight:600; text-align: center; color: black;"> Creating an account</div>

                        <div class="col-lg-4 col-md-4 col-sm-12"><br />
                            <label style="font-size: 20px;">Email</label>
                            <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12"><br />
                            <label style="font-size: 20px;">Password</label>
                            <input id="password" type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12"><br /><br />
                            I hereby certify that the above information given are true and correct to the best of my knowledge
                            and I allow the Department of Education to use my child’s details to create and/or update his/her learner
                            profile in the Learner Information System. The information herein shall be treated as confidential in
                            compliance with the Data Privacy Act of 2012.
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12"><br />
                            <label style="font-size: 20px;">Signature (Only png and jpg files are allowed)</label>
                            <input style="font-size:20px;" type="file" name="image" class="form-control">
                        </div>
                    </div><br />
                    <div class="col-md-12">
                        <div id="whoops-update" class="alert alert-danger" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <b>Whoops! There is a problem in your input</b> <br />
                            <div id="validation-errors-update"></div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <font face="Verdana" size="6"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<br><br><br><br>
@include('partials.landingfooter')


<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var isOpen = document.getElementById("isOpen").value;

        if (isOpen != 1) {
            alert('Sorry. Early registration is closed.');
            window.location = '/';
        }

    });

    $('#RegisterForm').submit(function(e) {
        e.preventDefault();
        var formData = $("form#RegisterForm").serialize();
        $(":submit").attr("disabled", true);
        $.ajax({
            type: 'POST',
            url: "{{ url('/registerearly')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success.',
                    text: 'Your application is ready for evaluation.',
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr) {
                $('#validation-errors-update').html('');
                document.getElementById('whoops-update').style.display = 'block';
                if (xhr.responseJSON.error != undefined) {
                    $("#validation-errors-update").html("");
                    $('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
                }
                $.each(xhr.responseJSON.errors, function(key, value) {
                    $('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
                });
                $(":submit").removeAttr("disabled");
            }
        });

    });
</script>