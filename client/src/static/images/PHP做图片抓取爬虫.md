# PHP制作爬虫小程序
## 前提摘要
>&emsp;为了证明PHP是世界上最好的语言。py 可以做爬虫是吧，我们PHP也可以啊！所以就用PHP做了一个小爬虫，抓取一下学校官网的新闻。这篇文档主要使用curl库去做，后续可能会更新其它类似于Snoopy的开发笔记。
##文件解释及操作步骤

#### index.php --> 简陋而不失霸气的前端传值页面（可略过不看）
```
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Bao爬虫(PHP)</title>
</head>
<body>
    <div class="wrap">
        <h1>我是 Bao 大大制作的一只小爬虫</h1>
        <div class="SearchValue">
            <form action="spider.php" method="post">
                <label>
                    请输入站点url：<input type="text" name="keyword" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="爬取一下吧" />
                </label><br><br>
                <p  style="text-align: center;">
                    <input type="radio" name="downType" value="1" />图片
                    <input type="radio" name="downType" value="2" />视频
                    <input type="radio" name="downType" value="3" />文本
                    <input type="radio" name="downType" value="4" />其他
                </p>
            </form>
        </div>
    </div>
</body>
</html>
```
### spider.php --> 爬虫类文件
```
<?php
header("Content-type:text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);

// 爬取的网址为空
if ($_POST['keyword'] == '' || $_POST['downType'] =='') {
    echo "似乎那里出错了,传值错误！！！";
    header("Refresh:3;url=./index.php");
    exit();
}
$url = $_POST['keyword'];
// $pat = "<img src=\"(.+.jpg)\".+>";
switch ($_POST['downType']) {
    case 1:
        $pat = "<img src=\"(.+.jpg)\".+>";
        break;
    case 2:
        $pat = "<img src=\"(.+.jpg)\".+>";
        break;
    case 3:
        $pat = "<img src=\"(.+.jpg)\".+>";
        break;
    case 4:
        $pat = "<img src=\"(.+.jpg)\".+>";
        break;
    default:
        echo "正则表达式存在问题!";
        header("Refresh:3;url=./index.php");
        break;
}


class spider{
    
    //通过curl方法获取网页
    public function Bycurl($url){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $content = curl_exec($ch);
        if ($content == false) {
            echo "似乎那里出错了。。。";
            header("Refresh:3;url=./index.php");
            die();
        }
        curl_close($ch);
        return $content;
    }

    //正则匹配
    public function getValue($html,$pat){
        $matches = array();
        preg_match_all($pat,$html,$matches);
        for ($i=0; $i < count($matches[0]); $i++) { 
            $num = $i+1;
            $url="127.0.0.1/webspier/download.php?filename=http://www.mmvtc.cn/templet/default/".$matches[1][$i];
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_exec($ch);
            curl_close($ch);
            // $thisimages  = $matches[1][$i];
            echo "已经抓取到了".$num."张图片!<br>";
        }
        echo "抓取完成！！！";
    }

$spider = new spider();
$content = $spider->Bycurl($url);
$spider->getValue($content,$pat);
```
#### 重点提炼讲:
> curl库相关操作
    
    //初始化一个curl句柄
    $ch = curl_init();

    //以下两行都为设置连接头部信息,有的网站需要登陆后才可查看内容,就得靠这里发送登录信息了,日后可能更新说到伪造登录。

    curl_setopt($ch,CURLOPT_URL,$url);               //设置爬取的链接，$url为前面post过来的数据
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);      //获取到网页内容，不直接输出1为true
    
    //执行句柄$ch，并把得到的内容赋值给变量$content
    $content = curl_exec($ch);
> 正则表达式浅说 ```<img src=\"(.+.jpg)\".+>```
    

    (一)构造正则表达式的步骤

        1)先把原网站上的代码原封不动的复制过来。        得出：<img src="images/zxin.jpg" alt="">

        2)特殊字符转义。                            得出：<img src=\"images\/zxin\.jpg" alt=\"\">

        3)加入正则表达式的字符。                  得出：<img src=\"(.+.jpg)\".+>

        4)构造好后，去测试。                 测试链接：http://tool.oschina.net/regex/

    (二)解释

        <img src=\"(.+.jpg)\".+>

        ()括号中是我们要得到的东西，通过preg_match_all()函数后会存放在数组的第二列 数组[1][括号中匹配的内容]

        .+ .是任意字符匹配，所以这里用 . 会不太严谨的，应该根据内容来改变，后期完善。

    (三)正则表达式学习推荐：https://www.jb51.net/tools/zhengze.html


> preg_match_all()函数讲解

    preg_match_all()函数是抓取中重要的一步,它主要是从你通过curl库下载下来的网页代码中找到你要的内容。

    用法:preg_match_all(正则匹配式, 要匹配的内容, 存放的数组);
## 完成回顾
