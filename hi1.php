<?php



	/**
	 *connect to databse
	 **/
function db_connect()
{
$connection=mysql_connect("localhost", "oriobird", "Jesuis14$!");

if(!$connection)
{
	return false;
	}
	if(!mysql_select_db('oriobird_hi'))
	{
		return false;
	}
	
	return $connection;
}
	

	function create_post($params)
	{
		$connection = db_connect();
		$query = sprintf('	INSERT into posts set 
				title ="%s", 
				body = "%s",
				created_at = NOW(),
				user_id = "%s"
				', mysql_real_escape_string($params['title']),
					mysql_real_escape_string($params['body']),
					mysql_real_escape_string($params['user_id']));
				
				
		$result =mysql_query($query);
		
		if(!result)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
		
	function get_line()
	{
		exec("python ../cgi-bin/ex1.py", $output);
		var_dump($output);

}
	
	function update_post($params)
	{
		$connection = db_connect();
		$query = sprintf('	update posts set 
				title ="%s", 
				body = "%s",
				user_id = "%s"
				
				where id = "%s"
				', mysql_real_escape_string($params['title']),
					mysql_real_escape_string($params['body']),
					mysql_real_escape_string($params['user_id']),
					mysql_real_escape_string($params['id'])
					);
				
				
		$result =mysql_query($query);
		
		if(!result)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function delete_post($id)
	{
		$connection = db_connect();
		$query = sprintf('	delete from posts where id = %s
				',
					mysql_real_escape_string($id)
					);
				
				
		$result =mysql_query($query);
		
		if(!result)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	
	function find_posts()
	{
		$connection = db_connect();
		$query = 'select posts.title, posts.body, posts.user_id, users.username
				from posts, users
				where posts.user_id = users.id';
		$result = mysql_query($query);
		
		$number_of_posts = mysql_num_rows($result);
		
		if($number_of_posts == 0)
		{
			return false;
		}
		
		$result = result_to_array($result);
		
		return $result;
	}
	
	function result_to_array($result)
	{
		$result_array = array();
		for($i = 0; $row = mysql_fetch_array($result);$i++)
		{
			$result_array[$i] = $row;
		}
		
		return $result_array;
	}
	
/*	$posts = find_posts();
	print_r($posts);
	foreach($posts as $post)
	{
		echo '<h2>'.$post['title'].'</h2>';
		echo $post['body'].'<br/>';
		echo $post['username'];
	}
*/	
	//delete_post(3);
	//create_post(array('title'=> 'this is the title', 'body'=>'This is the body', 'user_id' => 1));
	//update_post(array('title'=> 'this is the title', 'body'=>'This is the body', 'user_id' => 1, 'id' => 2));
	get_line();

	/*while()
	{
		
	}
	*/
	
?>