<?php
session_start();
get_header();
?>
<div id="content">
    <h4>Danh sach thanh vien</h4>
    <table>
    <thead>
        <tr>
            <td>STT</td>
            <td>Fullname</td>
            <td>Age</td>
            <td>Email</td>
            <td>Earn</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($list_users)) {
            $temp = 0;
            foreach ($list_users as $user) {
                $temp++;
        ?>
                <tr>
                    <td><?php echo $temp; ?></td>
                    <td><?php echo $user['fullname']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo currency_format($user['earn'], '$'); ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
</div>

<?php
get_footer();
?>