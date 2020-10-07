<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
   
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-8  text-center">
            
            <form action={{route('todos.store')}} method="POST">
                @csrf
                <h1 class="text-center my-4">Laravel todos app</h1>
             
                    <div class="input-group ">
                <input type="text" class="form-control text-capitalize" name="todo" placeholder="add todos">
                    <div class="input-group-append">
                        <button type="submit">Add Todo</button>
                    </div>
                </div>
            
            </form>
           
          
                <!-- end of form  -->

            
                    
                        <table  cellspacing=0 class="table table-hover d-flex justify-content-center align-items-center my-4">
                            <tbody style="border: 1px solid grey"> 
                        @foreach ($todo as $todo_item)
                        
                        <tr class="">
                   
                       
                            
                                <td  >
                           <p class="m-0"> {{$todo_item->todo}} </p>
                                </td>
                                <td >
                            <form action="{{route('todos.destroy',$todo_item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="mr-4 btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                               
                            </form>
                                </td>
                                <td>
                          
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-sm  btn-primary" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-pencil-square-o"></i>
</button>
       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <form action="{{route('todos.update',$todo_item->id)}}" method="POST">
        @csrf
        @method('PUT')
       <input type="text" value="{{old('todo')?? $todo_item->todo}}" name="todo">
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
                                </td>
                            
                        </tr>
                        @endforeach
                            </tbody>
                        </table>  
                    
                      
            
                
        </div>
    </div>
        </div>



    </body>
    <script src={{ asset('js/app.js') }}></script>
    
</html>
