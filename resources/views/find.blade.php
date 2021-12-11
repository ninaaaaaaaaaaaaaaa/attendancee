<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
body{
  background: #f48fb1db;
}
table{
  border-collapse: collapse;
  margin:auto;
}

table th,
table td
{
  border: 2px solid #1b5e20;
}
td{
  color:#3e2723;;
  padding: 5px;
  font-weight: bold;
}
th{
  color:#1b5e20;
  padding: 8px;
  font-family: Georgia;
  font-weight: bold;
  font-size: larger;
}
</style>
<body>
  <table class="table">

@if(!empty($users))
  <tr class="o">
    <th>ID</th><th colspan="1">name</th><th colspan="1">gender</th><th colspan="1">email</th><th colspan="1">birthday</th><th colspam="1">phone number</th><th colspam="1">area</th>
  </tr>
  @foreach($users as $user)
  <tr>
  <td>{{$user -> id}}</td><td>{{$user -> name}}</td><td>{{$user -> gender}}</td><td>{{$user -> email}}</td><td>{{$user -> birthday}}</td><td>{{$user -> phone_number}}</td><td>{{$user -> workarea}}</td><td></td>
  </tr>
  @endforeach
</table>
@endif
</body>
</html>