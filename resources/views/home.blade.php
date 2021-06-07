@extends('layouts.app')

@section('lighe')
 
  <div class="container">
        <div class="row">
        <h3>Lighe</h3>
          <div class="col-12">
            @php 
            $array1 = array("AR"=>"Argentina","AT"=>"Austria","AU"=>"Australia","BE"=>"Belgium","BR"=>"Brazil","DE"=>"Germany","DK"=>"Denmark","EN"=>"England","FI"=>"Finland","FR"=>"France","IT"=>"Italy","JP"=>"Japan","NO"=>"Norway","PL"=>"Poland","PT"=>"Portugal","RU"=>"Russia","SC"=>"Scotland","SE"=>"Sweden","TR"=>"Turkey"); 
            // Convert JSON string to Array
            $array2 = $countries;
            @endphp
            @foreach ($array1 as $k => $value) 
                @foreach ($array2["data"]["country"] as $key => $v2)                 		 
                    @if(is_array($v2)==true)
                        @if($value== $v2["name"])
                          <a href="{{ URL::asset('lighe/'.$v2["id"].'') }}"><img width=30 src="/images/bandierine/{{strtolower($k)}}.png" alt=""></a>                     
                        @endif                        
                    @endif                
                @endforeach
            @endforeach
          </div>
        </div>
    </div>

  @if(isset($lighe))
    <div class="container">
        <div class="row">
        <div class="mt-2 mb-2"><h2>{{$lighe[0]->countries_name}}</h2></div>
    @foreach($lighe as $k=>$v )
    <div  class="col-12 p-3 text-primary serie mb-2">
    {{ $v->name }}
   
     </div>
    <form  id="scores"  action="{{ URL::asset('mostra_fixtures') }}">
     <input type="hidden" name="id_competition" value="{{ $v->id_competition }}">
    </form> 
    {{ htmlspecialchars_decode($v->id_competition, ENT_NOQUOTES) }}
   
    @endforeach
        </div>
    </div>
  @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$( document ).ready(function() {
  $( ".serie" ).click(function() {
    alert("ok");
    $( "#scores" ).submit();
  });
});
</script>

@endsection

 