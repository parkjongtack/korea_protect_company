@include('header')
{{-- 
    education02 - 문의 게시판
    happycall02 - FAQ 게시판
    happycall03 - 일반 게시판
    information01 - 일반 게시판
    information02 - 파일 게시판
    information03 - 파일 게시판
    information04 - 일반 게시판/갤러리게시판
    information05 - 일반 게시판
--}}
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
	function sample4_execDaumPostcode() {
		new daum.Postcode({
			oncomplete: function(data) {
				// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
				// 예제를 참고하여 다양한 활용법을 확인해 보세요.

				//alert(data.address);
				//alert(data.zonecode);

				$("input[name=writer_post]").val(data.zonecode);
				$("input[name=writer_addr1]").val(data.address);

			}
		}).open();
	}

	function sample4_execDaumPostcode2() {
		new daum.Postcode({
			oncomplete: function(data) {
				// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
				// 예제를 참고하여 다양한 활용법을 확인해 보세요.

				//alert(data.address);
				//alert(data.zonecode);

				$("input[name=writer2_corporation_post]").val(data.zonecode);
				$("input[name=writer2_corporation_addr1]").val(data.address);

			}
		}).open();
	}

</script>
{{-- education02 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">보안교육</a></li>
                <li><a href="/education01">교육 소개</a></li>
                <li class="on"><a href="/education02">교육신청</a></li>
                <li><a href="/education03">이러닝 교육</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    교육신청
                </div>
                <ul>
                    <li>Home</li>
                    <li>보안교육</li>
                    <li class="on">교육신청</li>
                </ul>
            </div>
            <div class="sub_tab">
                <div id="cso_education" class="tab1 tab_menu" style="width: 50%;">
                    CSO 양성교육
                </div>
                <div id="security_education" class="tab2 tab_menu" style="width: 50%;">
                    산업보안방문교육
                </div>
            </div>
            {{-- CSO 양성교육 --}}
            <div class="sub_inner tab_con on">
                <form name="cso_education_form" method="post" action="/request_education/request_education_action" class="form_list" onsubmit="return request_education_action();">
						{{ csrf_field() }}
                        <input type="hidden" name="board_type" value="{{ request()->segment(1) }}" />
						<input type="text" name="writer_name" placeholder="성명">
                        <select name="writer_sex" id="">
                            <option value="" selected disabled>성별 선택</option>
                            <option value="male">남자</option>
                            <option value="female">여자</option>
                        </select>
                        <select name="writer_corporation_divide" id="">
                            <option value="" selected disabled>소속 기업 구분 선택</option>
                            <option value="대기업">대기업</option>
                            <option value="중소 · 중견기업">중소 · 중견기업</option>
                            <option value="정부출연연구기관">정부출연연구기관</option>
                            <option value="기타">기타</option>
                        </select>
                        <input type="text" name="writer_corporation" placeholder="소속 기업명">
                        <input type="text" name="writer_grade" placeholder="직위">
                        <input type="text" name="writer_tel" placeholder="연락처 (-제외)" class="bor_bot number">
                        <input type="text" name="writer_email1" placeholder="이메일" class="e_mail"> @ <input type="text" name="writer_email2" placeholder="" class="e_mail str_email02" >
                        <select name="" id="" class="e_mail" onchange="javascript:email_insert(this.value);">
                            <option value="" selected>직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                            <option value="empas.com">empas.com</option>
                            <option value="dreamwiz.com">dreamwiz.com</option>
                            <option value="freechal.com">freechal.com</option>
                            <option value="lycos.co.kr">lycos.co.kr</option>
                            <option value="korea.com">korea.com</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="hanmir.com">hanmir.com</option>
                            <option value="paran.com">paran.com</option>
                        </select>
						<input type="text" name="writer_post" placeholder="우편번호" readonly onclick="javascript:sample4_execDaumPostcode();">
                        <input type="text" name="writer_addr1" placeholder="회사주소" readonly onclick="javascript:sample4_execDaumPostcode();">
                        <input type="text" name="writer_addr2" placeholder="(상세주소)">
                        <select name="writer_know_reason" id="">
                            <option value="" selected disabled>CSO 양성교육을 알게 된 경로</option>
                            <option value="인터넷 검색">인터넷 검색</option>
                            <option value="지인 추천">지인 추천</option>
                            <option value="협회 행사 참석">협회 행사 참석</option>
                            <option value="협회 홈페이지">협회 홈페이지</option>
                            <option value="회원사 서비스 안내">회원사 서비스 안내</option>
                            <option value="직접 문의">직접 문의</option>
                            <option value="기타">기타</option>
                        </select>
                        <div class="submit_box">
                            <input type="submit" value="신청하기">
                            <input type="reset" value="취소하기">
                        </div>
                </form>
            </div>
			<script type="text/javascript">
				
				function email_insert(value) {

					if(value == "") {
						$("input[name=writer_email2]").val("");
						$("input[name=writer_email2]").attr("readonly", false);
					} else {
						$("input[name=writer_email2]").val(value);
						$("input[name=writer_email2]").attr("readonly", true);
					}

				}
				

				function request_education_action() {

					var form = document.cso_education_form;

					if(form.writer_name.value == "") {
						
						alert("성명을 입력해주세요.");
						form.writer_name.focus();
						return false;

					}

					if(form.writer_sex.value == "") {
						
						alert("성별을 선택해주세요.");
						form.writer_name.focus();
						return false;

					}

					if(form.writer_corporation_divide.value == "") {
						
						alert("소속 기업 구분을 선택해주세요.");
						form.writer_corporation_divide.focus();
						return false;

					}


					if(form.writer_corporation.value == "") {
						
						alert("소속 기업명을 입력해주세요.");
						form.writer_corporation.focus();
						return false;

					}

					if(form.writer_grade.value == "") {
						
						alert("직위를 입력해주세요.");
						form.writer_grade.focus();
						return false;

					}

					if(form.writer_tel.value == "") {
						
						alert("연락처를 입력해주세요.");
						form.writer_tel.focus();
						return false;

					}

					if(form.writer_email1.value == "") {
						
						alert("이메일을 입력해주세요.");
						form.writer_email1.focus();
						return false;

					}

					if(form.writer_email2.value == "") {
						
						alert("이메일을 입력해주세요.");
						form.writer_email2.focus();
						return false;

					}

					if(form.writer_post.value == "" || form.writer_addr1.value == "") {

						alert("회사주소를 선택해주세요.");
						form.writer_post.focus();
						return false;

					}

					if(form.writer_know_reason.value == "") {
						
						alert("CSO양성교육을 알게된 경로를 선택해주세요.");
						form.writer_know_reason.focus();
						return false;

					}
					

				}

			</script>
            {{-- 산업보안방문교육 --}}
            <div class="sub_inner tab_con" style="display: none;">
                <form name="security_education_form" action="/request_education/request_education_action2" method="post" enctype="multipart/form-data" class="form_list" onsubmit="return security_education_action();">
						{{ csrf_field() }}
						<input type="hidden" name="board_type" value="{{ request()->segment(1) }}" />
                        <input type="text" name="writer2_corporation" placeholder="회사명">
                        <input type="text" name="writer2_name" placeholder="담당자">
                        <input type="text" name="writer2_position" placeholder="부서">
                        <input type="text" name="writer2_grade" placeholder="직위">
                        <input type="text" name="writer2_tel" placeholder="연락처 (-제외)" class="bor_bot number">
                        <input type="text" name="writer2_email1" placeholder="이메일" class="e_mail"> @ <input type="text" name="writer2_email2" placeholder="" class="e_mail str_email02">
                        <select name="" id="" class="e_mail selectEmail selectEmail2" onchange="javascript:email_insert2(this.value);">
                            <option value="" selected>직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                            <option value="empas.com">empas.com</option>
                            <option value="dreamwiz.com">dreamwiz.com</option>
                            <option value="freechal.com">freechal.com</option>
                            <option value="lycos.co.kr">lycos.co.kr</option>
                            <option value="korea.com">korea.com</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="hanmir.com">hanmir.com</option>
                            <option value="paran.com">paran.com</option>
                        </select>
                        <input type="text" name="writer2_corporation_post" placeholder="우편번호" readonly onclick="javascript:sample4_execDaumPostcode2();">
                        <input type="text" name="writer2_corporation_addr1" placeholder="회사주소" readonly  onclick="javascript:sample4_execDaumPostcode2();" >
                        <input type="text" name="writer2_corporation_addr2" placeholder="(상세주소)">
                        <input type="text" name="writer2_corporation_number" placeholder="사업자등록번호">
                        <input type="text" name="writer2_ceo" placeholder="대표자 성명">
                        <input type="text" name="writer2_divide" placeholder="업태/종목">
                        <input type="text" name="writer2_education_hope_day" placeholder="교육희망일">
                        <label class="af_won"><input type="text" name="total_money" placeholder="매출액"></label>
                        <label class="af_person"><input type="text" name="employee_count" placeholder="임직원수"></label>
                        <input type="text" name="education_target" placeholder="교육대상">
                        <label class="af_person"><input type="text" name="education_expect_people" placeholder="교육예상 인원"></label>
                        <input type="text" name="corporation_homepage" placeholder="회사홈페이지">
                        <textarea name="request_word" placeholder="요청사항"></textarea>
                        <input type="file" id="file_up" name="file_up" style="display:none;">
                        <label for="file_up" class="file_up"><span>사업자등록사본</span> [파일선택] </label>
                        <p class="blue_list">*본인은 개인 정보 처리에 관하여 고지 받았으며 이를 충분히 이해하고 동의합니다.</p>
                        <div class="ok_box">
                            ※ 개인정보 수집·이용 안내<br><br>
                            한국산업기술보호협회 홈페이지 서비스 제공을 위하여 다음과 같이 최소한의 개인정보를 수집·이용하고자 합니다.<br><br>
                            1. 개인정보 수집·이용 목적 : 방문교육 접수, 교육관련 안내, 교육홍보<br>
                            2. 수집하는 개인정보의 항목 : 이름, 소속, 이메일, 전화번호<br>
                            3. 수집하는 개인정보의 항목 : 회사명, 성명, 연락처, 부서, 직위, 이메일, 주소<br>
                        </div>
                        <label for="check_box" class="check_box"><input type="checkbox" id="check_box" name="check_box">본인은 개인 정보 처리에 관하여 고지 받았으며 이를 충분히 이해하고 동의합니다.</label>
                        <div class="submit_box">
                            <input type="submit" value="신청하기">
                            <input type="reset" value="취소하기">
                        </div>
                </form>
            </div>
        </div>
    </div>
	<script type="text/javascript">
		
		function email_insert2(value) {

			if(value == "") {
				$("input[name=writer2_email2]").val("");
				$("input[name=writer2_email2]").attr("readonly", false);
			} else {
				$("input[name=writer2_email2]").val(value);
				$("input[name=writer2_email2]").attr("readonly", true);
			}

		}
		

		function security_education_action() {

			if($("input:checkbox[name=check_box]").is(":checked") == false) {
				alert("개인정보처리방침에 동의해주세요.");
				return false;
			}

			var form = document.security_education_form;

			if(form.writer2_corporation.value == "") {
				
				alert("회사명을 입력해주세요.");
				form.writer2_corporation.focus();
				return false;

			}

			if(form.writer2_name.value == "") {
				
				alert("담당자명을 입력해주세요.");
				form.writer2_name.focus();
				return false;

			}

			if(form.writer2_position.value == "") {
				
				alert("부서를 입력해주세요.");
				form.writer2_position.focus();
				return false;

			}


			if(form.writer2_grade.value == "") {
				
				alert("직위를 입력해주세요.");
				form.writer2_grade.focus();
				return false;

			}

			if(form.writer2_tel.value == "") {
				
				alert("연락처를 입력해주세요.");
				form.writer2_tel.focus();
				return false;

			}

			if(form.writer2_email1.value == "") {
				
				alert("이메일을 입력해주세요.");
				form.writer2_email1.focus();
				return false;

			}

			if(form.writer2_email2.value == "") {
				
				alert("이메일을 입력해주세요.");
				form.writer2_email2.focus();
				return false;

			}

			if(form.writer2_corporation_post.value == "" || form.writer2_corporation_addr1.value == "") {

				alert("회사주소를 선택해주세요.");
				form.writer2_corporation_post.focus();
				return false;

			}

			if(form.writer2_ceo.value == "") {
				
				alert("대표자 성명을 입력해주세요.");
				form.writer2_ceo.focus();
				return false;

			}
			
			if(form.writer2_divide.value == "") {
				
				alert("업태/종목을 입력해주세요.");
				form.writer2_divide.focus();
				return false;

			}

			if(form.writer2_education_hope_day.value == "") {
				
				alert("교육희망일을 선택해주세요.");
				form.writer2_education_hope_day.focus();
				return false;

			}

			if(form.total_money.value == "") {
				
				alert("매출액을 입력해주세요.");
				form.total_money.focus();
				return false;

			}

			if(form.employee_count.value == "") {
				
				alert("임직원수를 입력해주세요.");
				form.employee_count.focus();
				return false;

			}

			if(form.education_target.value == "") {
				
				alert("교육대상을 입력해주세요.");
				form.education_target.focus();
				return false;

			}

			if(form.education_expect_people.value == "") {
				
				alert("교육예상 인원을 입력해주세요.");
				form.education_expect_people.focus();
				return false;

			}

			if(form.corporation_homepage.value == "") {
				
				alert("회사홈페이지를 입력해주세요.");
				form.corporation_homepage.focus();
				return false;

			}

			if(form.file_up.value == "") {
				
				alert("회사홈페이지를 입력해주세요.");
				form.file_up.focus();
				return false;

			}

		}

	</script>
    <script type="text/javascript">
    //파일
    $(document).ready(function(){
      var fileTarget = $('#file_up');
        fileTarget.on('change', function(){
            console.log('1');
            if(window.FileReader){
                var filename = $(this)[0].files[0].name;
            } else {
                var filename = $(this).val().split('/').pop().split('\\').pop();
            }
            $('.file_up').children('span').text(filename);
        });

		$("#cso_education").click();

    }); 
     //이메일 입력방식 선택 
	 /*
     $('.selectEmail1').change(function(){ 
         $(".selectEmail option:selected").each(function () { 
             if($(this).val()== '1'){ //직접입력일 경우 
                $(".str_email02").val(''); //값 초기화 
                $(".str_email02").attr("readonly",false); //활성화 
            }else{ //직접입력이 아닐경우 
                $(".str_email02").val($(this).text()); //선택값 입력
                $(".str_email02").attr("readonly",true); //비활성화 
            } 
        }); 
        });
		
		$('.selectEmail2').change(function(){ 
         $(".selectEmail option:selected").each(function () { 
             if($(this).val()== '1'){ //직접입력일 경우 
                $(".str_email02").val(''); //값 초기화 
                $(".str_email02").attr("readonly",false); //활성화 
            }else{ //직접입력이 아닐경우 
                $(".str_email02").val($(this).text()); //선택값 입력
                $(".str_email02").attr("readonly",true); //비활성화 
            } 
        }); 
        });
*/
    $('.form_list input[type=text]').keyup(function(){
        var cla = $(this).attr('class');
        if(cla == 'bor_bot number'){
            $(this).val($(this).val().replace(/[^0-9]/gi,""));
        }
    });
    </script>
@include('footer')