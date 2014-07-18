<table align="center" width="450">
	<tr>
    	<td colspan="6"><strong><a href="<?php echo base_url()."$module/user/add"; ?>"><font color="#99CC33">Add A User</font></a></strong></td>
    </tr>
	<tr>
    	<td class="title">STT</td>
        <td class="title">Username</td>
        <td class="title">Email</td>
        <td class="title">Level</td>
        <td class="title">Edit</td>
        <td class="title">Del</td>
    </tr>
    <?php 
    	$stt=0;
    	foreach ($info as $item) {
    		$stt++;
    		echo '<tr>';
    		echo "<td>$stt</td>";
    		echo "<td>$item[username]</td>";
    		echo "<td>$item[email]</td>";
    		if ($item['level'] == 1) {
    			echo "<td>Member</td>";
    		} else {
    			echo "<td><font color='red'>Admin</font></td>";
    		}
    		echo "<td><a href='".base_url()."$module/user/edit/$item[id]'>Edit</a></td>";
    		echo "<td><a href='".base_url()."$module/user/del/$item[id]'>Del</a></td>";
    		echo '</tr>';
    	}
    ?>
    
</table>
<br>
<?php 
	echo $page_link;
?>