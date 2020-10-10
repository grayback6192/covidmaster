<?php

$this->assign('title', 'Covid Masters | Dashboard');

?>

<div class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <th colspan="5" style="text-align: center"><h3>Game Logs<h3></th>
        </tr>
        <tr>
            <th style="width: 100px"></th>
            <th>Avatar</th>
            <th>Enemy</th>
            <th>Status</th>
            <th style="width: 200px">Date</th>


        </tr>
        <?php foreach ($histories as $key => $history) : ?>
            <tr>
                <td class='view-logs' data-id="<?php echo $history['game_history']['action_logs_ID'] ?>"><a href="javascript:void(0)">View Log</a></td>
                <td><?php echo $history['account']['avatar']?></td>
                <td><?php echo $history['game_history']['enemy_name']?></td>
                <td><?php echo $history['game_history']['status']?></td>
                <td><?php echo $history['game_history']['created']?></td>
            </tr>
        <?php endforeach ?>

    </table>
</div>

<div class="modal" id="log-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Game Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow-y: auto; text-align: center"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('.view-logs').on('click', function() {
        $('#log-modal').modal('toggle');
        $.ajax({
            url: '/dashboard/index',
            data: {logid: $(this).data('id') },
            dataType: 'JSON',
            beforeSend: function() {
                $('#log-modal .modal-body').empty().append('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
            },
            success: function(data) {
                debugger;
                $('#log-modal .modal-body').empty().append(data);
            
            }
        });
    });

</script>