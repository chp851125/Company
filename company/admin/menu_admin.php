<?php
$file_path = $_SERVER['PHP_SELF']; // http://localhost/xampp/company/index.php
$file_name = basename($file_path, ".php"); // index
// echo $file_name; //article有bug 顯示article.php
switch ($file_name) {
    case 'index':
        $page_index = 0;
        break;
    case 'article_list':
    case 'article_edit':
    case 'article_add':
        $page_index = 1;
        break;
    case 'work_list':
    case 'work_edit':
    case 'work_add':
        $page_index = 2;
        break;
    case 'member_list':
    case 'member_edit':
    case 'member_add':
        $page_index = 3;
        break;
    default: // article有bug 顯示article.php，設為預設值
        $page_index = 0;   //work待確認是否正常
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
							class="nav-link "
							href="../index.php">前台首頁</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==0)?"active":""?>"
							href="./">後台首頁</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==1)?"active":""?>"
							href="article_list.php">所有文章</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==2)?"active":""?>"
							href="work_list.php">所有作品</a></li>
						<li class="nav-item"><a
							class="nav-link <?php echo ($page_index ==3)?"active":""?>"
							href="member_list.php">所有會員</a></li>
						<li class="nav-item"><a
							class="nav-link"
							href="../php/logout.php">登出</a></li>
					</ul>

				</div>
			</div>
		</div>
	</div>
</div>