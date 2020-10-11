
<?php 
$this->assign('title', 'Covid Masters | Battle');
echo $this->Html->css('battle'); 
?>

<div id="arena"></div>

<script type="text/babel">

    class Player extends React.Component {
        state = {
            playerStatus: '',
            enemyStatus: '',
            playerDmg: 10,
            enemyDmg: 10,
            hp: 100,
            enemyHp: 100,
            name: "<?php echo $this->Session->read('user.Account.avatar') ?>",
            enemyName: "<?php echo $enemyName ?>",
            logs: '',
            logsSummary: '',
            actionStatus: 'disabled',
            startBtnName: 'Start Battle',
            startBtnAction: 'start-battle',
            startBtnStatus: ''
        }
        handleClick = (e) => {
            let hp, enemyHp, playerDmg, enemyDmg, logs, playerHeal, postData, status;
            let logsSummary = this.state.logsSummary;
            let action = event.target.getAttribute('data-action');

            if (action == 'start-battle') {
                this.setState({
                    actionStatus: '',
                    startBtnStatus: 'disabled',
                    startBtnAction: 'reload'
                });
            } else if (action == 'reload') {
                location.reload();
            } else {

                if (action == 'attack') {
                    playerDmg = (Math.floor(Math.random() * this.state.playerDmg));
                    enemyDmg = (Math.floor(Math.random() * this.state.enemyDmg));

                    hp = this.state.hp - enemyDmg;
                    enemyHp = this.state.enemyHp - playerDmg;

                    logs = this.state.name + ' dealt ' + playerDmg + ' damage<br>' + this.state.enemyName + ' dealt ' + enemyDmg + ' damage<br><br>';

                } else if (action == 'power') {
                    playerDmg = (Math.floor(Math.random() * (this.state.playerDmg + 20)));
                    enemyDmg = (Math.floor(Math.random() * (this.state.enemyDmg + 20)));

                    hp = this.state.hp - enemyDmg;
                    enemyHp = this.state.enemyHp - playerDmg;

                    logs = this.state.name + ' dealt ' + playerDmg + ' power damage<br>' + this.state.enemyName + ' dealt ' + enemyDmg + ' damage<br><br>';

                } else if (action == 'potion') {
                    playerHeal = (Math.floor(Math.random() * 10));
                    enemyDmg = (Math.floor(Math.random() * this.state.enemyDmg));

                    hp = (this.state.hp + playerHeal) - enemyDmg;
                    enemyHp = this.state.enemyHp;

                    logs = this.state.name + ' healed for ' + playerHeal + '<br>' + this.state.enemyName + ' dealt ' + enemyDmg + ' damage<br><br>';

                } else if (action == 'giveup') {

                    logs = this.state.name + ' gave up ';
                    
                    postData = {
                        'logs' : this.state.logsSummary,
                        'status' : 'L',
                        'enemyName' : this.state.enemyName
                    };

                    this.setState({
                        actionStatus: 'disabled',
                        startBtnName: 'New Battle',
                        startBtnStatus: ''
                    });

                    $.ajax({ url: '/dashboard/battle', method: 'POST', data: postData });
                }

                if (hp <= 0 || enemyHp <=0) {

                    if (hp <= 0 && enemyHp <= 0) {
                        status = 'D';
                        this.setState({playerStatus: 'Draw', enemyStatus: 'Draw'});
                    } else if (hp > enemyHp) {
                        status = 'W';
                        this.setState({playerStatus: 'Winner'});
                    } else if (hp < enemyHp) {
                        status = 'L';
                        this.setState({enemyStatus: 'Winner'});
                    } 
                    
                    $('#logs').append(logs);

                    logsSummary += logs;

                    this.setState({
                        hp: hp,
                        enemyHp: enemyHp,
                        logs: logs,
                        logsSummary: logsSummary,
                        actionStatus: 'disabled',
                        startBtnName: 'New Battle',
                        startBtnStatus: '',
                    });

                    postData = {
                        status: status,
                        logsSummary: logsSummary,
                        enemyName: this.state.enemyName
                    };
                    
                    $.ajax({ url: '/dashboard/battle', method: 'POST', data: postData });

                } else if (action != 'giveup') {

                    $('#logs').append(logs);

                    logsSummary += logs;

                    this.setState({
                        hp: hp,
                        enemyHp: enemyHp,
                        logs: logs,
                        logsSummary: logsSummary
                    });
                }
                
            }
            
        }
        render() {
            return (
                <div className="row">
                    <div className="col-lg-5 player">
                        <div className="status">{ this.state.playerStatus }</div>
                        <div className="player-container">
                            <div className="name">{ this.state.name }</div>
                            <div className="healthbar">{ this.state.hp}%</div>
                        </div>
                        <div className="player-actions">
                            <button onClick={ this.handleClick } className='btn btn-sm btn-primary attack' data-action="attack" disabled={ this.state.actionStatus }>Attack</button>
                            <button onClick={ this.handleClick } className='btn btn-sm btn-warning power' data-action="power" disabled={ this.state.actionStatus }>Power</button>
                            <button onClick={ this.handleClick } className='btn btn-sm btn-success potion' data-action="potion" disabled={ this.state.actionStatus }>Potion</button>
                            <button onClick={ this.handleClick } className='btn btn-sm btn-danger giveup' data-action="giveup" disabled={ this.state.actionStatus }>Give up</button>
                        </div>
                    </div>
                    <div className="col-lg-2 event">
                        <button onClick={ this.handleClick } className="btn btn-primary" data-action={ this.state.startBtnAction } disabled={ this.state.startBtnStatus }>{ this.state.startBtnName }</button>
                    </div>
                    <div className="col-lg-5 enemy">
                        <div className="status">{ this.state.enemyStatus }</div>
                        <div className="enemy-container">
                            <div className="name">{ this.state.enemyName }</div>
                            <div className="healthbar">{ this.state.enemyHp }%</div>
                        </div>
                    </div>
                    <div id="logs"></div>
                </div>
            )
        }
    }

    ReactDOM.render(<Player />, document.getElementById('arena'));


</script>