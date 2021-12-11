@extends('layouts.app')
<style>
.card{
  background:#ffecb3;
  border-radius:6px;
  padding:28px;
  padding-top:30px;
  width:500px;
  margin:50px auto;
  box-shadow:15px 15px 0px rgba(0,0,0,.1);
}
.date{
    font-size:20px
    margin: 0;
    font-weight: bold;
    text-align: center;
    color: #f194b4;
}
.time{
    font-size:30px;
    text-align: center;
    font-weight: bold;
}
table{
    margin:auto;
}
.timecss{
    margin:0;
    font-size: 40px;
    padding-bottom: 10px;
    color: #f194b4;
    text-shadow: 2px -3px 0px #5d67a2f2;
}

.btn{
    position:relative;
    width:100%;
    padding:20px;
    border-radius:6px;
    border:0;
    background:#3f51b5;
    font-size:1.2em;
    color:#ffeb3b;
    text-shadow:1px 1px 0px rgba(0,0,0,.1);
    box-shadow:0px 3px 0px #14205f;
    cursor: pointer;
    margin-bottom: 13px;
    font-weight: bold;
}
.btn:active{
  top:3px;
  box-shadow:none;
}
td{
    font-weight: bold;
    text-align: center;
}

body{
    background:#b8bfe8;
}
.dropdown-item{
    margin: 47%;
}
.name{
    coler:white;
}

</style>
@section('content')
<div class="card">
<div class="date">
<script>
var today=new Date(); 


var year = today.getFullYear();
var month = today.getMonth()+1;
var week = today.getDay();
var day = today.getDate();

var week_ja= new Array("日","月","火","水","木","金","土");


document.write(year+"年"+month+"月"+day+"日 "+week_ja[week]+"曜日");


</script>
</div>
<div class="time">
<p class="timecss" id="RealtimeClockArea2"></p>
<script>
function set2fig(num) {
   
   var ret;
   if( num < 10 ) { ret = "0" + num; }
   else { ret = num; }
   return ret;
}
function showClock2() {
   var nowTime = new Date();
   var nowHour = set2fig( nowTime.getHours() );
   var nowMin  = set2fig( nowTime.getMinutes() );
   var nowSec  = set2fig( nowTime.getSeconds() );
   var msg = nowHour + ":" + nowMin + ":" + nowSec ;
   document.getElementById("RealtimeClockArea2").innerHTML = msg;
}
setInterval('showClock2()',1000);
</script>
</div>

<table class="attendancetable">
    <tr>
        <th colspan="1">
        <form action="/time/intime" method="post">
        @csrf
        <button class="btn" id="text">出勤</button>
        </th></form>
        <th>
        <form action="/time/inbreak" method="post">
        @csrf
        <button class="btn">休憩開始</button></th></form>
        <th>
        <form action="/time/outbreak" method="post">
        @csrf
        <button class="btn">休憩終了</button></th></form>
        <th>
        <form action="/time/outtime" method="post">
        @csrf
        <button class="btn">退勤</button></th></form>
    </tr>
    <!--<tr><td class="c">9:00</td><td class="c">13:00</td><td class="c">14:00</td><td class="c">18:00</td></tr>-->
</table> 


<!--<div class="container">
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
                </div>-->
    </div>
    <div class="container">
  @foreach ($itmes as $itme)
  <div class="attendance">
    <p class="name">{{$itme->user_name}}</p>
    <table>
      <tr><td colspan="1">出勤</td><td>{{$itme->punchIn}}</td></tr>
      <tr><td>休憩開始</td><td>{{$itme->breakIn}}</td></tr>
      <tr><td>休憩終了</td><td>{{$itme->breakOut}}</td></tr>
      <tr><td>退勤</td><td>{{$itme->punchOut}}</td></tr>
      <tr><td>休憩</td><td>{{$itme->workTime}}</td></tr>
    </table>
  </div>
  @endforeach
</div>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                <a href="/find">情報</a>
                @if(Auth::user()->admin == 0)
<a href="/time/daily">日次勤怠
</a>
@endif
            </div>
        </div>
    </div>
</div>
@endsection
