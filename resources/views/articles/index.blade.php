<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="container">
    
        <a href="{{ route('articles.create') }}"><button class="btn btn-primary">Add Article</button></a>
        <div class="row">
            @foreach($articles as $article)
                <div class="content  col-12">
        
                    <div class="togh-cont">
                        <div class="user-cont text-center">
                            <h1>{{strtoupper($article->title)}}</h1>
                            <h4>By: {{ ucfirst($article->author->name) }} {{ ucfirst($article->author->surname) }} </h4>
                        </div>
                        
                        <div class="text-right">
                            @foreach ($article->tag as $tag)
                            <span class="badge badge-pill badge-danger">{{ $tag->tag_name }}</span>
                            @endforeach
                        </div>
    
                        <div class="img-container mb-2 mt-2 text-center">
                            <img src="{{$article->cover}}" alt="picture of {{$article->title}}" />
                        </div>
        
                    </div>
                    
                    <p>{{ $article->text }}</p>
        
                    <div class="text-center mb-3">{{ $article->created_at }} <i class="fas fa-clock"></i></div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('articles.show', $article) }}">
                            <button class="btn btn-primary">Author details</button>
                        </a>
                    </div>
            
                </div>
            @endforeach  
        </div>
    </div>

</body>
</html>