<script>
    function clickfrom() {
        if (document.sfrom.text.value == "Nhập từ khóa ...") {
            document.sfrom.text.value = "";
        }
    }

    function outclick() {
        if (document.sfrom.text.value == "") {
            document.sfrom.text.value = "Nhập từ khóa ...";
        }
    }
</script>
<div id="search" class="col-md-7 col-sm-12 col-xs-12">
    <form method="POST" name="sfrom" action="home.php?page_lay=search">
        <input type="text" name="text" value="Nhập từ khóa ..." onfocus="clickfrom()" onblur="outclick()">
        <input type="submit" name="submit" value="Tìm Kiếm">
    </form>
</div>