
<div style="display:none">{{  $articles=App\Article::latest('published_at')->published()->paginate(6)}}</div>
@foreach($articles as $article)
	<article>
	    <a href="{{action('ArticlesController@show',$article->id)}}">
	        <div class="media">
	        	<div class="media-left">
	        		<img class="media-object" src="{{URL::asset($article->image_url_s)}}" alt="...">
				</div>
	        	<div class="media-body">
	            <h6 class="media-heading">{{$article->title}}</h6>
				<p>{{\Illuminate\Support\Str::limit(strip_tags($article->body),80)}}</p>
				</div>
	        </div>
	    </a>
	</article>
	@endforeach
{{  $articles=App\Article::latest('published_at')->published()->paginate(4)}}
