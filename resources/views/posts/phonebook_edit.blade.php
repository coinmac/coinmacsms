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

            <h5>Update Contact Info</h5>
            <hr>
            
            <form action="{{route('phonebook.update', $phonebook->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="my-input">Contact Name</label>
                    <input id="title" name="contact_name" class="form-control" type="text" value="{{$phonebook->contact_name}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_numver">Phone Number</label>
                    <input id="phone_number" class="form-control" type="text" name="phone_number" value="{{$phonebook->phone_number}}" required>
                    </div>
                    <div class="form-group">
                      <label for="phonegroup">Select Group</label>
                      <select class="select form-control" name="phonegroup" id="phone_group">
                        <option value="{{$phonebook->phonegroup}}" selected>{{$phonebook->phonegroup}}</option>
                            @foreach ($groups as $group)                        
                                <option value="{{$group->groupname}}">{{$group->groupname}}</option>
                            @endforeach
                                
                        </select>
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