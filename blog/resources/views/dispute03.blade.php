@include('header')
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">산업기술분쟁조정</a></li>
                <li><a href="/dispute01">제도 소개</a></li>
                <li><a href="/dispute02">위원회 소개</a></li>
                <li class="on"><a href="/dispute03">조정신청</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    조정신청
                </div>
                <ul>
                    <li>Home</li>
                    <li>산업기술분쟁조정</li>
                    <li class="on">조정신청</li>
                </ul>
            </div>
            <div class="sub_inner">
                <div class="disp03_1 disp_">
                    <h3 class="sub_sec_title be_line">
                        신청방법
                    </h3>
                    <p class="sub_sec_text be_line">
                        소정의 양식을 작성하신 후, 산업기술분쟁조정위원회 사무국에 방문 또는 우편으로 제출하시면 신청이 완료됩니다. <br>
                        조정신청서 작성 시 도움이 필요하신 경우에는 사무국에서 작성 도움을 드립니다.<br>
                        <br>
                        주소 : 서울특별시 서초구 서운로 1길 34 (서초동 1355-26) 한국산업기술보호협회(산업기술분쟁조정위원회 사무국 담당자 앞)
                    </p>
                    <div class="download_outer">
                        <a href="#none" class="download_abtn">
                            조정신청서 다운받기<img src="img/download_ico.png" alt="">
                        </a>
                    </div>
                    <p class="sub_sec_text be_line">
                        <br>
                        * 조정신청서 수령 후 7일 이내에 사무국에서 연락을 드립니다.<br>
                        * 문의사항은 전화(02-3489-7022) 또는 이메일(mgcho@kaits.or.kr)로 연락주시기 바랍니다.
                    </p>
                </div>
            </div>
        </div>
    </div>
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
    }); 
     //이메일 입력방식 선택 
     $('.selectEmail').change(function(){ 
         $(".selectEmail option:selected").each(function () { 
             if($(this).val()== '1'){ //직접입력일 경우 
                $(".str_email02").val(''); //값 초기화 
                $(".str_email02").attr("disabled",false); //활성화 
            }else{ //직접입력이 아닐경우 
                $(".str_email02").val($(this).text()); //선택값 입력
                $(".str_email02").attr("disabled",true); //비활성화 
            } 
        }); 
        }); 

    $('.form_list input[type=text]').keyup(function(){
        var cla = $(this).attr('class');
        if(cla == 'bor_bot number'){
            $(this).val($(this).val().replace(/[^0-9]/gi,""));
        }
    });
    </script>
@include('footer')