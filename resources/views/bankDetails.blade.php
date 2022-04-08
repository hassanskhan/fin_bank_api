@extends('layout')
@section('content')

<div class="form-group">
    <br>
    <form action="{{route('create-connection')}}" method="POST">
        @csrf
        <label for="exampleFormControlSelect1">Select Banks</label>
        <select class="form-control js-example-basic-single" id="bankId" name="bankId">
            <option></option>
                    @foreach($getBanks as $bank)

            <option value="{{$bank['bank_id']}}">{{$bank['bank_name']}}</option>

                    @endforeach
        </select>
        <button class="btn btn-success mt-3">Submit</button>

    </form>

</div>




@endsection

@push('script')

    <script>
        $(document).ready(function (){
           $('#bankId').select2({
                placeholder:'Select a Bank',
               allowClear:true
           });
        });
    </script>


@endpush
