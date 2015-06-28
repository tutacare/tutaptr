@extends('home.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
          @if (Session::has('message'))
          	<div class="alert alert-info">{{ Session::get('message') }}</div>
          @endif
          {!! Html::ul($errors->all()) !!}
          <h1>Current Balance: ${{ $balance->balance }}</h1>
          <p>
					{!! Form::open(array('url' => 'deposit/pay-via-paypal')) !!}
          <div class="form-group">
              <label for="payment_type" class="control-label">Amount</label>
              <div class="col-sm-8">
              {!! Form::select('amount', array('5.00' => '5.00', '10.00' => '10.00', '15.00' => '15.00', '20.00' => '20.00'), Input::old('amount'), array('class' => 'form-control')) !!}
              </div>
          </div>

          <button type="submit" class="btn btn-success">Deposit via Paypal</button>
					{!! Form::close() !!}
          </p>
        </div>
        @include('home.sidebar')
    </div>
</div>

@endsection
