@include('partials.studentheader')
<main>
<section>
        <div> 
        	<div class="">
                <hr style="border: 1px solid grey;">
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
                <form method="POST" action="/updaterequest/{{$docreq->id}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="px-2 mt-2">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">Request Documents</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="mb-3" style="color: red">
                                                * required field
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" for="document_id" class="form-control @error('document_id') is-invalid @enderror" style="font-size: 20px;"><br><span style="color: red">*</span> Document Needed</label>
                                                        <div class="col-md-12" hidden><input class="form-control @error('document_id') is-invalid @enderror" id="inputdocument_id" type="text" placeholder="Enter document needed" name="document_id"  value="{{$docreq->document_id}}"></div>
            											<select id="document_id" name="document_id" class="form-control" value="{{ old('document_id') }}" style="font-size: 16px;" >
                                                            <option value="" disabled selected hidden>Choose Document</option>
                                                            @foreach ($lists as $list)
                                                                <option value="{{ $list->id }}"{{($docreq->document->id==$list->id)? 'selected':'' }}>{{ $list->name}}</option>
                                                            @endforeach
                                                        </select>
            										</div>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><span style="color: red">*</span> Purpose</label>
                                                    <textarea class="form-control @error('purpose') is-invalid @enderror" id="editor" type="text" style="font-size: 16px;" placeholder="Enter your purpose" name="purpose">{{$docreq->purpose}}</textarea>
                                                </div>
                                                <br>
                                                 <!-- Save changes button-->
                                                    <br><center> Note:<br>The documents will be processed <b>within five (5) working days</b> upon requesting.
                                                    The documents can be claimed in the <b>Registrars Office.</b></center><br><br>
                                                <a class="btn btn-info btn-md" href="{{ url('studentrequest') }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit" style="float: right; margin-right: 80px;"></font>
                                                <br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </form>
                    <hr style="border: 1px solid grey;">
                
        </section>
        <script>
            CKEDITOR.replace('editor');
        </script> 
</main>
<br><br><br><br>