<?php
$this->assign('title', 'Covid Masters | Config');
?>


<div class="card" style="width: 200px; margin: auto; margin-top: 200px">
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label for="timer">Set Battle Timer</label>
                <input class="form-control" min="0" id="timer" name="timer" type="number" value="<?php echo $timer ?>" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>