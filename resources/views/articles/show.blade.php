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
    
        <div class="row">
            <div class="content col">
    
                <div class="togh-cont">
                    <div class="user-cont">
                        <h1>{{strtoupper($article->title)}}</h1>
                        <h4>Author: {{ ucfirst($article->author->name) }} {{ ucfirst($article->author->surname) }} </h4>
                    </div>
    
                    <div class="img-container mb-2 mt-2 picture text-center">
                        Personal image
                        <img src="{{$article->author->picture}}" alt="picture of {{ ucfirst($article->author->name) }} {{ ucfirst($article->author->surname) }}" />
                    </div>
    
                </div>
                
                <p class="text-center"><strong> Contact details:</strong> {{ $article->author->email }}</p>

                <div class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('articles.index') }}">
                        <button class="btn btn-primary">
                            Back to Index
                        </button>
                    </a>
                </div>
    
            </div>
        </div>
    </div>

</body>
</html>