
        <div class="form-group">
            {!! Form::label('name', 'お名前:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'メールアドレス:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tel', '電話番号:') !!}
            {!! Form::text('tel', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('postcode', '郵便番号:') !!}<button type="button" class="btn btn-success ml-3" id="zip">検索</button>
            {!! Form::text('postcode', null, ['class' => 'form-control', 'id' => 'postcode']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('prefecture', '都道府県:') !!}
            {!! Form::text('prefecture', null, ['class' => 'form-control', 'id' => 'prefecture']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city', '市区町村:') !!}
            {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('no', '番地:') !!}
            {!! Form::text('no', null, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit($submitButton, ['class' => 'btn btn-info form-control']) !!}