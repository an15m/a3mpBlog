<?php
    header("Content-type: text/html; charset=utf-8");  //设置编码字符集
    require './Public/PHP/markdown.php';  //markdown解析器
    class IndexAction extends CommonAction {

        //主页
        public function index(){
            //友情链接
            $link=M("Link");
            $linkRst=$link->select();
            $this->assign("link",$linkRst);

            //获取处理其他信息
            $other=M("Other");
            $otherRst=$other->find(0);
            $this->assign("motto",$otherRst['motto']);
            $this->assign("now_learn",$otherRst['now_learn']);
            //记录访问次数
            $total_visit=$otherRst['total_visit'];
            $total_visit_data['total_visit']=$total_visit+1;
            $other->where('id = 0')->save($total_visit_data);

            //是否限制文章长度
            $_SESSION['is_limit']=1;

            //取文章并分配
            $articles=M("Articles");
            $rst=$articles->order('time desc')->select();
            //markdown解析
            for($i=0;$i<count($rst);$i++){
                $rst[$i]['content']=Markdown($rst[$i]['content']);
                $rst[$i]['content']=preg_replace('/code/', 'pre', $rst[$i]['content']);
            }
            $this->assign("articles",$rst);

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            $this->assign('latest_articles',$latest_articles_rst);
            
            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            $this->assign('click_articles',$click_articles_rst);

            //技术子栏内容
            $tech=M("Tech");
            $techrst=$tech->select();
            $this->assign("tech",$techrst);

            //readmore
            $this->assign("fun","index");
            if($_GET['number']){
                $number=$_GET['number'];
            }else{
                $number=0;
            }
            $this->assign("number",$number+5);
            $this->assign("limit_articles",$number+5);

            //是否显示评论内容
            $this->assign("comments","none");

            //阅读全文与评论按钮
            $this->assign("readall","block");
            $this->assign("discuss","none");
            
            //中部header信息
            $this->assign("header",'首页');

            //显示模版
        	$this->display();
        }

        //是否限制文章长度
        public function limit(){
        	echo $_SESSION['is_limit'];
        }

        //判断是否登陆
        public function IsLogin(){
        	if($_SESSION['login']==1){
        		echo 1;
        	}else{
        		echo 0;
        	}
        }

        //阅读全文
        public function read_all(){
            //友情链接
            $link=M("Link");
            $linkRst=$link->select();
            $this->assign("link",$linkRst);

            //获取处理其他信息
            $other=M("Other");
            $otherRst=$other->find(0);
            $this->assign("motto",$otherRst['motto']);
            $this->assign("now_learn",$otherRst['now_learn']);

            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            $this->assign('click_articles',$click_articles_rst);

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            $this->assign('latest_articles',$latest_articles_rst);

            //是否限制文章长度
            $_SESSION['is_limit']=0;

            //技术子栏内容
            $tech=M("Tech");
            $techrst=$tech->select();
            $this->assign("tech",$techrst);

            //获取文章内容
            $id=$_GET['id'];
            $this->assign("article_id",$id);  //分配文章id，为评论准备
            $article=M("Articles");
            $where['id']=$id;
            $rst=$article->where($where)->select();
            //markdown解析
            for($i=0;$i<count($rst);$i++){
                $rst[$i]['content']=Markdown($rst[$i]['content']);
                $rst[$i]['content']=preg_replace('/code/', 'pre', $rst[$i]['content']);
            }
            if(!$rst){
                $this->error('文章不存在！');
            }
            //获取文章评论
            for($i=0;$i<count($rst);$i++){
                $comments=M("Comments");
                $where1['articleid']=$rst[$i]['id'];
                $rst1=$comments->where($where1)->order("time")->select();
                for($j=0;$j<count($rst1);$j++){
                    $rst[$i]['comments'][$j]['content']=htmlspecialchars($rst1[$j]['content']);
                    $rst[$i]['comments'][$j]['time']=$rst1[$j]['time'];
                    $rst[$i]['comments'][$j]['username']=htmlspecialchars($rst1[$j]['username']);
                    $rst[$i]['comments'][$j]['id']=$rst1[$j]['id'];
                }
            }
            $this->assign("articles",$rst);
            //文章评论次数
            $comment_number=count($rst[0]['comments']);
            $this->assign('comment_number',$comment_number);
            //文章点击次数加1
            $click_number=$rst[0]['clicknumber'];
            $data['clicknumber']=$click_number+1;
            $article->where($where)->save($data);

            //新评论模板
            $this->assign("new_comment","block");

            //阅读全文与评论按钮
            $this->assign("discuss","block");
            $this->assign("readall","none");

            //隐藏readmore
            $this->assign("readmore","none");

            //中部header信息
            $this->assign("header",$rst[0]['title']);
            
            //显示模板
            $this->display("index");
        }

        //分类查询
        public function do_sort(){
            //友情链接
            $link=M("Link");
            $linkRst=$link->select();
            $this->assign("link",$linkRst);

            //获取处理其他信息
            $other=M("Other");
            $otherRst=$other->find(0);
            $this->assign("motto",$otherRst['motto']);
            $this->assign("now_learn",$otherRst['now_learn']);

            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            $this->assign('click_articles',$click_articles_rst);

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            $this->assign('latest_articles',$latest_articles_rst);

            //是否限制文章长度
            $_SESSION['is_limit']=1;

            //获取分类文章
            $type=$_GET['type'];
            $articles=M("Articles");
            $where['type']=$type;
            $rst=$articles->where($where)->order("time")->select();
            if($rst){
                //markdown解析
                for($i=0;$i<count($rst);$i++){
                    $rst[$i]['content']=Markdown($rst[$i]['content']);
                    $rst[$i]['content']=preg_replace('/code/', 'pre', $rst[$i]['content']);
                }
                
                //技术子栏内容
                $tech=M("Tech");
                $techrst=$tech->select();
                $this->assign("tech",$techrst);

                //隐藏评论
                $this->assign("comments","none");

                //阅读全文与评论按钮
                $this->assign("discuss","none");
                $this->assign("readall","block");

                //分配文章到前台
                $this->assign("articles",$rst);

                //中部header信息
                $this->assign("header",$type);

                //readmore
                $this->assign("fun","do_sort/type/".$type);
                if($_GET['number']){
                    $number=$_GET['number'];
                }else{
                    $number=0;
                }
                $this->assign("number",$number+5);
                $this->assign("limit_articles",$number+5);

                //显示模板
                $this->display("index");
            }else{
                $this->error('页面不存在，亲，不要调皮！');
            }
        }

        //关于我
        public function about_me(){
            //友情链接
            $link=M("Link");
            $linkRst=$link->select();
            $this->assign("link",$linkRst);

            //获取处理其他信息
            $other=M("Other");
            $otherRst=$other->find(0);
            $this->assign("motto",$otherRst['motto']);
            $this->assign("now_learn",$otherRst['now_learn']);

            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            $this->assign('click_articles',$click_articles_rst);

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            $this->assign('latest_articles',$latest_articles_rst);

            //技术子栏内容
            $tech=M("Tech");
            $techrst=$tech->select();
            $this->assign("tech",$techrst);
            
            //显示about me内容
            $this->assign("about_me","block");

            //隐藏readmore
            $this->assign("readmore","none");

            //中部header信息
            $this->assign("header",'关于我');

            //显示模板
            $this->display("index");
        }

        //留言板
        public function message(){
            //友情链接
            $link=M("Link");
            $linkRst=$link->select();
            $this->assign("link",$linkRst);

            //获取处理其他信息
            $other=M("Other");
            $otherRst=$other->find(0);
            $this->assign("motto",$otherRst['motto']);
            $this->assign("now_learn",$otherRst['now_learn']);

            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            $this->assign('click_articles',$click_articles_rst);

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            $this->assign('latest_articles',$latest_articles_rst);

            //获取并分配留言内容
            $message=M("Messages");
            $rst=$message->order("time")->select();
            //防止用户输入html标签
            for($i=0;$i<count($rst);$i++){
                $rst[$i]['username']=htmlspecialchars($rst[$i]['username']);
                $rst[$i]['content']=htmlspecialchars($rst[$i]['content']);
            }
            $this->assign("messages",$rst);
            //留言条数
            $message_number=count($rst);
            $this->assign("message_number",$message_number);
            $this->assign("fun","message");
            if($_GET['number']){
                $number=$_GET['number'];
            }else{
                $number=0;
            }
            $this->assign("number",$number+10);
            $this->assign("limit_articles",$number+10);

            //技术子栏内容
            $tech=M("Tech");
            $techrst=$tech->select();
            $this->assign("tech",$techrst);

            //中部header信息
            $this->assign("header",'留言板');
            
            //显示留言模块
            $this->assign("message","block");

            //显示模板
            $this->display("index");
        }

        //搜索
        public function search(){
            //友情链接
            $link=M("Link");
            $linkRst=$link->select();
            $this->assign("link",$linkRst);

            //获取处理其他信息
            $other=M("Other");
            $otherRst=$other->find(0);
            $this->assign("motto",$otherRst['motto']);
            $this->assign("now_learn",$otherRst['now_learn']);

            //是否限制文章长度
            $_SESSION['is_limit']=1;

            //取文章并分配
            $articles=M("Articles");
            $data['title']=array("like","%".$_POST['search']."%");
            $data['content']=array("like","%".$_POST['search']."%");
            $data['_logic']="or";
            $searchRst=$articles->order('time desc')->where($data)->select();
            //markdown解析
            for($i=0;$i<count($searchRst);$i++){
                $searchRst[$i]['content']=Markdown($searchRst[$i]['content']);
                $searchRst[$i]['content']=preg_replace('/code/', 'pre', $searchRst[$i]['content']);
            }
            $this->assign("articles",$searchRst);

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            $this->assign('latest_articles',$latest_articles_rst);
            
            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            $this->assign('click_articles',$click_articles_rst);

            //技术子栏内容
            $tech=M("Tech");
            $techrst=$tech->select();
            $this->assign("tech",$techrst);

            //readmore
            $this->assign("fun","index");
            if($_GET['number']){
                $number=$_GET['number'];
            }else{
                $number=0;
            }
            $this->assign("number",$number+5);
            $this->assign("limit_articles",$number+5);

            //是否显示评论内容
            $this->assign("comments","none");

            //阅读全文与评论按钮
            $this->assign("readall","block");
            $this->assign("discuss","none");
            
            //中部header信息
            $this->assign("header",$_POST['search']);

            //显示模版
            $this->display("index");
        }

        //处理文章评论
        public function new_comment(){
            $articleid=$_POST['article_id'];
            $comment=D("Comments");
            $data['articleid']=$articleid;
            $data['content']=$_POST['new_comment'];
            $data['time']=time();

            if($_SESSION['login']==1){
                $data['username']=$_SESSION['username'];
                $data['useremail']=$_SESSION['useremail'];
            }else{
                $data['username']=$_POST['username'];
                $data['useremail']=$_POST['useremail'];
            }
            if(!$comment->create($data)){
                $this->error($comment->getError());
            }
            $comment->add();
            $this->success('评论成功！');
        }

        //处理留言
        public function new_message(){
            $message=D("Messages");
            $data['time']=time();
            $data['content']=($_POST['new_message']);
            if($_SESSION['login']==1){
                $data['username']=$_SESSION['username'];
                $data['useremail']=$_SESSION['useremail'];
            }else{
                $data['username']=$_POST['username'];
                $data['useremail']=$_POST['useremail'];
            }
            if(!$message->create($data)){
                $this->error($message->getError());
            }
            $message->add();
            $this->success('留言成功！');
        }

}