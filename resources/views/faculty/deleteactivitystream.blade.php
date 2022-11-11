
@include('partials.adminheader')
@include('partials.adminSecondHeader')
    <div class="col-xl-8">
        <div class="content">
            <br/><br/><br/><br/>
            <div class="card mb-4 left-to-right">
                <div class="card border-start-lg border-start-yellow">
                    <div class="card-header">Delete</div>
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
                            <i class="far fa-trash-alt fa-3x"></i><font face = "Bedrock" size = "7"><b>  Delete Record</b></font>
                            <form method="post" action="/deleteactivitystream/{{$activitystream->id}}">
                                @method('PUT')
                                @csrf
                                <div class="alert alert-danger">
                                    <input type="hidden" name="deleted" value="1">
                                    <input type="hidden" name="deleted_at" value={{now();}}>
                                    <p style="color: red">Are you sure you want to delete this activity ?</p>
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
    </div>