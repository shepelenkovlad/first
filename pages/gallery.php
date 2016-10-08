<form class="navbar-form " action="index.php?id=2" method="post">
                            <div class="form-group">
                              <input type="text" placeholder="from" class="form-control" name="from">
                            </div>
                            <div class="form-group">
                              <input type="text" placeholder="to" class="form-control" name="to">
                            </div>
                            <button type="submit" class="btn btn-success" name="set">Set</button>
                            
</form>  
<?php

    if (isset($_POST['set']))
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        
        if ($to == 0)
            $to = 16777216;
            
        if ($from ==0)
            $from = 1;
            
        $req = 'select * from pictures where size between '.$from.' and '.$to;
        
        $pdo = Tools::Connect('localhost','root','123456','examsh');
		$res = $pdo->prepare($req);
		$res->execute();
       
     }
     else
     {
         $pdo = Tools::Connect('localhost','root','123456','examsh');
		$res = $pdo->prepare('select * from pictures');
		$res->execute();
        
    }
    
        $id = array();
		$img = array();
        $filename = array();
        $username = array();
        $size = array();
        $requested = array();
        $date = array();
		
		foreach ($res as $r) 
		{
            $id[] = $r['id'];
			$img[] = $r['picture'];
            $filename[] = $r['picturename'];
            $username[] = $r['username'];
            $size[] = $r['size'];
            $requested[] = $r['requested'];
            $date[] = $r['dt'];
		}
		
		
        
        $n = 0;
        
        foreach ($img as $i)
        {
    		$i = base64_encode($i);
            echo '<div class="item">';
        		echo '<img width="292" height="auto" src="data:image/jpeg; base64, '.$i.'"><br/>';
                echo 'Filename: '.$filename[$n].'<br/>';
                echo 'Uploader name: '.$username[$n].'<br/>';
                echo 'Upload date: '.$date[$n].'<br/>';
                echo 'Size: '.$size[$n].'<br/>';
                echo 'Views: '.$requested[$n].'<br/>';
            echo '</div>';
            $n++;
        }
        
        foreach ($id as $k)
        {
            $upd = 'update pictures set requested = requested + 1 where id = '.$k;
            $pdo->query($upd);
        }

?>