<?php
// echo "123";
    date_default_timezone_set("Asia/Dhaka");
	$servername="127.0.0.1";
	$db_username="thevoice_newsportal";
	$db_password="thevoice_newsportal";
	$db_name="thevoice_newsportal";



    $current_date_time = date("Y-m-d H:i:s");
    $end_date = date('Y-m-d H:i:s', strtotime($current_date_time. ' - 7 days'));
//  echo $current_date_time, $end_date;
    $conn = mysqli_connect($servername,$db_username,$db_password,$db_name);

    if(!$conn)
    {
        die("Connection Failed: " . mysqli_connect_error());

    }

	$query = "SELECT id,bonus_status,bonus_amount FROM `users` WHERE `type` NOT IN ('general_user')";

    $result = mysqli_query($conn , $query);
    // print_r($result);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
            // echo $row['bonus_amount'] ;
            $total_post_count_query = "SELECT * FROM `posts` WHERE `stage` = 'approved' AND `user_id`='".$row['id']."' AND `updated_at` BETWEEN '$end_date' AND '$current_date_time'";
            // echo $total_post_count_query;
            $total_post_count_user = mysqli_query($conn , $total_post_count_query);
            // print_r($total_post_count_query);
            if(mysqli_num_rows($total_post_count_user) > 1){
                if($row['bonus_status'] == 1){
                    $bonus_user_query = "INSERT INTO `bonuses`(`id`, `user_id`, `bonus`, `created_at`, `updated_at`) VALUES ('','$row[id]','$row[bonus_amount]','$current_date_time','$current_date_time')";
                    $bonus_user = mysqli_query($conn , $bonus_user_query);
                    $Total_balance_without_bonus_wallet_user = "SELECT `Total_balance_without_bonus`,`Total_balance_bonus` FROM `wallets` WHERE `user_id`='$row[id]'";

                    $total_balance_without_bonus_wallet_user_get = getAssocArray($Total_balance_without_bonus_wallet_user);

                    $Total_balance_without_bonus_update = $total_balance_without_bonus_wallet_user_get[0]['Total_balance_bonus'];
                    $Total_balance_bonus = $Total_balance_without_bonus_update + $row['bonus_amount'];

                    $wallet_update_query = "UPDATE `wallets` SET`Total_balance_without_bonus`='$Total_balance_without_bonus_update',`Total_balance_bonus`='$Total_balance_bonus',`bonus`='$row[bonus_amount]',`updated_at`='$current_date_time' WHERE `user_id`='$row[id]'";
                    execute($wallet_update_query);
                }
                else{
                    $bonus_user_query = "INSERT INTO `bonuses`(`id`, `user_id`, `bonus`, `created_at`, `updated_at`) VALUES ('','$row[id]','0','$current_date_time','$current_date_time')";
                    $bonus_user = mysqli_query($conn , $bonus_user_query);
                    $Total_balance_without_bonus_wallet_user = "SELECT `Total_balance_without_bonus`,`Total_balance_bonus` FROM `wallets` WHERE `user_id`='$row[id]'";

                    $total_balance_without_bonus_wallet_user_get = getAssocArray($Total_balance_without_bonus_wallet_user);

                    $Total_balance_without_bonus_update = $total_balance_without_bonus_wallet_user_get[0]['Total_balance_bonus'];
                    $Total_balance_bonus = $Total_balance_without_bonus_update;

                    $wallet_update_query = "UPDATE `wallets` SET `Total_balance_without_bonus`='$Total_balance_without_bonus_update',`Total_balance_bonus`='$Total_balance_bonus',`bonus`='0',`updated_at`='$current_date_time' WHERE `user_id`='$row[id]'";
                    execute($wallet_update_query);
                }

            }
            else{
                $bonus_user_query = "INSERT INTO `bonuses`(`id`, `user_id`, `bonus`, `created_at`, `updated_at`) VALUES ('','$row[id]','0','$current_date_time','$current_date_time')";
                $bonus_user = mysqli_query($conn , $bonus_user_query);

                $Total_balance_without_bonus_wallet_user = "SELECT `Total_balance_without_bonus` , `Total_balance_bonus` FROM `wallets` WHERE `user_id`='$row[id]'";
                $total_balance_without_bonus_wallet_user_get = getAssocArray($Total_balance_without_bonus_wallet_user);

                $Total_balance_without_bonus_update = $total_balance_without_bonus_wallet_user_get[0]['Total_balance_bonus'];
                $Total_balance_bonus = $Total_balance_without_bonus_update;

                $wallet_update_query = "UPDATE `wallets` SET `Total_balance_without_bonus`='$Total_balance_without_bonus_update', `Total_balance_bonus`='$Total_balance_bonus',`bonus`='0',`updated_at`='$current_date_time' WHERE `user_id`='$row[id]'";
                execute($wallet_update_query);
            }
            // print_r(mysqli_num_rows($results));
        }
    }
    // print_r($data[0]['id']);

	function execute($query) //this one is for insert, update, delete
	{
		global $servername,$db_username,$db_password,$db_name;
		$conn = mysqli_connect($servername,$db_username,$db_password,$db_name);
		mysqli_query($conn,$query);
	}
	function getResult($query) //thisone is for select query
	{
		global $servername,$db_username,$db_password,$db_name;
		$conn = mysqli_connect($servername,$db_username,$db_password,$db_name);
		$result = mysqli_query($conn,$query);
		return $result;
	}
	function getAssocArray($query){
		global $servername,$db_username,$db_password,$db_name;
		$conn = mysqli_connect($servername,$db_username,$db_password,$db_name);
		$data = array();
		$result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
		}
		return $data;
	}
?>
