<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
.search {
   overflow: hidden;
}
.year{
  float: left;
}
.month{
  float: left;
}
.day{
  float: left;
}


</style>
<body>
  <h1 class="main-title">Daily</h1>
<div class="search">
  <form action="/time/daily" method="post">
    @csrf
    <select name="year" class="year">
      @for($i=2021; $i <= 2030; $i++)
      <option>{{$i}}</option>
      @endfor
    </select>

    <p class="year">年</p>

    <select name="month" class="month">
      @for($i=1; $i <= 12; $i++)
      <option>{{$i}}</option>
      @endfor
    </select>

    <p class="month">月</p>

    <select name="day" class="day">
      @for($i=1; $i <= 31; $i++)
      <option>{{$i}}</option>
      @endfor
    </select>

    <p class="day">日</p>
    <input type="submit" value="選択">
  </form>
  <a class="return" href="/time"><button>戻る</button></a>
</div>

<div class="container">
    @foreach ($items as $item)
    <div class="attendance">
      <table>
        <p class="name">{{$item->user_name}}</p>
        <tr><td>出勤</td><td>{{$item->punchIn}}</td></tr>
        <tr><td>休憩開始</td><td>{{$item->breakIn}}</td></tr>
        <tr><td>休憩終了</td><td>{{$item->breakOut}}</td></tr>
        <tr><td>退勤</td><td>{{$item->punchOut}}</td></tr>
        <tr><td>勤務時間</td><td>{{$item->workTime}}</td></tr>
      </table>
    </div>
    @endforeach
</div>

</body>
</html>