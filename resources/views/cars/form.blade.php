<div class="form-group">
    {!! Form::label('sid', '所屬車商：') !!}
    {!! Form::select('sid', $stores, $storeSelected, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('model', '型號：') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('riding_noise', '騎乘噪音值：') !!}
    {!! Form::number('riding_noise', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('idle_noise', '怠速噪音值：') !!}
    {!! Form::number('idle_noise', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('max_power', '最大動力：') !!}
    {!! Form::number('max_power', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('max_rpm', '最大動力轉速：') !!}
    {!! Form::number('max_rpm', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('displacement', '排氣量：') !!}
    {!! Form::number('displacement', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
