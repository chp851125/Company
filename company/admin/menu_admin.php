<?php
$file_path = $_SERVER['PHP_SELF']; // http://localhost/xampp/company/index.php
$file_name = basename($file_path, ".php"); // index
// echo $file_name; //article有bug 顯示article.php
switch ($file_name) {
    case 'index':
        $page_index = 0;
        break;
    case 'article_list':
        $page_index = 1;
        break;
    case 'article':
        $page_index = 1;
        break;
    case 'work_list':
        $page_index = 2;
        break;
    case 'work':
        $page_index = 2;
        break;
    case 'about':
        $page_index = 3;
        break;
    case 'register':
        $page_index = 4;
        break;
    default: // article有bug 顯示article.php，設為預設值
        $page_index = 1;
        break;
}
?>
<div class="top">
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">art公司網站</h1>

					<ul class="nav nav-pills">
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==0)?"active":""?>"
							href="./">首頁</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==1)?"active":""?>"
							href="article_list.php">所有文章</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==2)?"active":""?>"
							href="work_list.php">所有作品</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==3)?"active":""?>"
							href="about.php">關於我們</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==4)?"active":""?>"
							href="register.php">註冊</a></li>
					</ul>

				</div>
			</div>
		</div>
	</div>
</div>