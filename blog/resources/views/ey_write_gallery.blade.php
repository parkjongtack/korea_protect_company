@include('ey_header')
<div class="con_main">
    <form action="">
        <div class="write_box">
            <div class="write_line">
                <div class="harf_line">
                    <div class="line_title">
                        카테고리
                    </div>
                    <div class="line_content">
                        <label for="cate_main"><input type="radio" name="cate" id="cate_main">메인</label>
                        <label for="cate_sub"><input type="radio" name="cate" id="cate_sub">서브</label>
                    </div>
                </div>
                <div class="harf_line">
                    <div class="line_title">
                        이미지
                    </div>
                    <div class="line_content">
                        <input type="file">
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        기간
                    </div>
                    <div class="line_content">
                        <input type="text"> ~ <input type="text">
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="harf_line">
                    <div class="line_title">
                        우선순위
                    </div>
                    <div class="line_content">
                        <input type="text">
                    </div>
                </div>
                <div class="harf_line">
                    <div class="line_title">
                        노출여부
                    </div>
                    <div class="line_content">
                        <label for="see_on"><input type="radio" name="see" id="see_on">메인</label>
                        <label for="see_off"><input type="radio" name="see" id="see_off">서브</label>
                    </div>
                </div>
            </div>
            <div class="submit_box">
                <input type="submit" value="등록">
                <input type="reset" value="취소">
            </div>
        </div>
    </form>
</div>
@include('ey_footer')