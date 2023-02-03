
@include('partials.facultyheader')
@include('partials.facultySecondHeader')
    
        <div>
            <h3 style="font-size: 20px; font-weight: 800;">Card Giving</h3>  
            <hr class="mt-0 mb-4">
            <div class="card mb-4">
                <div class="card border-start-lg border-start-yellow">
                    <div class="card-header"><i class="fas fa-trash-alt fa-3x"></i><font face = "Bedrock" size = "7"><b>  Release Card</b></font></div>
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
                            
                            <form method="post" action="/unrelease/{{$card->id}}}">
                                @method('PUT')
                                @csrf
                                <div class="alert alert-primary">
                                    <input type="hidden" name="cardgiving" value="null">
                                    <p style="color: black; font-size:20px;"><b>Are you sure you want to unrelease the card of {{$card->course->courseName}} - {{$card->section->section}}?</b></p>
                                    <input type="Submit" value="Yes" class="btn btn-danger" style="font-size: 16px;">
                                    <a href='{{ url()->previous() }}' class="btn btn-secondary" style="font-size: 16px;">No</a>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    