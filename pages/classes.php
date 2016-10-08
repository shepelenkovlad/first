<?php

        class Tools
    	{
    		static function Connect($host,$user,$pass,$dbname)
    		{
    			$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8;';
    
    			$options = array (
    				PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    				PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    				PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8');
    
    			$pdo = new PDO($dsn,$user,$pass,$options);
    
    			return $pdo;
    		}
    
    		static function CreateTable($query)
    		{
    			$pdo = Tools::Connect('localhost','root','123456','examsh');

 /**
 * $query = 'create table users(
 * 				id int not null auto_increment primary key,
 * 				username varchar (16) not null,
 *                 password varchar (16) not null 
 * 				) default charset = "utf8"';
 */
 
        $query = 'create table pictures(
                    id int not null auto_increment primary key,
                    userid int,
                    foreign key (userid) references users (id),
                    picturename varchar (128) not null,
                    dt datetime,
                    requested int,
                    size int,
                    picture mediumblob
                    ) default charset = "utf8"';

    
    			$pdo->query($query);
    		}
            
            static function check($l, $p)
            {
                $pdo = Tools::Connect('localhost','root','123456','examsh');
                $sel = 'select * from users where username = "'.$l.'" and password = "'.$p.'"';
                $res = $pdo->query($sel);
                if (!empty($res))
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            } 
    	}

?>