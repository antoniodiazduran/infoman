<?php

class Controller {

    protected $f3;
    protected $db;
    protected $d1;

    function beforeroute() {
      if ($this->f3->get('SECURE')) {
        if($this->f3->get('SESSION.user') === null ) {
          $this->f3->reroute('/login');
          exit;
        }
        if ( $this->f3->get('SESSION.timeout') < time() ) {
           $this->f3->set('SESSION.user', null);
           $this->f3->set('SESSION.bp_id', null);
           $this->f3->reroute('/login');
	         exit;
        }
          // Refresh timer on every click
          date_default_timezone_set('America/New_York');
          $this->f3->set('SESSION.timeout', time()+$this->f3->get('expire'));
          $this->f3->set('SESSION.timeoutdate',date('Y.m.d h:i:s',time()+$this->f3->get('expire')) );
      }
    }

    function afterroute() {
      if ($this->f3->get('SECURE')) {
        if($this->f3->get('SESSION.user') != null ) {
          if ( $this->f3->get('SESSION.ip') === $this->f3->ip() ) {
             echo Template::instance()->render('layout.htm');
          } else {
	     echo "Session Terminated..".$this->f3->get('SESSION.ip');
	  }
        }
      } else {
        echo Template::instance()->render('layout.htm');
      }
    }

    public function sendMail($to,$msg) {
      // In case any of our lines are larger than 70 characters, we should use wordwrap()
      $msg = wordwrap($msg, 70, "<br/>");
      // Send - to, subject, message
      $bool = mail($to,'Infoman communications', $msg);
      echo $to.$msg.$bool;
      exit;

    }

    function __construct() {

        $f3=Base::instance();

        $db=new DB\SQL(
            $f3->get('db_dns') . $f3->get('db_name'),
            $f3->get('db_user'),
            $f3->get('db_pass')
        );
        $d1=new DB\SQL(
            $f3->get('d1_dns') . $f3->get('d1_name'),
            $f3->get('d1_user'),
            $f3->get('d1_pass')
        );

	$this->f3=$f3;
	$this->db=$db;
	$this->d1=$d1;
    }
}

?>
