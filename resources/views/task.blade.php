<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


  </head>
  <body>

<div class="container">
    <div class="row">
        <div class="col-8 m-auto">
        <h1 class="text-center my-3">Simple To-Do List</h1>
        @if(empty($edit_todo))

            <form action="{{route('todo.store')}}" method="post">
                 @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="task_name" placeholder="Enter Your Task Here... "  aria-describedby="button-addon2">
                    <div class="input-group-append">
                    <button class="btn btn-info" class="form-control" type="submit" id="button-addon2">+ Add</button>
                    </div>
                 </div>
            </form>
         @else
            <form action="{{ route('todo.update') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="task_name" value="{{$edit_todo->task_name}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <input type="hidden" name="id" value="{{$edit_todo->id}}">
                    <div class="input-group-append">
                    <button class="btn btn-info" class="form-control" type="submit" id="button-addon2">Update</button>
                     </div>
                </div>
            </form>

         @endif

        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        @if(session()->has('insert'))
            <div class="alert">
                <p class="alert alert-success text-center">{{session()->get('insert')}}</p>
            </div>
        @elseif(session()->has('update'))
            <div class="alert">
                <p class="alert alert-warning text-center">{{session()->get('update')}}</p>
            </div>
        @elseif(session()->has('delete'))
            <div class="alert">
                <p class="alert alert-danger text-center">{{session()->get('delete')}}</p>
            </div>
        @endif
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->task_name }}</td>
                        <td>
                            <a href="{{ route('todo.edit', $item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{route('todo.destroy',$item->id )}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">No Task Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>





    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script>


  </body>
</html>



