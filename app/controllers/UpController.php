<?php

class UpController extends Controller {

    public function index()
    {
        $ups = new Upload($this->d1);
        $ses =  $this->f3->get('SESSION.roles');
        $company =  $this->f3->get('SESSION.company');
        $this->f3->set('sqldata',$ups->all($ses,$company) );
        $this->f3->set('section','upload');
        $this->f3->set('subnav','true');
        $this->f3->set('back','no');
        $this->f3->set('columns','[1,2,3]');
        $this->f3->set('page_head','List');
        $this->f3->set('view','upload/list.htm');
    }
    public function receipts()
    {
        $ups = new Upload($this->d1);
        $usr =  $this->f3->get('SESSION.user');
        $this->f3->set('ups',$ups->receipts($usr) );
	exit;    	// API Call to get data for popup
    }
    public function receiptsedit()
    {
        $ups = new Upload($this->d1);
        $id =  $this->f3->get('PARAMS.user');
        $usr =  $this->f3->get('SESSION.user');
        $this->f3->set('ups',$ups->receiptsedit($id,$usr) );
	exit;    	// API Call to get data for popup
    }

    public function create()
    {
        if($this->f3->exists('POST.upload'))
        {
            $ups = new Upload($this->d1);
            $result = $ups->upload($this->f3->get('POST'));
		if($result!='[]') {
			$this->f3->set('msg',$result);
			$this->f3->set('view','/auth/internalerror.htm');
		} else {
          		$this->f3->reroute('/upload');
		}
        }
        else
        {
            $this->f3->set('section','upload');
            $this->f3->set('page_head','New');
            $this->f3->set('view','upload/create.htm');
        }
    }

    public function delete()
    {
        if($this->f3->exists('PARAMS.id'))
        {
            $ups = new Upload($this->d1);
            $ups->delete($this->f3->get('PARAMS.id'));
        }

        $this->f3->reroute('/upload');
    }

} // main class

?>
