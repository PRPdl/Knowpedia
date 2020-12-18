@extends('/layout')

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <h1>New Article</h1>
        <form action="/articles" method="POST">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold" for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter Title" value="{{old('title')}}">
                <small id="emailHelp" class="form-text text-muted">The title of you article should not exceed 50 characters.</small>
                @error('title')
                <p class="text-danger">{{ $errors->first('title') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="excerpt">Excerpt</label>
                <input type="text" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="excerpt" placeholder="Enter Excerpt">
                @error('excerpt')
                <p class="text-danger">{{ $errors->first('excerpt') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="body">Content</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5"></textarea>
                @error('body')
                <p class="text-danger">{{ $errors->first('body') }}</p>
                @enderror
            </div>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tags</label>
                </div>
                <select class="selectpicker" data-live-search="true" id="tags" name="tags[]" multiple>
                    <option disabled>Choose Tags..</option>
                    @foreach($tags as $tag)
                    <option data-tokens="{{$tag->tag}}" value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
</div>

@endsection