<div class="table-responsive" id="dvData">

        <table  class="table table-condensed">
           <thead>
           <tr>
               <th scope="col">Order Date</th>
               <th scope="col">Purchase Order</th>
	       <th scope="col">PO Status</th>
               <th scope="col">Price</th>
               <th scope="col">Position</th>
               <th scope="col">Item</th>
               <th scope="col">Item Desc</th>
               <th scope="col">Ordered Quantity</th>
               <th scope="col">Rec Qty</th>
               <th scope="col">Rec Date</th>
           </tr>
           </thead>
       
           <tbody>
           <?php foreach (($po?:[]) as $rows): ?>
               <tr>
                   <td><?= substr($rows['OrderDate'],0,10) ?></td>
                   <td><?= trim($rows['PurchaseOrder']) ?></td>
                   <td><?= trim($rows['POStatus']) ?></td>
                   <td><?= trim($rows['Price']) ?></td>
                   <td><?= trim($rows['Position']) ?></td>
                   <td><?= trim($rows['Item']) ?></td>
                   <td><?= trim($rows['ItemDesc']) ?></td>
                   <td><?= trim($rows['OrderedQuantity']) ?></td>
                   <td><?= trim($rows['RecQty']) ?></td>
                   <td><?= trim($rows['RecDate']) ?></td>
       
               </tr>
           <?php endforeach; ?>
           </tbody>
       
        </table>
       </div>
<script>

$(document).ready(function(){
  $("#btnExport").click(function(e) {
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()) );
    e.preventDefault();
  })
});

</script>