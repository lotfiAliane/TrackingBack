<?php

if($post->id){
	$options=['Method'=>'post', 'url'=> route('test.update',$post)];
	$option=method_field('PUT');

}
else {
	
$options=['Method'=>'post', 'url'=> route('test.store')];
$option=method_field('POST');
}

?>

{!! Form::model($post,$options) !!}
{!! $option !!}
<div class="form-group">
{!! Form::label('title','Titre') !!}
{!! Form::text('title',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('slug','Slug') !!}
{!! Form::text('slug',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::label('content','Contenu') !!}
{!! Form::textarea('content',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('category_id','Category') !!}
	{!! Form::select('category_id',$categories,null,['class' => 'form-control']) !!}

</div>
<div class="form-group">
<label >

{!! Form::checkbox('online',1) !!}
publier ?
</label>
</div>
<button class="btn btn-primary">Send</button>
{!! Form::close() !!}