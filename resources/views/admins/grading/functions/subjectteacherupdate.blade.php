@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">
        <!-- form -->
                    
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/updatesubjectteacher/{{$subjectteacher->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Schedule</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"><font face = "Bedrock" size = "6"><b>Update Teacher's Subject</b></font></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;">Teacher</label>
                                                <select id="faculty_id" name="faculty_id" class="form-control" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Teacher</option>
                                                    @foreach ($faculties as $faculty)
                                                        <option value="{{ $faculty->id }}" {{($subjectteacher->faculty->id==$faculty->id)? 'selected':'' }}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                    </div><br/>
                                    
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="subject_id" style="font-size: 20px;">Subject</label>
                                                <select id="subject_id" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}"{{($subjectteacher->subject->id==$subject->id)? 'selected':'' }}>{{ $subject->subjectname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3" style="padding-left: 20px;">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="appt" style="font-size: 20px;">Select a time:</label><br>
                                                From: <input type="time" id="time_start" name="time_start" value={{$subjectteacher->time_start}}>
                                                To: <input type="time" id="time_end" name="time_end" value={{$subjectteacher->time_end}}>
                                            </div>
                                        </div>
                                    </div><br/>
                                    <hr>
                                    <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    <a href="/gradingfacultysubjects" class="btn btn-secondary ml-2"><font face = "Verdana" size = "2">Cancel</font></a>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </form>

        <script>
            CKEDITOR.replace('editor');
        </script> 
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
</main>
<br><br><br><br>