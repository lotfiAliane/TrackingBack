@extends('app')
@section('content')
<link href="~/Content/bootstrap-3.1.1-dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="~/scripts/jquery-2.1.0.min.js"></script>
<script src="~/scripts/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>

 

	
<script type="text/javascript">
$(document).ready(function () {
        $(".modelpopup").click(function () {
            $('#div-modal-content').load(this.href, function () {
                $('#div-modal').modal({
                    backdrop: 'static',
                    keyboard: true,
                    height: 300,
                    width: 200,
                }, 'show');
            });
            return false;
        });
    });
</script>

@foreach($posts as $post)

<h1>{!! $post->title!!}<h1>
	@if($post->category)
		<h1>{!! $post->category->name !!}</h1>
	@endif	
	<p><a class="btn btn-primary" href="{{route('test.edit',$post)}}"> editer</a></p>

@endforeach
<div class="container">
    @Html.ActionLink("Open", "ModalPopup", "Home", new { @class = "modelpopup btn btn-info" })
</div>
 
<div id='div-modal' class="modal fade" tabindex="-1" style="top: 10%;">
    <div class="modal-dialog" style="max-width: 500px; margin: 30px auto;">
        <div id='div-modal-content' class="modal-content"></div>
    </div>
</div>


@stop