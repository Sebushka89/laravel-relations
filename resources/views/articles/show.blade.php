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

                <h5>I commenti lasciati dai nostri utenti riguardo l'autore:</h5>

                @foreach ($article->comments as $comment)
                <div class="card mb-2">
                    <div class="card-header">
                        Nome utente {{-- Nome utente tramite auth in questo modo *Auth::user()->name*--}}
                    </div>
                    <div class="card-body">
                        <p>{{$comment->text}}</p>
                        <footer class="blockquote-footer">Created at: {{$comment->created_at}}</footer>
                    </div>
                </div>
                @endforeach


                <div class="comment-section">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('comments.store')}}" method='POST'>
                        @csrf
                        <input type="hidden" id="article_id" name="article_id" value="{{$article->id}}">
                        <textarea class="form-control" id="text" name="text" rows="2" placeholder="Lascia un commento..."></textarea>
                        <button type="submit" class="btn btn-warning mt-2">Commenta</button>
                    </form>
                </div>

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