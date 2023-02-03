
<main>

    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Strand </b></label></h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @if($course->image == NULL)
             <center><img src="{{ URL::asset('img/shs.png')}}" style="width: auto; height: auto;"/></center> <br/><br/>
		@else
            <center><img src="{{ asset('img/'.$course->image) }}"style="width: auto; height: auto;"/></center> <br/><br/>
		@endif
            <div class="row">
                <div class="col-md-12">
                    <center><span style="font-size: 26px;">{{$course->courseName}}</span></center>
                </div><br/><br/>
                <div class="col-md-12" style="font-size: 26px;">
                    <center>({{$course->abbreviation}})</center>
                </div><br/><br/>
                <div class="col-md-12">
                    <br/><label style="font-size: 26px;"><b>Strand Description: </b></label>
                    <span style="font-size: 20px;">{{$course->description}}</span>
                </div><br/><br/>
                <div class="col-md-12">
                    <br/> <label style="font-size: 26px;">Code: </label><br/>
                    <span style="font-size: 26px;"><b>{{$course->code}}</b></span>
                </div><br><br/>
                @if($course->link != NULL)
                    <div class="col-md-12">
                        <br/><iframe id="video{{$course->id}}" width="100%" height="600" box-shadow = "0 5px 20px rgba(0,0,0,2)" src="{{$course -> link}}" title="ABM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif
                </div><br/><br/>
                <hr>
            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>

    <script>
        function viewItem(e){

            let id = e.getAttribute('data-id');
            $('#modal-view-' + id).on('hide.bs.modal', () =>{
                $('#video' + id).attr('src', $("#video" + id).attr("src"));
            });
        }
    </script>
</main>