
<?php 
$this->assign('title', 'Covid Masters | Battle');
echo $this->Html->css('battle'); 

?>

<div class="arena">
    <div class="row">
        <div class="col-lg-5 player">
            <div class="healthbar">100%</div>
            <div class="player-actions">
                <button class='btn btn-primary'>Attack</button>
                <button class='btn btn-primary'>Power</button>
                <button class='btn btn-primary'>Potion</button>
                <button class='btn btn-primary'>Give up</button>
            </div>
        </div>
        <div class="col-lg-2" class="event" style="border: 1px solid black">
            
        </div>
        <div class="col-lg-5 enemy">
            <div class="healthbar">100%</div>
        </div>
    </div>

</div>