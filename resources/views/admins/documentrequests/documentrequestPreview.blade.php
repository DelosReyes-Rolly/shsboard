@include('partials.adminheader')
<main>
    


	<section>
		@if($extension == "pdf")
			<iframe height= "1000" width= "100%" src="/view/{{$requests -> file}}"></iframe>
		@elseif($extension == "docx" || $extension == "docs" || $extension == "doc")
			<iframe height= "1000" width= "100%" src="https://view.officeapps.live.com/op/embed.aspx?src={{asset('uploads/DocumentRequestFile/'.$requests -> file)}}" frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
		@endif
	</section>

<br><br><br><br>