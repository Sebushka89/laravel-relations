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
        <h2 class="mt-4 mb-4">Crea un nuovo articolo</h2>
    
        <form action="{{ route('articles.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="mt-2" for="title">Title</label>
                <input type="text" class="form-control"name="title" id="title">
            </div>

            <div class="form-group">
                <label class="mt-2" for="text">Post text</label>
                <input type="text" class="form-control"name="text" id="text">
            </div>

            {{-- <div class="form-group">
                <label for="cover">Cover</label>
                <input type="text" class="form-control" name="cover" id="cover">
            </div> --}}
            
            <div class=" form-group mt-2">
                <label class="mt-2" for="cover">Add image:</label>
                <input type="file" name="cover" id="cover">
            </div>  
        
            <div class="mt-2">Author</div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text mt-2" for="author_id">Options</label>
                    </div>
                    <select class="custom-select mt-2" id="author_id" name="author_id">
                        <option selected>Choose author...</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{ ucfirst($author->name) }} {{ ucfirst($author->surname) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <strong>Tags</strong>
            <div class="form-group">
                @foreach($tags as $tag)
                <div>
                    {{-- tags[] diventer?? un array di id di Tags per cui abbiamo flaggato la checbox --}}
                    <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
                    <label>{{$tag->tag_name}} </label>
                </div>
                @endforeach
        
            <div>
                <button type="submit" class="btn btn-dark mb-5" type="submit">Create article</button>
            </div>
        
        </form>
    </div>
</body>
</html>   