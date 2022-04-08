@extends('layout')
@section('content')


    <h1 class="mt-3">Fin Banks</h1>
    <hr>



   <div>

       @if(Session::has('status'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Successfully!</strong> {{ Session::get('status') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
       @endif

<br><br>
{{--        <a href="{{route('importBankconn')}}"><button class="btn btn-success">Import Connection</button></a>--}}
<a href="{{route('getBank')}}"><button class="btn btn-info">Chose Bank +</button></a>
   </div>


    <div class="container mt-3">
        <h1>Accounts Details</h1>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th scope="col">Iban</th>
                <th scope="col">Account Title</th>
                <th scope="col">Account Balance</th>

            </tr>
            </thead>
            <tbody>
            @foreach($getBankaccounts['accounts'] as $bankaccount)

            <tr>
                <th scope="row">{{$bankaccount['iban']}}</th>
                <td>{{$bankaccount['accountName']}}</td>
                <td>€ {{$bankaccount['balance']}}</td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>





@endsection
