<br>
<div class="col-md-6 col-sm-6">
	<table class="table table-striped">
  
		<tr>
			<th colspan="2"><span style="font-size:20px">Customer Info</span></th>
		</tr>
  		<tr>
  			<th>Name:</th>
  			<td><?php echo $order_cus[0]['cus_name']; ?></td>
  		</tr>
  		<tr>
  			<th>Phone:</th>
  			<td><?php echo $order_cus[0]['cus_phone']; ?></td>
  		</tr>
  		<tr>
  			<th>Email:</th>
  			<td><?php echo $order_cus[0]['cus_email']; ?></td>
  		</tr>
  		<tr>
  			<th>Address:</th>
  			
  			<td><?php echo wordwrap(trim($order_cus[0]['cus_address']),25,"<br>\n",TRUE); ?></td>
  		</tr>
	</table>
	<div class="vertical-line"></div>
</div>


<div class="col-md-6 col-sm-6">
	<?php 
			$attr = array('role' => 'form', 'class'=>'form-horizontal','id'=>'orderDetails_form');
			echo form_open('admin/orders/update', $attr); 
	?>
	  <div class="form-group">
	    <label for="order_status" class="col-sm-2 control-label">Status</label>
	    <div class="col-sm-10">
	      	<select name="order_status" class="form-control">
			  <option <?php if($order_cus[0]['status']==0) echo "selected "; echo 'value="0"' ?> >New</option>
			  <option <?php if($order_cus[0]['status']==1) echo "selected "; echo 'value="1"' ?> >Processing</option>
			  <option <?php if($order_cus[0]['status']==2) echo "selected "; echo 'value="2"' ?> >Delivered</option>
			  <option <?php if($order_cus[0]['status']==3) echo "selected "; echo 'value="3"' ?> >Cancel</option>
			 
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="order_paid" class="col-sm-2 control-label">Payment</label>
	    <div class="col-sm-10">
	      <input type="number"  class="form-control" name="order_paid" id="order_paid" />
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <input type="hidden" name="o_id" <?php echo 'value="'.$order_cus[0]['order_id'].'"'; ?> />
	      <button type="submit"  class="btn btn-primary">Save Changes</button>
	    </div>
	  </div>
	</form>
</div>

<div class="col-md-12 col-sm-12 padbot20">

	<table class="table table-bordered ">
		<thead>
			<tr>
				<th colspan="8"><span style="font-size:20px">Item List</span></th>
			</tr>
			<tr>
				<th>#</th>
				<th>Item Code</th>
				<th>Name</th>
				<th>Size</th>
				<th>Color</th>
				<th>Unit price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$count=1;
			foreach ($order_products as  $product) {
			
			?>
			
			<tr>
				<td><?php echo $count;?> </td>
				<td><?php echo 'PI-'.sprintf("%011d",$product['p_id']); ?></td>
				<td><?php echo $product['p_name']; ?></td>
				<td><?php echo $product['op_size'] ?></td>
				<td><?php echo $product['op_color'] ?></td>
				<td><?php echo $product['price'] ?></td>
				<td><?php echo $product['quantity'] ?></td>
				<td><?php echo $product['op_price'] ?></td>
			</tr>
		<?php

			$count++;
			}
		?>
			<tr>
				<th colspan="7" style="text-align:right; padding-right:35px;">Total</th>
				<th><?php echo $order_cus[0]['order_price']; ?></th>
			</tr>
			<tr>
				<th colspan="7" style="text-align:right; padding-right:35px;">Paid</th>
				<th><?php echo $order_cus[0]['order_paid']; ?></th>
			</tr>
			<tr>
				<th colspan="7" style="text-align:right;padding-right:35px;">Due</th>
				<th style="color:red;"><?php echo $order_cus[0]['order_due']; ?></th>
			</tr>
		</tbody>
	</table>

</div>