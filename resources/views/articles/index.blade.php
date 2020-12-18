@extends('/layout')

@section('content')


<div id="wrapper">
	<div id="page" class="container1">
		@forelse($articles as $article)
		<div id="content">
			<div class="title">
				<h2>
					<a href="{{ $article->path() }}"> {{$article->title}} </a>
					
				</h2>
				<span class="byline">{{$article->excerpt}}</span>
			</div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<hr>
		</div>

		@empty

		<p> No Relevent Articles Yet.</p>

		@endforelse

	</div>
</div>

@endsection