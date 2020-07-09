<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/ey_index.css">
        <script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="/js/ey_index.js"></script>
    </head>
	<body>
		<div id="login_con">
			<div id="login_box">
				<h1><img src="/img/logo.png"></h1>
		        <form action="login_check.php" method="post">
		            <input type="text" name="id" placeholder="아이디" required>
		            <input type="password" name="pw" placeholder="비밀번호" required>
		            <input type="submit" value="LOGIN">
		        </form>
		    </div>
		</div>
	</body>
</html>