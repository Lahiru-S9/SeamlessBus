<?php require APPROOT . '/views/inc/header.php'; ?>
<table style="margin-top: 80px;">
    <tr>
        <th>Route Number</th>
        <th>From</th>
        <th>To</th>
        <th>Ticket Price</th>
        <th>Bus Count</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['routes'] as $route): ?>
        <tr>
            <td><?php echo $route->route_num; ?></td>
            <td><?php echo $route->tostation; ?></td>
            <td><?php echo $route->fromstation; ?></td>
            <td><?php echo $route->ticket_price; ?></td>
            <td><?php echo $route->bus_count; ?></td>
            <td><a href="<?php echo URLROOT; ?>/schedulers/editRoute/<?php echo $route->route_num; ?>">Edit</a></td>
            <td><a href="<?php echo URLROOT; ?>/schedulers/deleteRoute/<?php echo $route->route_num; ?>">Delete</a></td>
        </tr>
        </tr>
    <?php endforeach; ?>
    <!-- Add your PHP code here to fetch and display the route data -->
</table>

<form action="<?php echo URLROOT; ?>/schedulers/addRoute" method="post">
    <h2>Add a New Route</h2>
    <label for="routeNumber">Route Number:</label><br>
    <input type="text" id="routeNumber" name="routeNumber" placeholder="<?php echo $data['routeNumber_err'];?>"><br>
    <label for="Between">Between:</label><br>
    <div><?php echo $data['station'][0]->station; ?></div>
    <input type="hidden" id="from" name="from" value="<?php echo $data['station'][0]->id; ?>"><br>
    <label for="And">And:</label><br>
    <select id="to" name="to" placeholder="<?php echo $data['to_err'];?>">
        <?php foreach($data['stations'] as $station): ?>
            <?php if($station->station == $data['station'][0]->station) continue; ?>
            <option value="<?php echo $station->id; ?>"><?php echo $station->station; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="ticketPrice">Ticket Price:</label><br>
    <input type="Number" id="ticketPrice" name="ticketPrice" placeholder="<?php echo $data['ticketPrice_err'];?>"><br>
    <input type="submit" value="Submit">
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>