<?php

	session_start();

    //引用数据库信息文件
    require_once 'DBinfo.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <title>News publisher</title>
    <link rel="stylesheet" type="text/css" href="static/css/news.css">
    <link rel="stylesheet" type="text/css" href="static/css/animate.min.css">
    <style type="text/css">
    /*媒体查询*/
    
    @media screen and (max-width: 1063px) {
        .list_main_left {
            display: none;
        }
        .list_main_right {
            width: 100%;
        }
        .nav_wrap {
            margin-left: 0px;
        }
    }
    
    @media screen and (max-width: 920px) {
        .nav_content {
            display: none;
        }
    }
    </style>
</head>

<body class="list_body">
    <div class="header">
        <div class="nav list_nav">
            <div class="nav_wrap">
                <div class="nav_logo">
                    <img src="static/img/nav_logo.png" />
                </div>
                <!-- nav_logo end -->
                <div class="nav_content list_nav_content">
                    <ul>
                        <li><a href="index.php">新闻首页</a></li>
                    </ul>
                </div>
                <!-- nav_content end -->
                <div id="waitToRefresh">
                    <div class="nav_login list_nav_login">
                        <a href="login.html" id="nav_login_a">登录</a>
                    </div>
                </div>
                <!-- nav_login end -->
                <div class="nav_move">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <!-- nav_move end -->
            </div>
            <!-- wrap end -->
            <div class="list_nav_bottom">
                <img src="static/img/nav_bottom.png" />
            </div>
        </div>
        <!-- nav end -->
    </div>
    <!-- head end -->
    <div class="list_main">
        <div class="list_main_left">
            <div class="list_main_left_placeH"></div>
            <div class="list_main_left_list acT_main_left_list">
                <h2>View by</h2>
                <ul>
                    <li>
                        <p class="active" style="background-position:0px 50%;" data-znum="2">2017</p>
                        <div class="list_main_right_content_List">
                            <ul>
                            <?php

	                            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
								$query = "SELECT title FROM cnta_news WHERE releaseTime >'2017-01-01 00:00:00'";

								$res = mysqli_query($link,$query);
								$num = mysqli_num_rows($res);

								while($num)
								{
									$currentRow = mysqli_fetch_array($res);
									echo "<li data-tag='1' class='animated'>";
									echo $currentRow['title'];
									echo "</li>";

									$num--;
								}

                            ?>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <p style="background-position:-188px 50%;" data-znum="0">2016</p>
                        <div class="list_main_right_content_List">
                            <ul>
                                <?php

								$query = "SELECT title FROM cnta_news WHERE releaseTime <'2017-01-01 00:00:00'";

								$res = mysqli_query($link,$query);
								$num = mysqli_num_rows($res);

								while($num)
								{
									$currentRow = mysqli_fetch_array($res);
									echo "<li data-tag='1' class='animated'>";
									echo $currentRow['title'];
									echo "</li>";

									$num--;
								}

                            ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="list_main_right">
            <div class="list_main_right_title">
                <h1>News</h1></div>
            <div class="list_main_right_border"></div>
            <div class="list_main_right_content">
                         <?php

								$query = "SELECT title,author,releaseTime,content FROM cnta_news WHERE releaseTime >'2017-01-01 00:00:00'";

								$res = mysqli_query($link,$query);
								$num = mysqli_num_rows($res);

								while($num)
								{
									$currentRow = mysqli_fetch_array($res);
									echo <<<BLOCK
									<blockquote style="display:none">
					                    <div class="title">
					                        <h3>{$currentRow['title']}</h3></div>
					                    <div class="content">
					                        {$currentRow['content']}
					                    </div>
					                    <div class="author">编辑:<span> {$currentRow['author']}</span></div>
					                    <div class="releaseTime">发布时间:<span> {$currentRow['releaseTime']}</span></div>
					                </blockquote>

BLOCK;
									$num--;
								}

                            ?>
                </blockquote>
            </div>
            <div class="list_main_right_content">
            <?php

								$query = "SELECT title,author,releaseTime,content FROM cnta_news WHERE releaseTime <'2017-01-01 00:00:00'";

								$res = mysqli_query($link,$query);
								$num = mysqli_num_rows($res);

								while($num)
								{
									$currentRow = mysqli_fetch_array($res);
									echo <<<BLOCK
									<blockquote style="display:none">
					                    <div class="title">
					                        <h3>{$currentRow['title']}</h3></div>
					                    <div class="content">
					                        {$currentRow['content']}
					                    </div>
					                    <div class="author">编辑:<span> {$currentRow['author']}</span></div>
					                    <div class="releaseTime">发布时间:<span> {$currentRow['releaseTime']}</span></div>
					                </blockquote>

BLOCK;
									$num--;
								}

                            ?>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <!-- list_main end  -->
    <div class="copyright list_copyright">
        <p> © 2016 CNTA,Chengdu University of Technology;</p>
        <p>Powered by<a href="index.php">Orpheus</a></p>
        <p>contact us</p>
        <div class="copyright_wrap">
            <a href="javascript:"><img src="static/img/copyright_1.png" /></a>
            <a href="javascript:"><img src="static/img/copyright_2.png" /></a>
            <a href="javascript:"><img src="static/img/copyright_3.png" /></a>
            <a href="javascript:"><img src="static/img/copyright_4.png" /></a>
            <a href="javascript:"><img src="static/img/copyright_5.png" /></a>
        </div>
    </div>
    <!-- list_copyright end -->
    <script type="text/javascript" src="lib/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="lib/recMouseMove.js"></script>
    <script type="text/javascript" src="lib/left_list.js"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
    		$(".list_main_right_content:eq(0) blockquote").eq(0).css({
    			display: 'block'
    		});
    	});
    </script>
</body>

</html>
