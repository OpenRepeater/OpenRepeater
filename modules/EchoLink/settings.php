<?php
/* 
 *	Settings Page for Module 
 *	
 *	This is included into a full page wrapper to be displayed. 
 */
			
$mod_function_file = 'modules/'.$module[$module_id]['svxlinkName'].'/functions.php';
$options = $module[$module_id]['moduleOptions'];
$settings_array = unserialize($options);
?>

			<form class="form-horizontal" role="form" action="<?php echo $mod_function_file; ?>" method="post" id="echolinkSettings">
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-signal"></i> EchoLink Settings</h2>
					</div>
					<div class="box-content">
				
						  <fieldset>
							<legend>EchoLink Module Information</legend>

								<div class="alert alert-info"><p><strong>Note About EchoLink:</strong> 
								The EchoLink® network allows licensed Amateur Radio stations to communicate with one another over the Internet using VOIP technology.  This module allows worldwide connections to be made between other repeaters or to individuals using EchoLink nodes. In order to use EchoLink the following must be done:
								<ul>
								<li>You must validate your callsign with the EchoLink network to enter in the settings below. For repeater operation this is you callsign followed by a "-R" (i.e. <em>X#XXX</em><strong>-R</strong>)</li>
								<li>This OpenRepeater controller must be connected to the interent in order for this to function.</li>
								<li>EchoLink requires that your router or firewall allow inbound and outbound UDP to ports 5198 and 5199, and outbound TCP to port 5200.  If you are using a home-network router, you will also need to configure the router to "forward" UDP ports 5198 and 5199 to the IP address assigned to this OpenRepeater controller.</li>
								</ul>

								Visit the EchoLink Website (<a href="http://www.echolink.org/" target="_blank">http://www.echolink.org/</a>) for more details on setting up your network and validating your callsign. </p></div>

							
							<legend>Basic Settings</legend>

							  <div class="control-group">
								<label class="control-label" for="timeout">Module Timeout</label>
								<div class="controls">
								  <div class="input-append">
									<input id="timeout" name="timeout" size="16" type="text" value="<?php echo $settings_array['timeout']; ?>" required><span class="add-on">secs</span>
									<span class="help-inline">This is how many seconds of inactivity to wait for until the module is disabled.</span>
								  </div>
								</div>
							  </div>


							  <div class="control-group">
								<label class="control-label" for="callSign">EchoLink Callsign</label>
								<div class="controls">
								  <div class="input-prepend">
									<span class="add-on"><i class="icon-user"></i></span><input id="callSign" style="text-transform: uppercase" size="16" type="text" name="callSign" value="<?php echo $settings_array['callSign']; ?>" required>
 								    <span class="help-inline">The callsign to use to login to the EchoLink directory server.</span>
								  </div>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="password">EchoLink Password</label>
								<div class="controls">
								  <div class="input-prepend">
									<span class="add-on"><i class="icon-lock"></i></span><input id="password" size="16"  type="password" placeholder="Password" name="password" value="<?php echo $settings_array['password']; ?>" required>
 								    <span class="help-inline">The EchoLink directory server password to use.</span>
								  </div>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="sysop">Sysop Name</label>
								<div class="controls">
								  <input class="input-xlarge" id="sysop" type="text" name="sysop" value="<?php echo $settings_array['sysop']; ?>" required>
								  <span class="help-inline">The name of the person or club that is responsible for this system.</span>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="location">Location</label>
								<div class="controls">
								  <input class="input-xlarge" id="location" type="text" name="location" value="<?php echo $settings_array['location']; ?>" required>
								  <span class="help-inline">The location of the station.</span>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="description">Description</label>
								<div class="controls">
								  <textarea class="input-xlarge disabled" id="description" name="description" rows="4" required><?php echo $settings_array['description']; ?></textarea>
								  <span class="help-inline">A longer description that is sent to remote stations upon connection. This description should typically include detailed station information like QTH, transceiver frequency/power, antenna, CTCSS tone frequency etc.</span>
								</div>
							  </div>
							  
							  <input type="hidden" name="server" value="servers.echolink.org">
							  <input type="hidden" name="max_qsos" value="4">
							  <input type="hidden" name="connections" value="4">
							  <input type="hidden" name="idle_timeout" value="300">

							  <!-- PASS MODULE KEY FOR UPDATE DATABASE AND REDIRECT BACK TO SETTINGS PAGE -->
							  <input type="hidden" name="moduleKey" value="<?php echo $module[$module_id]['moduleKey']; ?>">

						  </fieldset>

						<fieldset>
							<legend>Proxy Settings (Optional)</legend>
							<span class="help-inline">Please see http://www.echolink.org/proxy.htm for details<br></span>
							<div class="control-group">
								<label class="control-label">Proxy Server</label>
								<div class="controls">
								  <input type="text" id="proxy_server" name="proxy_server" value="<?php echo $settings_array['proxy_server']?>">
								  <span class="help-inline">If set, connect to the given EchoLink proxy server host. All EchoLink connections, both incoming and outgoing, will then go through the proxy.</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Proxy Port</label>
								<div class="controls">
								  <input type="text" id="proxy_port" name="proxy_port" value="<?php echo !empty($settings_array['proxy_port']) ? $settings_array['proxy_port'] : '8100'; ?>">
								  <span class="help-inline">Set the TCP port used for connecing to an EchoLink proxy server. Default is 8100.</span>	
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Proxy Password</label>
								<div class="controls">
								  <input type="password" id="proxy_password" name="proxy_password" value="<?php echo $settings_array['proxy_password']?>">
								  <span class="help-inline">Set the EchoLink proxy password used when connecting to an EchoLink proxy server. Use the password PUBLIC for public proxy servers.</span>
								</div>
							</div>
						</fieldset>	

						<div class="form-actions">
						  <input type="hidden" name="action" value="update">
						  <input type="submit">
						</div>


					</div>
				</div><!--/span-->
			</div><!--/row-->
			</form>
