
@include('partials.adminheader')
@include('partials.adminSecondHeader')
        <div class="left-to-right">
            <h3 style="font-size: 20px; font-weight: 800;">Drop Student</h3>  
            <hr class="mt-0 mb-4">
            <div class="card mb-4 left-to-right">
                <div class="card border-start-lg border-start-yellow" >
                    <div class="card-header"><i class="fas fa-trash-alt fa-2x"></i><font face = "Bedrock" size = "6"><b>  Drop Record</b></font></div>
                    <div class="card-body" style="padding: 10px 40px 10px 40px">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3" style="color: black">
                            <!-- Form Group (title)-->
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
                           
                            <form method="post" action="/dropstudent/{{$student->id}}">
                                @method('PUT')
                                @csrf
                                <div class="alert alert-danger">
                                    <input type="hidden" name="status" value="3">
                                    <p style="color: red; font-size:20px;">Are you sure you want to drop <b>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}</b>?</p>
                                    <input type="Submit" value="Yes" class="btn btn-danger">
                                    <a href='{{ url()->previous() }}' class="btn btn-secondary">No</a>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>