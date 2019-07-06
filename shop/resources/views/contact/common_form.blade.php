{!! Form::open(['url' => 'contact_confirm']) !!}
    <div class="form-group">
        {!! Form::label('name', 'お名前:') !!}
        {!! Form::text('name', $nameValue, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'メールアドレス:') !!}
        {!! Form::text('email', $mailValue, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', '件名:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', '内容:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    
    {!! Form::submit('確認', ['class' => 'btn btn-info form-control']) !!}
{!! Form::close() !!}