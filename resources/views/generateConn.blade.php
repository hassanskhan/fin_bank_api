@extends('layout')
@section('content')

    <div class="container mt-3">

        <h1>FinBankApi</h1>
        <hr>
        <h1>Importing Connections</h1>
        <br>

       <p>ID: {{$getBankconnections['id']}} </p>
        <span class="text-success">Click This is URL for Login Fin Api Bank</span>
        <p>URL : <a href="{{$getBankconnections['url']}}">{{$getBankconnections['url']}}</a></p>
        <p>createdAt : {{$getBankconnections['createdAt']}}</p>
        <p>expiresAt : {{$getBankconnections['expiresAt']}}</p>
        <p>type : {{$getBankconnections['type']}}</p>
        <p>status : {{$getBankconnections['status']}}</p>
    </div>

@endsection



