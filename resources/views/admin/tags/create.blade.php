@extends('layouts.app');



@section('content')
    
    @include('admin.include.errors')


     <div class="panel panel-default">
        <div class="panel-heading">
            Create a new Tag
        </div>

        <div class="panel-body">
            <form action="{{route('tag.store')}}" method='post' >
            
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                      <button class="btn btn-success" type="submit">Store a Tag</button>
                    
                    </div>
                
                </div>
            
            </form>
        
        </div>
    
    </div>



@stop