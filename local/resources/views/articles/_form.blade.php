<a href="{{action('ArticlesController@index')}}">Wróć do listy</a>
<div class="form-group">
    {!! Form::label('title','Tytuł:')!!}
    {!!Form::text('title',null,['class' => 'form-ctntrol'])!!}
</div>

<div class="form-group">
    {!! Form::label('body','Treść:') !!}
    {!! Form::textarea('body',null,['class' =>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at','Opublikuj:') !!}
    {!! Form::input('date','published_at',date('Y-m-d'),['class' =>'form-control']) !!}
</div>
<div class="form-group">
    <label for="userfile">Image File</label>
    <input type="file" class="form-control" name="userfile">
</div>

<div class="form-group">
    {!! Form::label('cat_id','Kategoria:') !!}
    {!! Form::select('cat_id',$cat,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
