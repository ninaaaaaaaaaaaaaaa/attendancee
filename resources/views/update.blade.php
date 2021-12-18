<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <body>
  <table class="table">

@if(!empty($users))
  <tr class="o">
    <th>ID</th><th colspan="1">name</th><th colspan="1">gender</th><th colspan="1">email</th><th colspan="1">birthday</th><th colspam="1">phone number</th><th colspam="1">area</th>
  </tr>
  @foreach($users as $user)
      <form action="{{ route('update', ['id'=>$user->id])}}" method="post">
  @csrf
  <tr>
  <td>{{$user->id}}</td><td><input type="text" class="update" value="{{$user->name}}" name="name"></td><td>{{$user -> gender}}</td><td><input type="text" class="update" value="{{$user->email}}" name="email"></td><td>{{$user -> birthday}}</td><td><input type="text" class="update" value="{{$user->phone_number}}" name="phone_number"></td><td>{{$user -> workarea}}</td><td></td>
  </tr>
  @endforeach
</table>
<input type="submit"  value="更新" class="update-btn">
<input type="hidden" value="{{$user->id}}" name="id">
</form>
@endif
</body>
</html>