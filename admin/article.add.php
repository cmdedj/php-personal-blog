<?php
session_start();
if(!isset($_SESSION['test']))
{
	echo "<script>alert('请登陆后访问');window.location.href='/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/pic/chis.jpg">

    <title>Console</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/dashboard.css" rel="stylesheet">

    <script src="/js/ie-emulation-modes-warning.js"></script>

    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="console.php">Console</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/logout.php">Exit</a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li>Server</a></li>
                <li><a href="console.php">ServerState</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>Article</a></li>
                <li class="active"><a href="#">ArticleAdd</a></li>
                <li><a href="article.manage.php">ArticleManagement</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>Comment</a></li>
                <li><a href="comment.manage.php">CommentManagement</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <form name="form" method="post" action="article.add.handle.php">
        <p>标题</p><input name="title" type="text" />
        <p>作者</p><input name="author" type="text" />
            <p>简介</p><textarea name="description" cols="60" rows="5"></textarea>
            <p>内容</p>
            <script name="content" id="editor" type="text/plain" style="width:800px;height:600px;"></script>
            <input type="submit" value="提交" />
        </form>
            <script type="text/javascript">

                //实例化编辑器
                //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                var ue = UE.getEditor('editor');


                function isFocus(e){
                    alert(UE.getEditor('editor').isFocus());
                    UE.dom.domUtils.preventDefault(e)
                }
                function setblur(e){
                    UE.getEditor('editor').blur();
                    UE.dom.domUtils.preventDefault(e)
                }
                function insertHtml() {
                    var value = prompt('插入html代码', '');
                    UE.getEditor('editor').execCommand('insertHtml', value)
                }
                function createEditor() {
                    enableBtn();
                    UE.getEditor('editor');
                }
                function getAllHtml() {
                    alert(UE.getEditor('editor').getAllHtml())
                }
                function getContent() {
                    var arr = [];
                    arr.push("使用editor.getContent()方法可以获得编辑器的内容");
                    arr.push("内容为：");
                    arr.push(UE.getEditor('editor').getContent());
                    alert(arr.join("\n"));
                }
                function getPlainTxt() {
                    var arr = [];
                    arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
                    arr.push("内容为：");
                    arr.push(UE.getEditor('editor').getPlainTxt());
                    alert(arr.join('\n'))
                }
                function setContent(isAppendTo) {
                    var arr = [];
                    arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
                    UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
                    alert(arr.join("\n"));
                }
                function setDisabled() {
                    UE.getEditor('editor').setDisabled('fullscreen');
                    disableBtn("enable");
                }

                function setEnabled() {
                    UE.getEditor('editor').setEnabled();
                    enableBtn();
                }

                function getText() {
                    //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                    var range = UE.getEditor('editor').selection.getRange();
                    range.select();
                    var txt = UE.getEditor('editor').selection.getText();
                    alert(txt)
                }

                function getContentTxt() {
                    var arr = [];
                    arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
                    arr.push("编辑器的纯文本内容为：");
                    arr.push(UE.getEditor('editor').getContentTxt());
                    alert(arr.join("\n"));
                }
                function hasContent() {
                    var arr = [];
                    arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
                    arr.push("判断结果为：");
                    arr.push(UE.getEditor('editor').hasContents());
                    alert(arr.join("\n"));
                }
                function setFocus() {
                    UE.getEditor('editor').focus();
                }
                function deleteEditor() {
                    disableBtn();
                    UE.getEditor('editor').destroy();
                }
                function disableBtn(str) {
                    var div = document.getElementById('btns');
                    var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                    for (var i = 0, btn; btn = btns[i++];) {
                        if (btn.id == str) {
                            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                        } else {
                            btn.setAttribute("disabled", "true");
                        }
                    }
                }
                function enableBtn() {
                    var div = document.getElementById('btns');
                    var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                    for (var i = 0, btn; btn = btns[i++];) {
                        UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                    }
                }

                function getLocalData () {
                    alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
                }

                function clearLocalData () {
                    UE.getEditor('editor').execCommand( "clearlocaldata" );
                    alert("已清空草稿箱")
                }
            </script>
        </div>
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/docs.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
