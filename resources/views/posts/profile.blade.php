@extends('user_master')
@section('leftbar')

    
    <div class="card">
    <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>            
            @endif

            @if ($errors->all())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)

                <li>{{$error}}</li>
                    
                @endforeach
                
            </div>            
            @endif

            <h5>Profile</h5>
            <hr>
            
            <form action="{{route('user.update', auth()->user()->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Full Name</label>
                    <input id="name" name="name" class="form-control" type="text" value="{{auth()->user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_numver">Phone Number</label>
                    <input id="phone_number" class="form-control" type="text" name="phone_number" value="{{auth()->user()->phone_number}}" required>
                    </div>
                    <div class="form-group">
                        <label for="passport">Text</label>
                        <input id="passport" class="form-control-file" type="file" name="passport" value="{{auth()->user()->passport}}">
                    </div>
                    <button type="submit" class="btn btn-outline-primary float-right">Update Contact</button>
                </form>
                


        
    </div>    

    </div>
    
@endsection


@section('content')
<div class="card">
    <div class="card-body">
            <h5 class="card-title"> My Phone Book </h5>
            <table class="table table-dark" id="datatable">
                <thead class="thead-light">
                    <tr>
                        <th>Contact Name</th>
                        <th>Phone Number</th>
                        <th>Contact Group</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)  
                    <tr>
                        <td>{{ $contact->contact_name }}</td>
                        <td>{{ $contact->phone_number }}</td>
                        <td>{{ $contact->phonegroup }}</td>
                        <td>
                            @auth
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a href="{{route('phonebook.edit',$contact->id)}}" class="btn btn-info">Edit</a>
                                    <form onsubmit="return confirm('Are you sure you want to delete the Contact: {{$contact->contact_name}}?')" action="{{route('phonebook.destroy',$contact->id)}}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>  
                            @endauth
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="thead-light">
                    <tr>
                            <th>Contact Name</th>
                            <th>Phone Number</th>
                            <th>Contact Group</th>
                            <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            
        
    </div>
</div>
@stop