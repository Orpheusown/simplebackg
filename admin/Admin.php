<?php

	session_start();
    
    //引用数据库信息文件
    require_once '../DBinfo.php';

    if (isset($_COOKIE['admin'])) {
        $admin = $_COOKIE['admin'];
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Ctroller</title>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>
	<div class="header">
		<ul>
			<li class="active">列表</li>
			<li>编辑</li>
			<li>
				<div>管理员:<?php echo $admin ?></div>
			</li>
		</ul>
		
	</div>
	<div class="mainer edit">
		<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="title">标题:</label>
				<input id="title" type="text" name="title" class="form-control" required />
			</div>
			<div class="form-group">
				<label for="content">内容:</label>
				<textarea id="content" name="content" class="form-control" rows="15" required></textarea>
			</div>
			<div class="form-group">
				<label for="author">编辑:</label>
				<input id="author" type="text" name="author" class="form-control" value="<?php echo $admin ?>" required/>
			</div>
			<input type="hidden" name="releaseTime" value="<?php $t= date('Y-m-d') ; echo($t); ?>" >

			<button class="btn btn-danger btn-lg">撤销</button>
			<button type="submit" name="submit" class="btn btn-primary btn-lg">发布</button>
			
		</form>
	</div>
	<div class="mainer showlist">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Content</th>
					<th>author</th>
					<th>releaseTime</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$query = "SELECT * FROM cnta_news";

				$res = mysqli_query($link,$query);
				$num = mysqli_num_rows($res);

				while($num)
				{
					$currentRow = mysqli_fetch_array($res);
					echo <<<TABLE
					<tr>
						<th>{$currentRow['ID']}</th>
						<th>{$currentRow['title']}</th>
						<th><nobr>{$currentRow['content']}</nobr></th>
						<th>{$currentRow['author']}</th>
						<th>{$currentRow['releaseTime']}</th>
					</tr>
TABLE;
					$num--;
				}


			?>
			</tbody>
		</table>
	</div>

<script type="text/javascript" src="lib/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var clickLi = $(".header ul li:lt(2)");

		clickLi.bind('click', function(event) {
			/* Act on the event */

			clickLi.attr({
				class: '',
			});
			$(this).addClass('active');

			var index = $(".header ul li").index($(this));
			if(index == 0)
			{
				$(".mainer").eq(0).hide('fast');
				$(".mainer").eq(1).show('fast');
			}
			else{
				if(index == 1)
				{
					console.log("what's on");
					$(".mainer").eq(1).hide('fast');
					$(".mainer").eq(0).show('fast');
				}
				else return;
			}
		});
	});
</script>
</body>
</html>
<?php

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $releaseTime = $_POST['releaseTime'];
    $content = $_POST['content'];

    $query = "INSERT INTO cnta_news (title,author,releaseTime,content) VALUES ('$title','$author','$releaseTime','$content')";
    $data = mysqli_query($dbc, $query);	
    
     if ($data) {
	// 把内容插入数据库
		echo "<script type='text/javascript'>alert('发布成功！');</script>";
		mysqli_close($dbc);
		die();
	}
	else{
		echo "<script type='text/javascript'>alert('发布失败！');</script>".mysqli_connect_error();;
	}
}

?>