<?php
	
	// Dit is de titel die op de pagina en in de menubalk
	// zal verschijnen.
	$title = "Customers in city";

	// Voer de inhoud van "top.inc.php" uit. Deze verzorgt de
	// algemene pagina lay-out en het menu.
	require("template/top.tpl.php");

    require_once( "gb/controller/ListCustomerInCityController.php" );
    $filterController = new gb\controller\ListCustomerInCityController();
    $filterController->process();
?>

<?php
	include('configuration.php');
	$PDO = new \PDO( $config["dsn"], $config["username"], $config["password"] );
	$stmt = $PDO->prepare("SELECT DISTINCT CITY FROM CUSTOMER");
	$stmt->execute(array());
	$allCustomer = $stmt->fetchAll( \PDO::FETCH_ASSOC);
?>

<form method="post">
    

<table style="width: 100%">
    <tr>
        <td style="width: 10%"></td>
        <td style="width: 10%">City</td>
        <td style="width: 40%">
            <select style="width: 100%">
                <?php
				  
				  $index = 0;
					foreach ($allCustomer as $customer  ){
						$index++;
					?>
					<option value=<?php $customer['CITY'] ?>><?php echo $customer['CITY']; ?></option>
					
					<?php
					} ?>
            </select>
        </td>
        <td style="width: 10%"><input type="submit" value="List customers in the city" name="list_customer"></td>
        <td style="width: 30%"></td>
    </tr>
</table>    

	<table>
            <tr>
                <td>Ssn</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Address</td>
                <td>City</td>
            </tr>
<?php
    require_once( "gb/mapper/CustomerMapper.php" );    
    $custMapper = new gb\mapper\CustomerMapper();//
 ?>
      
	

</table>
    
</form>    
<?php
	require("template/bottom.tpl.php");
?>