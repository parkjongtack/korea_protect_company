<!DOCTYPE html>
<html>
    <head>
        <title>산업보안 정보도서관</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/index.css">
        <link rel="stylesheet" href="/css/swiper.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="/js/index.js"></script>
        <script src="/js/swiper.min.js"></script>
		<style>
		.poplayer{position:fixed;z-index:9999;}
		.poplayer img{display:block;}
		.poplayer a{float:right;text-align:right;padding:10px 5px;color:#000;}
		.poplayer .close_box{background-color:#dfdfdf;height:41px;}
		</style>
		<?php

			error_reporting(0);

			/*
			$db_host = "promalldb3.godomall.com"; 
			$db_user = "kim1988"; 
			$db_passwd = "kilool8681";
			$db_name = "every091_godomall_com"; 
			$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

			if (mysqli_connect_errno($conn)) {
			//echo "데이터베이스 연결 실패: " . mysqli_connect_error();
			} else {
			//echo "성공~!!!";
			}
			*/

			$host_local = "localhost";
			$host_name = "root";
			$host_pass = "adwiz1234";
			$host_db = "korea_industry_protect";

			$db = new mysqli($host_local,$host_name,$host_pass,$host_db);
			$db->set_charset("utf8");
			function mq($sql)
			{
				global $db;
				return $db->query($sql);
			}

			$sql = "SELECT * FROM poplayer WHERE see='Y'";
			$result = mysqli_query($db, $sql);
			$i = 1;
			while($img = mysqli_fetch_array($result)){
				$img_length = 1;
				$imgsrc = '/storage/app/images/'.$img['img'];
				if($img['pop_position'] == 'lefttop'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='top:".$img['m_height']."px;left:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}else if($img['pop_position'] == 'leftbot'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='bottom:".$img['m_height']."px;left:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}else if($img['pop_position'] == 'righttop'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='top:".$img['m_height']."px;right:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}else if($img['pop_position'] == 'rightbot'){
					echo"<div class='poplayer poplayer".$img['idx']."' style='bottom:".$img['m_height']."px;right:".$img['m_width']."px'>";
					echo"<img src=".$imgsrc." style='width:".$img['i_width']."px; height:".$img['i_height']."px;' alt=''>";
					echo'<div class="close_box">';
					echo'<a class="close1" href="#">[닫기]</a>';
					echo'<a class="24h'.$img['idx'].'" href="#">하루동안 보지 않기</a>';
					echo'</div>';
					echo"</div>";
				}
		?>
				<script type="text/javascript">

					$(function(){
						var cookiedata = document.cookie;
						function setCookie(name, value, expirehours) {
							var todayDate = new Date();
							todayDate.setHours(todayDate.getHours() + expirehours);
							document.cookie = name + "=" + escape(value) + ";path=/;expires=" + todayDate.toGMTString() + ";"
						}
					
					
						if (cookiedata.indexOf("ncookie<?=$img['idx']?>=done") < 0) {
							$('.poplayer<?=$img['idx']?>').show();
						} else {
							$('.poplayer<?=$img['idx']?>').hide();
						}
						function Pop_close() {
							var par = $(this).parents('div.poplayer<?=$img['idx']?>');
							$(par).hide();
						}
						$('.close1').click(function(){
							var par = $(this).parents('div.poplayer<?=$img['idx']?>');
							$(par).hide();
						});
						function todaycloseWin<?=$img['idx']?>() {
								setCookie("ncookie<?=$img['idx']?>", "done", 24);
								$('.poplayer<?=$img['idx']?>').hide();
							}
						$('.24h<?=$img['idx']?>').click(function(){
							todaycloseWin<?=$img['idx']?>();
						});
						//팝업모바일
						var popbox = $('.poplayer');
						var popimg = $('.poplayer img');
					
						if($(document).width()<769){
							$(popimg).css({width:'100%',height:'auto'});
							$(popbox).css({width:'calc(100% - 20px)',top:'60px',left:'10px'});
						}
					});

				</script>

		<?php
				$i++;
			}
		?>
	</head>
    <body>
        <div id="container">
            <div id="header">
                <div class="h_top_outer">
                    <div class="h_top inner">
                        <a href="/">
                            <div class="h_logo">
                                <img src="/img/logo.png" alt="선업보안 정보 도서관 로고">
                            </div>
                        </a>
                        <div class="h_search">
                            <form name="all_search_form" action="/all_search" onsubmit="javascript:all_search();">
                                <input type="text" name="search" placeholder="찾고 싶으신 정보를 검색해보세요!" value="{{ request()->search }}" required>
                                <button type="submit"></button>
                            </form>
                        </div>
						<script type="text/javascript">
							function all_search() {
								var form = document.all_search_form;

								if(form.search.value == "") {
									alert("검색어를 입력해주세요.");
									return false;
								}
							}
						</script>
                        <div class="h_site bold">
                            <ul>
                                <li><a href="/">HOME</a></li>
                                <li><a href="/sitemap">사이트맵</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="h_nav">
                    <ul class="top_nav inner">
                        <a href="/tech01"><li>
                            국가핵심기술
                        </li></a>
                        <a href="/institution01"><li>
                            산업기술 확인제도
                        </li></a>
                        <a href="/dispute01"><li>
                            산업기술분쟁조정
                        </li></a>
                        <a href="/education01"><li>
                            산업보안교육
                        </li></a>
                        <a href="/happycall01"><li>
                            해피콜 상담서비스
                        </li></a>
                        <a href="/notice/notice_list"><li>
                            정보마당
                        </li></a>
                    </ul>
                    <div class="h_sub_nav">
                        <div class="inner">
                            <ul>
                                <a href="/tech01">
                                    <li>제도 소개</li>
                                </a>
                                <a href="/tech02">
                                    <li>보호조치ㆍ실태조사</li>
                                </a>
                                <a href="/tech03">
                                    <li>지정ㆍ변경ㆍ해제</li>
                                </a>
                                <a href="/tech04">
                                    <li>수출승인ㆍ신고</li>
                                </a>
                                <a href="/tech05">
                                    <li>해외 인수ㆍ합병</li>
                                </a>
                                <a href="/tech06">
                                    <li>사전판정ㆍ사전검토</li>
                                </a>
                            </ul>
                            <ul>
                                <a href="/institution01">
                                    <li>제도 소개</li>
                                </a>
                                <a href="/institution02">
                                    <li>확인절차</li>
                                </a>
                                <a href="/institution03">
                                    <li>확인신청</li>
                                </a>
                            </ul>
                            <ul>
                                <a href="/dispute01">
                                    <li>제도 소개</li>
                                </a>
                                <a href="/dispute02">
                                    <li>위원회 소개</li>
                                </a>
                                <a href="/dispute03">
                                    <li>조정신청</li>
                                </a>
                            </ul>
                            <ul>
                                <a href="/education01">
                                    <li>교육소개</li>
                                </a>
                                <a href="/request_education">
                                    <li>교육신청</li>
                                </a>
                                <a href="/education03">
                                    <li>이너링 교육</li>
                                </a>
                            </ul>
                            <ul>
                                <a href="/happycall01">
                                    <li>상담서비스 소개</li>
                                </a>
                                <a href="/faq/faq_list">
                                    <li>FAQ</li>
                                </a>
                                <a href="/happy_call">
                                    <li>상담신청</li>
                                </a>
                            </ul>
                            <ul>
                                <a href="/notice/notice_list">
                                    <li>공지사항</li>
                                </a>
                                <a href="/ey_law_data_room/data_room_list/?category_type=ey_data_room&category_type=1">
                                    <li>법령정보</li>
                                </a>
                                <a href="/ey_security_data_room/data_room_list/?category_type=ey_data_room&category_type=1">
                                    <li>보안서식</li>
                                </a>
                                <a href="/ey_data_room/data_room_list/?category_type=ey_data_room&category_type=1">
                                    <li>자료실</li>
                                </a>
                                <a href="/ey_newsletter/notice_list">
                                    <li>뉴스레터</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>