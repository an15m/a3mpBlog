<?php
    header("Content-type: text/html; charset=utf-8");  //设置编码字符集
    require './Public/PHP/Parsedown.php';//markdown解析器
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

            //最近文章
            $latest_articles=M("Articles");
            $latest_articles_rst=$latest_articles->order('time desc')->field(array('title','id'))->limit(5)->select();
            /*
            //限制标题长度
            for($i=0;$i<count($latest_articles_rst);$i++){
                if(strlen($latest_articles_rst[$i]['title']) > 22){
                    $latest_articles_rst[$i]['title'] = substr($latest_articles_rst[$i]['title'],0,21)."...";
                }
            }
            */
            $this->assign('latest_articles',$latest_articles_rst);
            
            //点击排行
            $click_articles=M("Articles");
            $click_articles_rst=$click_articles->order('clicknumber desc')->field(array('title','id','clicknumber'))->limit(10)->select();
            /*
            //限制标题长度
            for($i=0;$i<count($click_articles_rst);$i++){
                if(strlen($click_articles_rst[$i]['title']) > 16){
                    $click_articles_rst[$i]['title'] = substr($click_articles_rst[$i]['title'],0,15)."...";
                }
            }
            */
            $this->assign('click_articles',$click_articles_rst);

            //技术子栏内容
            $tech=M("Tech");
            $techrst=$tech->select();
            $this->assign("tech",$techrst);

            //取文章资源
            $articles=M("Articles");
            $rst=$articles->order('time desc')->select();

            //分页
            $fun = "index";
            $total_articles = count($rst);
            $number_one_page = 5; //每页显示文章数
            $number_show_page = 5; //共显示几页（分页栏）
            $total_pages = ceil($total_articles/$number_one_page);
            $offset = floor($number_show_page/2);
            $start = 1;
            $end = $total_pages;
            $now_page = 1;
            if($_GET['now_page']){
                $now_page = (int)$_GET['now_page'];
            }else{
                $now_page = 1;
            }
            if($now_page > $total_pages || $now_page < 1){
                $this->error('小伙伴不要调皮');
            }
            $paging = "<form action='__URL__/{$fun}' method='get'>";
            if($now_page <= 1){
                $paging .= "<span class='word'>首页</span>";
                $paging .= "<span class='word'>上一页</span>";
            }else{
                $paging .= "<a href = '__URL__/{$fun}/now_page/1'>首页</a>";
                $paging .= "<a href = '__URL__/{$fun}/now_page/".($now_page-1)."'>上一页</a>";
            }
            if($number_show_page <= $total_pages){
                if($now_page > $offset){
                    $start = $now_page - $offset;
                    if($now_page + $offset <= $total_pages){
                        $end = $now_page + $offset;
                    }else{
                        $start = $start - ($now_page + $offset - $total_pages);
                        $end = $total_pages;
                    }
                }else{
                    $start = 1;
                    $end = $number_show_page;
                }
            }else{
                $start = 1;
                $end = $total_pages;
            }
            for($i = $start; $i <= $end; $i++){
                if($i == $now_page){
                    $paging .= "<span class = 'now_page'>".$i."</span>";
                }else{
                    $paging .= "<a href = '__URL__/{$fun}/now_page/".$i."'>".$i."</a>";
                }
            }
            if($now_page >= $total_pages){
                $paging .= "<span calss='word'>下一页</span>";
                $paging .= "<span class='word'>尾页</span>";
            }else{
                $paging .= "<a href = '__URL__/{$fun}/now_page/".($now_page+1)."'>下一页</a>";
                $paging .= "<a href = '__URL__/{$fun}/now_page/".$total_pages."'>尾页</a>";
            }
            $paging .= "<span>共".$total_pages."页，到第</span>";
            $paging .= "<input name='now_page' type='text' size=3 value='".$now_page."'></input>";
            $paging .= "<span>页</span>";
            $paging .= "<button type='submit'>确定</button>";
            $paging .= "</form>";
            $this->assign("paging",$paging);
            $this->assign("paging_display","block");

            //处理文章预览和markdown解析
            $start_article = ($now_page-1)*$number_one_page;
            if($now_page >= $total_pages){
                $end_article = $total_articles -1;
            }else{
                $end_article = $start_article + $number_one_page - 1;
            }
            for($i=$start_article;$i <= $end_article;$i++){
                $rst[$i]['content'] = explode("<input type=\"hidden\"", $rst[$i]['content'])[0]." 未完待续‥‥‥";
                $Parsedown = new Parsedown();
                $rst[$i]['content'] = $Parsedown->text($rst[$i]['content']);
                //$rst[$i]['content']=Markdown($rst[$i]['content']);
                //$rst[$i]['content']=preg_replace('/code/', 'pre', $rst[$i]['content']);
            }
            //分配文章资源
            $this->assign("articles",array_slice($rst,$start_article,$number_one_page));

            //阅读全文按钮
            $this->assign("readall","block");
            
            //about me
            $this->assign("about_me","none");

            //中部header信息
            $this->assign("header",'首页');

            //显示模版
        	$this->display();
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
                $Parsedown = new Parsedown();
                $rst[$i]['content'] = $Parsedown->text($rst[$i]['content']);
                //$rst[$i]['content']=Markdown($rst[$i]['content']);
                //$rst[$i]['content']=preg_replace('/code/', 'pre', $rst[$i]['content']);
            }
            if(!$rst){
                $this->error('文章不存在！');
            }
            $this->assign("articles",$rst);
            //文章点击次数加1
            $click_number=$rst[0]['clicknumber'];
            $data['clicknumber']=$click_number+1;
            $article->where($where)->save($data);

            //阅读全文按钮
            $this->assign("readall","none");

            //隐藏paging
            $this->assign("paging_display","none");

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

            //获取分类文章
            $type=$_GET['type'];
            $articles=M("Articles");
            $where['type']=$type;
            $rst=$articles->where($where)->order("time desc")->select();
            if($rst){
                //分页
                $fun = "do_sort/type/".$type;
                $total_articles = count($rst);
                $number_one_page = 5; //每页显示文章数
                $number_show_page = 5; //共显示几页（分页栏）
                $total_pages = ceil($total_articles/$number_one_page);
                $offset = floor($number_show_page/2);
                $start = 1;
                $end = $total_pages;
                $now_page = 1;
                if($_GET['now_page']){
                    $now_page = (int)$_GET['now_page'];
                }else{
                    $now_page = 1;
                }
                if($now_page > $total_pages || $now_page < 1){
                    $this->error('小伙伴不要调皮');
                }
                $paging = "<form action='__URL__/{$fun}' method='get'>";
                if($now_page <= 1){
                    $paging .= "<span class='word'>首页</span>";
                    $paging .= "<span class='word'>上一页</span>";
                }else{
                    $paging .= "<a href = '__URL__/{$fun}/now_page/1'>首页</a>";
                    $paging .= "<a href = '__URL__/{$fun}/now_page/".($now_page-1)."'>上一页</a>";
                }
                if($number_show_page <= $total_pages){
                    if($now_page > $offset){
                        $start = $now_page - $offset;
                        if($now_page + $offset <= $total_pages){
                            $end = $now_page + $offset;
                        }else{
                            $start = $start - ($now_page + $offset - $total_pages);
                            $end = $total_pages;
                        }
                    }else{
                        $start = 1;
                        $end = $number_show_page;
                    }
                }else{
                    $start = 1;
                    $end = $total_pages;
                }
                for($i = $start; $i <= $end; $i++){
                    if($i == $now_page){
                        $paging .= "<span class = 'now_page'>".$i."</span>";
                    }else{
                        $paging .= "<a href = '__URL__/{$fun}/now_page/".$i."'>".$i."</a>";
                    }
                }
                if($now_page >= $total_pages){
                    $paging .= "<span calss='word'>下一页</span>";
                    $paging .= "<span class='word'>尾页</span>";
                }else{
                    $paging .= "<a href = '__URL__/{$fun}/now_page/".($now_page+1)."'>下一页</a>";
                    $paging .= "<a href = '__URL__/{$fun}/now_page/".$total_pages."'>尾页</a>";
                }
                $paging .= "<span>共".$total_pages."页，到第</span>";
                $paging .= "<input name='now_page' type='text' size=3 value='".$now_page."'></input>";
                $paging .= "<span>页</span>";
                $paging .= "<button type='submit'>确定</button>";
                $paging .= "</form>";
                $this->assign("paging",$paging);
                $this->assign("paging_display","block");

                //处理预览和markdown解析
                $start_article = ($now_page-1)*$number_one_page;
                if($now_page >= $total_pages){
                    $end_article = $total_articles -1;
                }else{
                    $end_article = $start_article + $number_one_page - 1;
                }
                for($i=$start_article;$i <= $end_article;$i++){
                    $rst[$i]['content'] = explode("<input type=\"hidden\"", $rst[$i]['content'])[0]." 未完待续‥‥‥";
                    $Parsedown = new Parsedown();
                    $rst[$i]['content'] = $Parsedown->text($rst[$i]['content']);
                    //$rst[$i]['content']=Markdown($rst[$i]['content']);
                    //$rst[$i]['content']=preg_replace('/code/', 'pre', $rst[$i]['content']);
                }
                //分配文章到前台
                $this->assign("articles",array_slice($rst,$start_article,$number_one_page));
                
                //技术子栏内容
                $tech=M("Tech");
                $techrst=$tech->select();
                $this->assign("tech",$techrst);

                //阅读全文按钮
                $this->assign("readall","block");

                //中部header信息
                $this->assign("header",$type);

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
            
            //取about_me资源
            $about_me = M("About_me");
            $about_meRst = $about_me->find(0);
            $Parsedown = new Parsedown();
            $about_meRst['content'] = $Parsedown->text($about_meRst['content']);
            $this->assign("about_me_content",$about_meRst['content']);

            //显示about me内容
            $this->assign("about_me","block");

            //隐藏paging
            $this->assign("paging_display","none");

            //中部header信息
            $this->assign("header",'关于我');

            //显示模板
            $this->display("index");
        }

        /*
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
        */

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

            //取文章并分配
            $articles=M("Articles");
            $data['title']=array("like","%".$_GET['search']."%");
            $data['content']=array("like","%".$_GET['search']."%");
            $data['_logic']="or";
            $searchRst=$articles->order('time desc')->where($data)->select();

            //分页
            $fun = "search/search/".$_GET['search'];
            $total_articles = count($searchRst);
            $number_one_page = 5; //每页显示文章数
            $number_show_page = 5; //共显示几页（分页栏）
            $total_pages = ceil($total_articles/$number_one_page);
            $offset = floor($number_show_page/2);
            $start = 1;
            $end = $total_pages;
            $now_page = 1;
            if($_GET['now_page']){
                $now_page = (int)$_GET['now_page'];
            }else{
                $now_page = 1;
            }
            if($now_page > $total_pages || $now_page < 1){
                $this->error('小伙伴不要调皮');
            }
            $paging = "<form action='__URL__/{$fun}' method='get'>";
            if($now_page <= 1){
                $paging .= "<span class='word'>首页</span>";
                $paging .= "<span class='word'>上一页</span>";
            }else{
                $paging .= "<a href = '__URL__/{$fun}/now_page/1'>首页</a>";
                $paging .= "<a href = '__URL__/{$fun}/now_page/".($now_page-1)."'>上一页</a>";
            }
            if($number_show_page <= $total_pages){
                if($now_page > $offset){
                    $start = $now_page - $offset;
                    if($now_page + $offset <= $total_pages){
                        $end = $now_page + $offset;
                    }else{
                        $start = $start - ($now_page + $offset - $total_pages);
                        $end = $total_pages;
                    }
                }else{
                    $start = 1;
                    $end = $number_show_page;
                }
            }else{
                $start = 1;
                $end = $total_pages;
            }
            for($i = $start; $i <= $end; $i++){
                if($i == $now_page){
                    $paging .= "<span class = 'now_page'>".$i."</span>";
                }else{
                    $paging .= "<a href = '__URL__/{$fun}/now_page/".$i."'>".$i."</a>";
                }
            }
            if($now_page >= $total_pages){
                $paging .= "<span calss='word'>下一页</span>";
                $paging .= "<span class='word'>尾页</span>";
            }else{
                $paging .= "<a href = '__URL__/{$fun}/now_page/".($now_page+1)."'>下一页</a>";
                $paging .= "<a href = '__URL__/{$fun}/now_page/".$total_pages."'>尾页</a>";
            }
            $paging .= "<span>共".$total_pages."页，到第</span>";
            $paging .= "<input name='now_page' type='text' size=3 value='".$now_page."'></input>";
            $paging .= "<span>页</span>";
            $paging .= "<button type='submit'>确定</button>";
            $paging .= "</form>";
            $this->assign("paging",$paging);
            $this->assign("paging_display","block");

            //处理预览和markdown解析
            $start_article = ($now_page-1)*$number_one_page;
            if($now_page >= $total_pages){
                $end_article = $total_articles -1;
            }else{
                $end_article = $start_article + $number_one_page - 1;
            }
            for($i=$start_article;$i <= $end_article;$i++){
                $searchRst[$i]['content'] = explode("<input type=\"hidden\"", $searchRst[$i]['content'])[0]." 未完待续‥‥‥";
                $Parsedown = new Parsedown();
                $searchRst[$i]['content'] = $Parsedown->text($searchRst[$i]['content']);
                //$searchRst[$i]['content']=Markdown($searchRst[$i]['content']);
                //$searchRst[$i]['content']=preg_replace('/code/', 'pre', $searchRst[$i]['content']);
            }
            $this->assign("articles",array_slice($searchRst,$start_article,$number_one_page));

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

            //阅读全文按钮
            $this->assign("readall","block");
            
            //中部header信息
            $this->assign("header",$_GET['search']);

            //显示模版
            $this->display("index");
        }

}