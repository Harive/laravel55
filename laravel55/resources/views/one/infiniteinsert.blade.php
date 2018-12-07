<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加分类</title>
</head>
<body>
	<form action="/one/infiniteinsert" method="post">
		{{csrf_field()}}
		<select name="p_id" id="">
			@foreach($data as $v)
				<option value="{{$v->id}}">{{$v->priv_name}}</option>
			@endforeach
		</select>
		<input type="text" name="classfiy">
		<br>
		<input type="text" name="priv_link">
		<input type="submit" value="添加">
	</form>
</body>
</html>