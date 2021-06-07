@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <?php
// if(isset($partite)){
//   // dd($partite);
// }else{
//     echo "non ce";
//} 
$partite[0]='';
?>

{{--  <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($partite->data->match as $k=>$response)
    <tr>
      <th scope="row">{{$k}}</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  @endforeach
  </tbody>
</table>  --}}
      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
