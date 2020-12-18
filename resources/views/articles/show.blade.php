@extends('/layout')

@section('head')
<script src="/js/form.js"></script>

@section('content')

<div id="wrapper">
	<div id="page" class="container1">
		<div id="content">
			<div class="title">

				<h2>
					{{$article->title}}
                    @auth()
					<a href="{{ route('articles.edit', $article) }}">
						<button class="btn btn-link btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
								<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
								<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
							</svg></button> </a>



					<button type="button" class="btn btn-link btn-sm text-danger" data-toggle="modal" data-target="#deleteConfirm">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
							<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
						</svg>
					</button>
                    @endauth
				</h2>

				<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Are you sure, you want to delete the article?
							</div>
							<div class="modal-footer">
								<form action="{{ route('articles.delete', $article) }}" method="POST">
									@csrf
									@method('DELETE')
								<button type="submit" class="btn btn-primary">Yes</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
								</form>
							</div>
						</div>
					</div>
				</div>




				<span class="byline">{{$article->excerpt}}</span>
			</div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<p>{{ $article->body }}</p>
			@foreach($article->tags->pluck('tag') as $tag)
			<a href="{{ route('articles', ['tag' => $tag]) }}"> <span class="badge badge-primary">{{ $tag  }}</span></a>
			@endforeach
		</div>

	</div>
</div>

@endsection
