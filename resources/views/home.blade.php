<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do List</title>

    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous"
    />
    <link  
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
        rel="stylesheet" 
    />

</head>

<body class="bg-info">
    <div class="container w-50 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-do List</h3>                
                <form action="{{ route('create') }}" method="POST" autocomplete="off">
                    @csrf   
                    <div class="input-group">
                        <input type="text" name="content" class="form-control mt-3" placeholder="Add new task" id="">
                        <button type="submit" class="btn btn-dark px-4 mt-3"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </form>
                @if (count($todolists))
                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($todolists as $todolist)                        
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-8">                                        
                                        {{$todolist->content}}                                  
                                    </div>
                                    <div class="col-2">
                                        @if ($todolist->is_complete == 0)
                                            Aberto
                                                @else
                                                    Concluido
                                        @endif                                     
                                    </div>
                                    <div class="row col-2">
                                        <form action="{{ route('update', $todolist->id) }}" method="POST">
                                            @csrf
                                            @if ($todolist->is_complete == 0)
                                                <button type="submit" class="btn btn-link btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            @endif
                                        </form>
                                        <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                            @csrf
                                            @method("delete")
                                            @if ($todolist->is_complete == 0)
                                                <button type="submit" class="btn btn-link btn-sm"><i class="fas fa-trash"></i></button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</body>

</html>