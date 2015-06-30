<!DOCTYPE html>
<?php
/**
 * Jabber broadcast maker provided by FCON.
 *
 * @author AARC, Kari Trace
 * @version  0.0.2
 * @since  0.0.1
 * @copyright 2015, All rights reserved by FCON and/or AARC and/or Kari Trace.
 */
?>
<html>
<head>

    <title>FCON Broadcast Helper</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="http://aarc.fcon.us/fcon/css/bootstrap.css" rel="stylesheet">

</head>
<body bgcolor="#666666">
<h2>BroadCast Format Helper</h2>
<?php
    if (!empty($_POST) && count($_POST) >= 7) {
        $_html_data = '!requestbcast all ';
        foreach ($_POST as $_key => $_value) {
		if (empty($_value)) {continue;}
            $_html_data .= str_replace('_', ' ', $_key).': '.$_value.' || ';
        };
        $_html_data = substr($_html_data, 0, -4);
    ?>

        <form class='form-horizontal'>
            <fieldset>
                <div class='control-group'>
                    <label class='control-label' for='copybox'>Copy the contents in this box and put it on jabber in the FC Channel:</label>
                    <div class='controls'>
                        <textarea rows='10' cols='40' id='holdtext'><?php echo $_html_data; ?></textarea>                        
                    </div>
                </div>
            </fieldset>
        </form>

    <?php
        return true;
    } elseif (!empty($_POST) && count($_POST) < 7) {

        echo ("You forgot something, hit the back button in your browser and try again");
    } else { ?>

        <form class="form-horizontal" action="./bcasthelper.php" method="post">
            <div class="control-group">
                <label class="control-label" for="pre_hurf">Pre-hurf?</label>
                <div class="controls">
                    <input type="checkbox" name="Pre Hurf" value="Yes" id="pre_hurf"><span class="help-inline">Is this fleet going to be NOW or planned for later?</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="FCname">FC Name:</label>
                <div class="controls">
                    <input type=text name="FC Name" id="FCname" required><span class="help-inline">Give your own ingame character name here.</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="Fleetname">Fleet name:</label>
                <div class="controls">
                    <input type=text name="Fleet Name" id="Fleetname" required><span class="help-inline">Enter the name of the Fleet Advert</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="formup">Form-up location:</label>
                <div class="controls">
                    <input type=text name="Form Up" id="formup" required><span class="help-inline">Type in System name and additional details. Ex: LS-JEP - Save tower at P3M9</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="shiptypes">Shiptypes:</label>
                <div class="controls">
                    <input type=text name="Ship Types" id="shiptypes" required><span class="help-inline">Desired shiptypes.</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="reimb">Reimbursement (SRP):</label>
                <div class="controls">
                    <select name="SRP Level" id="reimb">
                        <option value="none" selected>Select SRP level!</option>
                        <?php // If the hours are not betweem 1600 and 2000, fleet can be anything SRP wise
                        if (date('H') < 1600 && date('H') > 2000) { ?>
                            <option value="none">None(0%)</option>
                            <option value="peacetime(50%)">peacetime(50%)</option>
                        <?php }; ?>
                        <option value="stratop(100%)">stratop(100%)</option>

                    </select><span class="help-inline">Select reimbursement type.</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="comms">Comms Type:</label>
                <div class="controls">
                    <select name="Comms Type" id="comms" required>
                        <option value="Unspecified" selected>Select Comms!</option>
                        <option value="FCON-MUMBLE">FCON Mumble</option>
                        <option value="IMPERIUM-MUMBLE">The Imperium Mumble</option>
    					<option value="TNT TS3">TNT TS3</option>
                    </select>
                    <span class="help-inline">Which Comms system are we going to use?</span>
                </div>
            </div>
            <div>
                <label class="control-label" for="channel">Comms Channel:</label>
                <div class="controls">
                    <input type=text name="Comms Channel" id="channel" required><span class="help-inline">Enter an OP number here. Only the number, don't add the word "Op" in here.</span>
                </div>
            </div>
            <br />
            <div class="control-group">
                <label class="control-label" for="story">Optional story:</label>
                <div class="controls">
                    <textarea name="Story" id="story" cols=80 rows=10 maxlength=1000></textarea>
                    <span class="help-inline">Optional story about your op / fleet / event.</span>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type=submit class="btn-large btn-primary">
                    <hr />
                    <p style="width:600px">When you click this button all the above information is send to a second page which prepares a command for you that you can copy and paste into Jabber command channels.</p>
                    <p>FCON FCs/Illuminati/ImperiumOps/GFSC/TNT-fc, etc.</p>
                </div>
            </div>

        </form>
	<?php } ?>
	</body>
</html>