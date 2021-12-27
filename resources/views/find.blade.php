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
.aa{
  text-align: center;
  margin: 50px auto;
  display: block;
  color: #616161;
  text-decoration: none;
  font-weight: bold;
}
.button-delete{
    border: blue;
    color: #fce4ec;
    background-color: #3f51b5;
    border-bottom: 5px solid #1a237e;
    box-shadow: 0 3px 5px rgb(0 0 0 / 30%);
    font-weight: bold;

}
.button-delete:hover {
  margin-top: 3px;
  color: #fff;
  background: #f56500;
  border-bottom: 2px solid #b84c00;
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
  <td>{{$user -> id}}</td><td>{{$user -> name}}</td><td>{{$user -> gender}}</td><td>{{$user -> email}}</td><td>{{$user -> birthday}}</td><td>{{$user -> phone_number}}</td><td>{{$user -> workarea}}</td><td>
  <form action="{{ route('delete', ['id' => $user->id]) }}" method="post">
                @csrf
                <a href="#"  onClick="return Check()">
                <button class="button-delete">削除</button></a>
              </form></td>
  </tr>
  @endforeach
</table>
@endif
<script>
   function Check() {
       var checked = confirm("本当に削除しますか？");
       if (checked == true) {
           return true;
       } else {
           return false;
       }
   }
</script>
<a href="/update1" class="aa">update</a>
</body>
</html>