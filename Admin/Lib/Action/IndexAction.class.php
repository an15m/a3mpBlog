<?php

class IndexAction extends PublicAction {
    public function index(){
    	$this->display();
    }

    //menu
    public function menu(){
    	$other=M("Other");
    	$otherRst=$other->find(0);
    	$this->assign("total_visit",$otherRst['total_visit']);
    	$this->display();
    }

    //middle nothing
    public function middle(){
    	$this->display();
    }

    //manage articles
    public function manage_articles(){
        //获取文章资源
        if($_GET['search']){
            $articles=M("Articles");
            $data['title']=array("like","%".$_GET['search']."%");
            $data['content']=array("like","%".$_GET['search']."%");
            $data['_logic']="or";
            $rst=$articles->order('time desc')->where($data)->select();
            $fun = "manage_articles/search/".$_GET['search'];
        }else if($_GET['type']){
            $articles=M("Articles");
            $data['type'] = $_GET['type'];
            $rst=$articles->order('time desc')->where($data)->select();
            $fun = "manage_articles/type/".$_GET['type'];
        }else{
            $articles = M("Articles");
            $rst = $articles->order('time desc')->field(array('id','title','type'))->select();
            $fun = "manage_articles";
        }
        
        //分页
        $num_one_page = 10;
        $total_articles = count($rst);
        $total_pages = ceil($total_articles/$num_one_page);
        if($total_pages <= 0){
            $this->error('文章不存在');
        }
        $now_page = 1;
        if($_GET['now_page']){
            $now_page = (int)$_GET['now_page'];
        }else{
            $now_page = 1;
        }
        if($now_page > $total_pages || $now_page < 1){
            $this->error('小伙伴不要调皮');
        }

        //分配资源
        $this->assign("articles",array_slice($rst,($now_page-1)*$num_one_page,$num_one_page));
        $this->assign("total_pages",$total_pages);
        $this->assign("now_page",$now_page);
        $this->assign("fun",$fun);
        $tech=M("Tech");
        $techRst=$tech->select();
        $this->assign("tech",$techRst);
        $this->display();

    }
    public function new_article(){
    	$tech=M("Tech");
    	$techRst=$tech->select();
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $this->assign("year",$year);
        $this->assign("month",$month);
        $this->assign("day",$day);  
    	$this->assign("tech",$techRst);
    	// var_dump($techRst);
    	$this->display();
    }

    public function do_new_article(){
    	$articles=M("Articles");
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
    	$data['time']=strtotime($year.$month.$day);
    	$data['type']=$_POST['type'];
    	$data['content']=$_POST['content'];
    	$data['title']=$_POST['title'];
    	$articles->create($data);
    	$lastId=$articles->add();
    	if($lastId){
    		$this->success('发表成功!');
    	}else{
    		$this->error('失败');
    	}
    }

    public function delete_article(){
        $articleId=$_GET['id'];
        $articles=M("Articles");
        $lastId=$articles->delete($articleId);
        if($lastId){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    public function change_article(){
        $articleId=$_GET['id'];
        $articles=M("Articles");
        $article=$articles->find($articleId);
        $year = date("Y",$article['time']);
        $month = date("m",$article['time']);
        $day = date("d",$article['time']);
        $this->assign("year",$year);
        $this->assign("month",$month);
        $this->assign("day",$day);  
        $this->assign("article",$article);
        $this->assign("id",$articleId);
        $this->display();
    }

    public function do_change_article(){
        $articleId=$_GET['id'];
        $articles=M("Articles");
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $data['time']=strtotime($year.$month.$day);
        $data['content']=$_POST['content'];
        $data['title']=$_POST['title'];
        $where['id']=$articleId;
        $lastId=$articles->where($where)->save($data);
        if($lastId){
            $this->success('修改成功',U("Index/manage_articles"));
        }else{
            $this->error('修改失败');
        }
    }

    public function change_other(){
    	$other=M("Other");
    	$otherRst=$other->find(0);
    	$this->assign("other",$otherRst);
    	$this->display();
    }

    public function do_change_other(){
    	$other=M("Other");
    	$data['motto']=$_POST['motto'];
    	$data['now_learn']=$_POST['now_learn'];
    	$lastId=$other->where('id = 0')->save($data);
    	if($lastId){
    		$this->success('成功!');
    	}else{
    		$this->error('失败');
    	}
    }

    public function link(){
    	$link=M("Link");
    	$linkRst=$link->select();
    	$this->assign("link",$linkRst);
    	$this->display();
    }

    public function delete_link(){
    	$linkId=$_GET['id'];
    	$link=M("Link");
    	$lastId=$link->delete($linkId);
    	if($lastId){
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}
    }

    public function new_link(){
    	$this->display();
    }

    public function do_new_link(){
    	$link=M("Link");
    	$data['url']=$_POST['url'];
    	$data['title']=$_POST['title'];
    	$link->create($data);
    	$lastId=$link->add();
    	if($lastId){
    		$this->success('添加成功',U("Index/link"));
    	}else{
    		$this->error('添加失败');
    	}
    }

    public function change_link(){
    	$linkId=$_GET['id'];
    	$link=M("Link");
    	$linkRst=$link->find($linkId);
    	$this->assign("link",$linkRst);
    	$this->display();
    }

    public function do_change_link(){
    	$linkId=$_GET['id'];
    	$link=M("Link");
    	$data['url']=$_POST['url'];
    	$data['title']=$_POST['title'];
    	$where['id']=$linkId;
    	$lastId=$link->where($where)->save($data);
    	if($lastId){
    		$this->success('修改成功',U("Index/link"));
    	}else{
    		$this->error('修改失败');
    	}
    }

    public function tech(){
        $tech=M("Tech");
        $techRst=$tech->select();
        $this->assign("tech",$techRst);
        $this->display();	
    }

    public function delete_techname(){
        $techID=$_GET['id'];
        $tech=M("Tech");
        $lastId=$tech->delete($techID);
        if($lastId){
            $this->success('删除成功',U("Index/tech"));
        }else{
            $this->error('删除失败');
        }
    }

    public function new_techname(){
        $this->display();
    }

    public function do_new_techname(){
        $tech=M("Tech");
        $data['techname']=$_POST['techname'];
        $tech->create($data);
        $lastId=$tech->add();
        if($lastId){
            $this->success('新增成功',U("Index/tech"));
        }else{
            $this->error('新增失败');
        }
    }

    public function about_me(){
        $about_me=M("About_me");
        $about_meRst=$about_me->find(0);
        $this->assign("about_me",$about_meRst);
        $this->display();
    }

    public function do_about_me(){
        $about_me=M("About_me");
        $data['content']=$_POST['content'];
        $lastId=$about_me->where('id = 0')->save($data);
        if($lastId){
            $this->success('修改成功',U("Index/about_me"));
        }else{
            $this->error('修改失败');
        }
    }
}