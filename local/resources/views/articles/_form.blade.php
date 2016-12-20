<a href="{{action('ArticlesController@index')}}"><i class="fa fa-undo" aria-hidden="true"></i> Wróć do listy artykułów</a>
<div class="form-group">
    {!! Form::label('title','Tytuł artykułu:')!!}
    {!!Form::text('title',null,['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('body','Treść:') !!}
    {!! Form::textarea('body',null,['class' =>'form-control']) !!}
    {{--<script>--}}
    {{--CKEDITOR.replace('body');--}}
    {{--</script>--}}
</div>
<div class="form-group">
    {!! Form::label('published_at','Data opublikowania:') !!}
    {!! Form::input('date','published_at',date('Y-m-d'),['class' =>'form-control']) !!}

</div>
<div class="form-group">
    <label for="userfile">Obrazek artykułu:</label>
    <input type="file" class="form-control" name="userfile">
</div>

<div class="form-group">
    {!! Form::label('cat_id','Kategoria:') !!}
    {!! Form::select('cat_id',$cat,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary  col-xs-12 col-md-6']) !!}
</div>
