
<?php 
$this->assign('title', 'Covid Masters | Battle');
echo $this->Html->css('battle'); 

?>
<div class="arena">
    <div class="row">
        <div class="col-lg-5" id="player"></div>
        <div class="col-lg-2 event" style="border: 1px solid black">
            <!-- <p class="timer"><strong>60</strong></p>  TODO FUNCTIONALITY-->
            <button class="btn btn-primary">Start Battle</button>
        </div>
        <div class="col-lg-5 enemy">
            <div class="enemy-container">
                <div class="name">Covid</div>
                <div class="healthbar">100%</div>
            </div>
        </div>
    </div>
</div>

<script type="text/babel">

    class Player extends React.Component {
        state = {
            hp: 100,
            name: "<?php echo $this->Session->read('user.Account.avatar') ?>"
        }
        handleClick = (e) => {
            let hp = this.state.hp - (Math.floor(Math.random() * 10));
            let action = event.target.getAttribute('action');
            this.setState({
                hp: hp
            });
        }
        render() {
            return (
                <div className="player">
                    <div className="player-container">
                        <div className="name">{ this.state.name }</div>
                        <div className="healthbar">{ this.state.hp}%</div>
                    </div>
                    <div className="player-actions">
                        <button onClick={ this.handleClick } className='btn btn-sm btn-primary' data-action="attack">Attack</button>
                        <button onClick={ this.handleClick } className='btn btn-sm btn-warning' data-action="power">Power</button>
                        <button onClick={ this.handleClick } className='btn btn-sm btn-success' data-action="potion">Potion</button>
                        <button onClick={ this.handleClick } className='btn btn-sm btn-danger' data-action="giveup">Give up</button>
                    </div>
                </div>
            )
        }
    }

    ReactDOM.render(<Player />, document.getElementById('player'));


</script>