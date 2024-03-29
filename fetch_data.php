<?php
include ('database_connection.php');

if (isset($_POST["action"])) {
	$action = $_POST["action"];

	if ($action == 'fetch_data') {
		$minimum_price = isset($_POST["minimum_price"]) ? $_POST["minimum_price"] : null;
		$maximum_price = isset($_POST["maximum_price"]) ? $_POST["maximum_price"] : null;
		$brand = isset($_POST["brand"]) ? $_POST["brand"] : array();
		$ram = isset($_POST["ram"]) ? $_POST["ram"] : array();
		$storage = isset($_POST["storage"]) ? $_POST["storage"] : array();
		$final_query = "";
		$query = "SHOW TABLES";
		$result = mysqli_query($connect, $query);
		if ($result) {
			$tables = array();
			while ($row = mysqli_fetch_row($result)) {
				if ($row[0] !== 'country') {
					$tables[] = $row[0];
				}
			}
			foreach ($tables as $table) {
				$table_query = "SELECT id, Title, status, size, tlimit, photo FROM $table WHERE 1=1";
				if (!empty($minimum_price) && !empty($maximum_price)) {
					$table_query .= " AND tlimit BETWEEN $minimum_price AND $maximum_price";
				}
				if (!empty($brand)) {
					$brand_filter = implode("','", $brand);
					$table_query .= " AND status IN('" . implode("','", $brand) . "')";
				}
				if (!empty($ram)) {
					$ram_filter = implode("','", $ram);
					$table_query .= " AND size IN('" . implode("','", $ram) . "')";
				}
				if (!empty($storage)) {
					$storage_filter = implode("','", $storage);
					$table_query .= " AND vlink IN('" . implode("','", $storage) . "')";
				}
				$final_query .= "($table_query) UNION ";
			}
			$final_query = rtrim($final_query, " UNION ");
			$statement = $connect->prepare($final_query);
			$statement->execute();
			$result = $statement->get_result();
			$output = '';
			if ($result->num_rows > 0) {
				$data = $result->fetch_all(MYSQLI_ASSOC);
				foreach ($data as $row) {
					$output .= '
                    <div class="col-sm-4 col-lg-3 col-md-3">
                        <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                            <img src="' . $row['photo'] . '" alt="" class="img-responsive" >
                            <p align="center"><strong><a href="#">' . $row['Title'] . '</a></strong></p>
                            <h4 style="text-align:center;" class="text-danger" >' . $row['tlimit'] . 'min <br /></h4>
                            Status : ' . $row['status'] . ' <br />
                            No. of Players: ' . $row['size'] . ' <br />
                        </div>
                    </div>
                    ';
				}
			} else {
				$output = '<h3>No Data Found</h3>';
			}
			echo $output;
		} else {
			echo "Error fetching tables.";
		}
	} else {

	}
} else {
	echo "Error: Action parameter is not set.";
}
?>