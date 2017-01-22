<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '8']) }}
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary btn-block">
        </div>

        <small><a href="{{ route('posts.index') }}">Cancel</a></small>
    </div>
</div>
