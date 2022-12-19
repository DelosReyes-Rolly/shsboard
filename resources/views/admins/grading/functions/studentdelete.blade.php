
@include('partials.adminheader')
@include('partials.adminSecondHeader')
        <div class="left-to-right">
            <h3 style="font-size: 20px; font-weight: 800;">Delete Student</h3>  
            <hr class="mt-0 mb-4">
            <div class="card mb-4 left-to-right">
                <div class="card border-start-lg border-start-yellow" >
                    <div class="card-header"><i class="fas fa-trash-alt fa-2x"></i><font face = "Bedrock" size = "6"><b>  Delete Record</b></font></div>
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
                           
                            <form method="post" action="/deletestudent/{{$student->id}}">
                                @method('PUT')
                                @csrf
                                <div class="alert alert-danger">
                                    <input type="hidden" name="deleted" value="1">
                                    <input type="hidden" name="deleted_at" value={{now();}}>
                                    <p style="color: red; font-size:20px;">Are you sure you want to delete the records of <b>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}</b>?</p>
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