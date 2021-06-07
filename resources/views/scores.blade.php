@extends('layouts.app')

@section('lighe')
 
@php 
if(empty($scores)){
echo '<div class="container">
          <div class="row">
            <div class="col-12 text-danger font-weight-bold py-2 mb-2">Non ci sono risultati per questa league! </div><br>
            <div class="col-12 py-2 mb-2"><a href="'.$_SERVER['HTTP_REFERER'].'" style="font-size:14px;"> Visita altre lighe</a></div>
          </div>
      </div>';
 
}
@endphp
 

@section('content')
  <div class="banner-area banner-inner-1 bg-black" id="banner">
          <!-- banner area start -->
          <div class="banner-inner  pt-5 mb-3" style="background-color:orange;">
          <div class="ml-3 p-2">
          <h2>Scores</h2>
          </div>
          
              <div class="bd-example m-2">
                <table class="table  table-hover">
                  <thead>
                    <tr>
                       <th>Location</th>
                      <th scope="col">#</th>
                      <th scope="col">Away Name</th>
                      <th scope="col">Home Name</th>
                      <th scope="col">ht_score</th>
                    </tr>
                </thead>
               
                @foreach($scores as $k=>$v)
                 <tbody>
                  <tr>                 
                    <th scope="row">{{$k}}</th>
                    <th>{{$v->location}}</th>
                    <td>{{$v->away_name}}</td>
                    <td>{{$v->home_name}}</td>
                    <td>{{$v->ht_score}}</td>
                  </tr>
                  </tbody>
                @endforeach

                

                </table>
              </div>


          </div>
          <!-- banner area end -->

          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-sm-6">
                      <div class="single-post-wrap style-white">
                          <div class="thumb">
                              <img src="assets/img/post/1.png" alt="img">
                              <a class="tag-base tag-blue" href="#">Tech</a>
                          </div>
                          <div class="details">
                              <h6 class="title"><a href="#">The FAA will test drone detecting technologies in airports this year</a></h6>
                              <div class="post-meta-single mt-3">
                                  <ul>
                                      <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <div class="single-post-wrap style-white">
                          <div class="thumb">
                              <img src="assets/img/post/2.png" alt="img">
                              <a class="tag-base tag-orange" href="#">Food</a>
                          </div>
                          <div class="details">
                              <h6 class="title"><a href="#">Rocket Lab will resume launches no sooner than August 27th</a></h6>
                              <div class="post-meta-single mt-3">
                                  <ul>
                                      <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <div class="single-post-wrap style-white">
                          <div class="thumb">
                              <img src="assets/img/post/3.png" alt="img">
                              <a class="tag-base tag-blue" href="#">Tech</a>
                          </div>
                          <div class="details">
                              <h6 class="title"><a href="#">Google Drive flaw may attackers fool you into install malware</a></h6>
                              <div class="post-meta-single mt-3">
                                  <ul>
                                      <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <div class="single-post-wrap style-white">
                          <div class="thumb">
                              <img src="assets/img/post/4.png" alt="img">
                              <a class="tag-base tag-orange" href="#">Food</a>
                          </div>
                          <div class="details">
                              <h6 class="title"><a href="#">TikTok will sue the US over threatened ban</a></h6>
                              <div class="post-meta-single mt-3">
                                  <ul>
                                      <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>  
      </div>
    @endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$( document ).ready(function() {
  //  alert( "ready!" );
});
</script>

@endsection

 