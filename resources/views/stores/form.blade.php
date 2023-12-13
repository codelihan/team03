<div class="form-group">
    {!! Form::label('name', '車商名字：') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('country', '地區：') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('service', '據點數量：') !!}
    {!! Form::text('service', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('info', '簡介：') !!}
    {!! Form::text('info', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('url', '網址：') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
