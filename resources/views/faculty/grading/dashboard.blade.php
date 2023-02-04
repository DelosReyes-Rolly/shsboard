@include('partials.facultyheader')
<main>
    <div class="container" style="padding: 10px 20px 10px 20px;">
        <div class="px-2 mt-2">
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body" style=" padding: 0px 40px 10px 40px;">
                            <div class="card-header">Subjects</div>
                            
                            <div class="h3 d-flex align-items-center">{{$subjectteacher}}</div>
                            <a class="text-arrow-icon small text-success" href="/facultysubjects">
                                View Subjects
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>