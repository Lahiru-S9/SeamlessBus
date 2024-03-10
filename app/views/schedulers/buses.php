<?php require APPROOT . '/views/inc/header.php'; ?>
<stylesheet>
    <link rel="stylesheet" href = "<?php echo URLROOT; ?>/css/schedulers/buses.css">
</stylesheet>


<div class="bus-requests" style="margin: 20px;">
    <h2 class="title">Bus Requests</h2>
    <table>
        <tr>
            <th style="width:50%">Bus No</th>
            <th>Requested Route</th>
            <th>Accept</th>
            <th>Remove</th>
        </tr>
        <tr>
            <td>Sample text</td>
            <td>123</td>
            <td><button><i class="fa fa-check"></i></button></td>
            <td><button><i class="fa fa-remove"></i></button></td>
            
        </tr>
        <tr>
            <td>Sample text</td>
            <td>123</td>
            <td><button><i class="fa fa-check"></i></button></td>
            <td><button><i class="fa fa-remove"></i></button></td>
        </tr>
        <tr>
            <td>Sample text</td>
            <td>123</td>
            <td><button><i class="fa fa-check"></i></button></td>
            <td><button><i class="fa fa-remove"></i></button></td>
        </tr>
        <tr>
            <td>Sample text</td>
            <td>123</td>
            <td><button><i class="fa fa-check"></i></button></td>
            <td><button><i class="fa fa-remove"></i></button></td>
        </tr>
        <tr>
            <td>Sample text</td>
            <td>123</td>
            <td><button><i class="fa fa-check"></i></button></td>
            <td><button><i class="fa fa-remove"></i></button></td>
        </tr>
    </table>
</div>

<div class="buses" style="margin: 20px;">
    <h2 class="title">Buses</h2>
    <table>
    <tr>
    <th>Bus No</th>
    <th>Assigned Route</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>Adam</td>
    <td>Johnson</td>
    <td>67</td>
  </tr>
    </table>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>