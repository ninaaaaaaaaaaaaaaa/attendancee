<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
table{
  border-collapse: collapse;
}

table th,
table td
{
  border: 1px solid black;
}
</style>
<body>
  <table class="table">

@if(!empty($users))
  <tr class="o">
    <th>ID</th><th colspan="1">お名前</th><th colspan="1">性別</th><th colspan="1">メールアドレス</th><th colspan="1">生年月日</th><th colspam="1">電話番号</th><th colspam="1">所属店舗</th>
  </tr><th></th>
  @foreach($users as $user)
  <tr>
  <td>{{$user -> id}}</td><td>{{$user -> name}}</td><td>{{$user -> gender}}</td><td>{{$user -> email}}</td><td>{{$user -> birthday}}</td><td>{{$user -> phone_number}}</td><td>{{$user -> workarea}}</td><td></td>
  </tr>
  @endforeach
</table>
@endif
</body>
</html>