<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Portal With Twilio</title>
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        Search word
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('search')}}">
                            @csrf
                            <div class="form-group">
                                <input type="search" class="form-control @error('search') is-invalid @enderror" name="search">
                                @error('search')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    @if(isset($data))
                    <div id="definition">
                        <p>Word: {{$data->word}}</p>
                        <p>Etymology: {{$data->results[0]->lexicalEntries[0]->entries[0]->etymologies[0]}}</p>
                        <p>Definition: {{$data->results[0]->lexicalEntries[0]->entries[0]->senses[0]->definitions[0]}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>