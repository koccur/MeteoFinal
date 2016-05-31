
<a href="{{action('CategoriesController@index')}}">Wróć do listy</a>
<div class="form-group">
    {!! Form::label('title','Tytuł:')!!}
    {!!Form::text('title',null,['class' => 'form-ctntrol'])!!}
</div>

<div class="form-group">
    {!! Form::label('description','Opis:') !!}
    {!! Form::textarea('description',null,['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
