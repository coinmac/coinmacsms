@extends('user_master')
@section('content')

    
    <div class="card">
    <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>            
            @endif

        <h5 class="card-title">Credit History </h5>
        <table class="table table-light" id="datatable" style="font-size:0.8em!important;">
                <thead class="thead-light">
                    <tr>
                        <th>Date</th>
                        <th>Pay Particulars</th>
                        <th>Units Added</th>
                        <th>Beneficiary</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($topups as $topup)  
                    <tr>
                        <td>{{ $topup->created_at }}</td>
                        <td>{{ $topup->particulars }}</td>
                        <td>{{ $topup->units }}</td>
                        <td>{{ $topup->username }}
                            <span style="color: 
                            @if($topup->confirmation=="Confirmed")
                            green
                            @else
                            red
                            @endif
                            "><em>({{$topup->confirmation}})</em></span>
                            @if (auth()->user()->username=="smsadmin" && $topup->confirmation=="Not Confirmed")
                                <form action="{{route('topup.update', $topup->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <input id="username" name="username" type="hidden" value="{{$topup->username}}">
                                    <input id="units" name="units" type="hidden" value="{{$topup->units}}">
                                    <input id="username" type="submit" value="Confirm" name="Confirm" class="btn btn-sm btn-success">
                                </form>                             
                                
                            @endif
                        
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>Date</th>
                        <th>Pay Particulars</th>
                        <th>Units Added</th>
                        <th>Beneficiary</th>
                    </tr>
                </tfoot>
            </table>
        
    </div>    

    </div>
    
@endsection


@section('leftbar')
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Record New Payment </h5>
        <hr>
        @if ($errors->all())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)

                <li>{{$error}}</li>
                    
                @endforeach
                
            </div>            
        @endif
        <form action="{{route('topup.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="amount">Amount Paid</label>
                <input id="amount" name="amount" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="namepaid">Depositor's Name</label>
                <input id="namepaid" class="form-control" type="text" name="namepaid" required>
            </div>
            <div class="form-group">
              <label for="bank">Bank Paid To</label>
                <select class="select form-control" name="bank" id="bank">
                    <option value='ZENITH BANK - COINMAC INTERNATIONAL LIMITED -  1012790202'>1012790202  - ZENITH BANK - COINMAC INTERNATIONAL LIMITED</option>
                    <option value='FCMB - COINMAC INTERNATIONAL LIMITED - 0136506015' selected>0136506015 - FCMB - COINMAC INTERNATIONAL LIMITED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paycode">Payment Reference:<small>
                    <br> (Teller No, Transfer DESC etc)</small></label>
                <input id="paycode" class="form-control" type="text" name="paycode" required>
            </div>
            <div class="form-group">
                <label for="datepaid">Date of Payment</label>
                <input id="datepaid" class="form-control" type="date" name="datepaid" required>
            </div>
            <button type="submit" class="btn btn-outline-primary float-right">Save Payment</button>
        </form>
        </div>
    </div>
@stop