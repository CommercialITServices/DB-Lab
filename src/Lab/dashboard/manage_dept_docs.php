<?php
session_start();
include '../db_Admin.php';
if(isset($_GET['id']) && !empty($_GET['id']) ){
	$qry = $conn->query("SELECT * FROM employees where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $val){
		$meta[$k] =  $val;
	}
	$save = "Changes";
    $dummyId = $_GET['id'];
}
        
?>
<form role="form" id="manage_con_reg">
    <div class="box-body">
        <div class="form-group">
            <label for="CompanyName">Depart:</label>
			<input type="hidden" class="form-control" id="id" name="id" value='<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>'>
			<input type="text" class="form-control" id="name" name="name" required placeholder="Enter the employee Name" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
                
        </div>
        <div class="form-group">
            <label for="Address">Description:</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="<?php echo isset($meta['address']) ? $meta['address'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Phone number:</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="phone" class="form-control"
                    data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" value="<?php echo isset($meta['phone']) ? $meta['phone'] : '' ?>" required>
            </div>
            <!-- /.input group -->
            </br>

                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label for="Email">Email address:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="position">Employee Position:</label>
                <input type="text" class="form-control" name="position" id="position" placeholder="Enter position" value="<?php echo isset($meta['position']) ? $meta['position'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="Skills">Employee Skills:</label>
                <input type="text" class="form-control" name="Skills" id="Skills" placeholder="Enter Skills" value="<?php echo isset($meta['Skills']) ? $meta['Skills'] : '' ?>" required>
            </div>
        </div>
        <div class="SubmitBtn">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline">Save <?php echo isset($save) ? $save : ''?> </button>
        </div>

        <!-- /.box-body -->
</form>


<script>
//========================send to database================================

$('#manage_con_reg').submit(function(e) {
    e.preventDefault();
    start_load()
    $.ajax({
        url: 'ContravelRegistration/save_con_employee.php',
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        error: err => {
            console.log(err)
            end_load()
            alert_toast('An error occured', 'danger');
        },
        success: function(resp) {
            if (resp == 1) {
                end_load()
                $('.modal').modal('hide')
                toast('Data successfully saved', 'modal-success');
                load_ConEmpList();
            } else {
                console.log(resp);
                end_load()
                $('.modal').modal('hide')
                toast('Data not saved', 'modal-danger');

            }
        }
    })
})
</script>
