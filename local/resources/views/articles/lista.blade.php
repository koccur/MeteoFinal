{{$articles=App\Article::latest('published_at')->published()->paginate(4)}}

@foreach($articles as $article)
	<article>
	    <a href="{{action('ArticlesController@show',$article->id)}}">
	        <div class="media">
	        	<div class="media-left">
	        		<img class="media-object" src="{{URL::asset($article->image_url_s)}}" alt="...">
				</div>
	        	<div class="media-body">
	            <h5 class="media-heading">{{$article->title}}</h5>
				<p>{{$article->body}}</p>
				</div>
	        </div>
	    </a>
	</article>
	@endforeach
<hr class="divider">