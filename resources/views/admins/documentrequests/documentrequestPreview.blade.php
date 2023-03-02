@include('partials.adminheader')
<main>



   <section>
      <div>
         <nav aria-label="breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class="breadcrumb">
               @if($requests->status == 1 || $requests->status == 2)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @elseif($requests->status == 3 && $requests->gradelevel_id == 2)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <li class="breadcrumb-item"><a class="bca" href='{{ url("/tableofcompleted12") }}'>completed requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @elseif($requests->status == 3 && $requests->gradelevel_id == 1)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <li class="breadcrumb-item"><a class="bca" href='{{ url("/tableofcompleted11") }}'>completed requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @elseif($requests->status == 4 && $requests->gradelevel_id == 1)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <li class="breadcrumb-item"><a class="bca" href='{{ url("/tableofrejected11") }}'>rejected requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @elseif($requests->status == 4 && $requests->gradelevel_id == 2)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <li class="breadcrumb-item"><a class="bca" href='{{ url("/tableofrejected12") }}'>rejected requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @elseif($requests->status == 4 && $requests->student->status == 2)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <li class="breadcrumb-item"><a class="bca" href='{{ url("/tableofrejectedalumni") }}'>rejected requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @elseif($requests->status == 3 && $requests->student->status == 2)
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
               <li class="breadcrumb-item"><a class="bca" href='{{ url("/tableofcompletedalumni") }}'>completed requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class="breadcrumb-item active" aria-current="page">view proof</li>
               @endif
            </ul>
         </nav>
      </div>
      <div style="margin: 20px;">
         @if($requests->status == 1 || $requests->status == 2)
         <a class="btn btn-secondary btn-lg back-button back-button1" href="{{ url('documentrequest') }}"><i class="fas fa-arrow-left"></i> Back to document requests</a>
         @elseif($requests->status == 3 && $requests->gradelevel_id == 2)
         <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/tableofcompleted12") }}'><i class="fas fa-arrow-left"></i> Back to completed requests</a>
         @elseif($requests->status == 3 && $requests->gradelevel_id == 1)
         <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/tableofcompleted11") }}'><i class="fas fa-arrow-left"></i> Back to completed requests</a>
         @elseif($requests->status == 4 && $requests->gradelevel_id == 1)
         <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/tableofrejected11") }}'><i class="fas fa-arrow-left"></i> Back to rejected requests</a>
         @elseif($requests->status == 4 && $requests->gradelevel_id == 2)
         <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/tableofrejected12") }}'><i class="fas fa-arrow-left"></i> Back to rejected requests</a>
         @elseif($requests->status == 4 && $requests->student->status == 2)
         <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/tableofrejectedalumni") }}'><i class="fas fa-arrow-left"></i> Back to rejected requests</a>
         @elseif($requests->status == 3 && $requests->student->status == 2)
         <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/tableofrejectedalumni") }}'><i class="fas fa-arrow-left"></i> Back to completed requests</a>
         @endif
      </div><br /><br /><br /><br />
      <center><img src="{{ asset('uploads/DocumentRequestFile/'.$requests->file) }}" style="width:max-content; height:max-content; display: block;"></center>
   </section>

   <br><br><br><br>