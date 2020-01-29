<html>
<head>
	<link rel="stylesheet" href="membership.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1> GBWS Team Registration</h1>
<form enctype="multipart/form-data" action="1c-ins_new_team.php" method="POST" id="reg-new-team">
    <div style="margin-top:10px;">
        <label><span>*</span> Indicates required field</label>
        <div>
        	<div class="name-group">
        		<label for="parter1_first">Partner #1 Name <span>*</span></label> <br />
			</div>
			<div class="name-group">
    			<input aria-required="true"id="parter1_first" type="text" name="partner1_first" placeholder="First" required />
	        	<input aria-required="true"id="partner1_last" type="text" name="partner1_last" placeholder="Last" required />
        	</div>
        </div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="partner1_address">Partner #1 Address <span class="form-required">*</span></label>
        		<div>
        			<input aria-required="true"id="partner1_address" type="text" name="partner1_address" required />
        		</div>
		        <div style="display:none;">
	        	</div>
        	</div>
    	</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="parnter1_city">Partner #1 City <span>*</span></label>
        		<div>
        			<input aria-required="true"id="partner1_city" type="text" name="partner1_city" required />
        		</div>
        		<div style="display:none;">
        		</div>
        	</div>
    	</div>
        
        <div>
        	<div style="margin:5px 0px 0px 0px;">
        		<label for="partner1_state">Partner #1 State <span>*</span></label>
        		<div>
        			<select name='partner1_state' aria-required="true" required>
        				<option value='AL'>Alabama</option>
                        <option value='AK'>Alaska</option>
                        <option value='AZ'>Arizona</option>
                        <option value='AR'>Arkansas</option>
                        <option value='CA'>California</option>
                        <option value='CO'>Colorado</option>
                        <option value='CT'>Connecticut</option>
                        <option value='DE'>Delaware</option>
                        <option value='FL'>Florida</option>
                        <option value='GA'>Georgia</option>
                        <option value='HI'>Hawaii</option>
                        <option value='ID'>Idaho</option>
                        <option value='IL'>Illinois</option>
                        <option value='IN'>Indiana</option>
                        <option value='IA'>Iowa</option>
                        <option value='KS'>Kansas</option>
                        <option value='KY'>Kentucky</option>
                        <option value='LA'>Louisiana</option>
                        <option value='ME'>Maine</option>
                        <option value='MD'>Maryland</option>
                        <option value='MA'>Massachusetts</option>
                        <option value='MI'>Michigan</option>
                        <option value='MN'>Minnesota</option>
                        <option value='MS'>Mississippi</option>
                        <option value='MS'>Missouri</option>
                        <option value='MT'>Montana</option>
                        <option value='NE'>Nebraska</option>
                        <option value='NV'>Nevada</option>
                        <option value='NH'>New Hampshire</option>
                        <option value='NJ'>New Jersey</option>
                        <option value='NM'>New Mexico</option>
                        <option value='NY'>New York</option>
                        <option value='NC'>North Carolina</option>
                        <option value='ND'>North Dakota</option>
                        <option value='OH'>Ohio</option>
                        <option value='OK'>Oklahoma</option>
                        <option value='OR'>Oregon</option>
                        <option value='PA'>Pennsylvania</option>
                        <option value='RI'>Rhode Island</option>
                        <option value='SC'>South Carolina</option>
                        <option value='SD'>South Dakota</option>
                        <option value='TN'>Tennessee</option>
                        <option value='TX'>Texas</option>
                        <option value='UT'>Utah</option>
                        <option value='VT'>Vermont</option>
                        <option value='VA'>Virginia</option>
                        <option value='WA'>Washington</option>
                        <option value='DC'>Washington D.C.</option>
                        <option value='WV'>West Virginia</option>
                        <option selected value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                   	</select>
    			</div>
        		<div style="display:none;">
        		</div>
    		</div>
		</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="partner1_zip">Partner #1 Zip <span>*</span></label>
        		<div>
        			<input aria-required="true"id="partner1_zip" type="text" name="partner1_zip" required/>
        		</div>
        		<div style="display:none;">
        		</div>
        	</div>
    	</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="partner1_phone">Partner #1 Phone <span>*</span></label>
        		<div>
        			<input aria-required="true"id="partner1_phone" type="tel" name="partner1_phone" placeholder="(555) 555-1234" required />
        		</div>
        		<div style="display:none;">
    			</div>
    		</div>
		</div>
        
        <div>
        	<div style="margin:5px 0px 5px 0px;">
        		<label for="partner1_email">Partner #1 Email </label>
        		<div>
        			<input aria-required="true"id="partner1_email" type="text" name="partner1_email" />
        		</div>
        		<div style="display:none;">
        		</div>
        	</div>
    	</div>
        
        <div>
        	<div style="height: 20px; overflow: hidden; width: 100%;">
        	</div>
        	<hr class="styled-hr" style="width:100%;"></hr>
       		<div style="height: 20px; overflow: hidden; width: 100%;">
       		</div>
    	</div>

    	<div style="margin-top:10px;">
        
            <div>
            	<div class="name-group">
            		<label for="parter1_first">Partner #2 Name <span>*</span></label> <br />
    			</div>
    			<div class="name-group">
        			<input aria-required="true"id="parter2_first" type="text" name="partner2_first" placeholder="First" required />
    	        	<input aria-required="true"id="partner2_last" type="text" name="partner2_last" placeholder="Last" required />
            	</div>
            </div>
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="partner2_address">Partner #2 Address <span class="form-required">*</span></label>
            		<div>
            			<input aria-required="true"id="partner2_address" type="text" name="partner2_address" required />
            		</div>
            		<div style="display:none;">
            		</div>
        		</div>
    		</div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="parnter1_city">Partner #2 City <span>*</span></label>
            		<div>
            			<input aria-required="true"id="partner2_city" type="text" name="partner2_city"  required />
            		</div>
            		<div style="display:none;">
            		</div>
            	</div>
        	</div>
            
            <div>
            	<div style="margin:5px 0px 0px 0px;">
            		<label for="partner2_state">Partner #2 State <span>*</span></label>
            		<div>
            			<select name='partner2_state' aria-required="true" required >
                            <option value='AL'>Alabama</option>
                            <option value='AK'>Alaska</option>
                            <option value='AZ'>Arizona</option>
                            <option value='AR'>Arkansas</option>
                            <option value='CA'>California</option>
                            <option value='CO'>Colorado</option>
                            <option value='CT'>Connecticut</option>
                            <option value='DE'>Delaware</option>
                            <option value='FL'>Florida</option>
                            <option value='GA'>Georgia</option>
                            <option value='HI'>Hawaii</option>
                            <option value='ID'>Idaho</option>
                            <option value='IL'>Illinois</option>
                            <option value='IN'>Indiana</option>
                            <option value='IA'>Iowa</option>
                            <option value='KS'>Kansas</option>
                            <option value='KY'>Kentucky</option>
                            <option value='LA'>Louisiana</option>
                            <option value='ME'>Maine</option>
                            <option value='MD'>Maryland</option>
                            <option value='MA'>Massachusetts</option>
                            <option value='MI'>Michigan</option>
                            <option value='MN'>Minnesota</option>
                            <option value='MS'>Mississippi</option>
                            <option value='MS'>Missouri</option>
                            <option value='MT'>Montana</option>
                            <option value='NE'>Nebraska</option>
                            <option value='NV'>Nevada</option>
                            <option value='NH'>New Hampshire</option>
                            <option value='NJ'>New Jersey</option>
                            <option value='NM'>New Mexico</option>
                            <option value='NY'>New York</option>
                            <option value='NC'>North Carolina</option>
                            <option value='ND'>North Dakota</option>
                            <option value='OH'>Ohio</option>
                            <option value='OK'>Oklahoma</option>
                            <option value='OR'>Oregon</option>
                            <option value='PA'>Pennsylvania</option>
                            <option value='RI'>Rhode Island</option>
                            <option value='SC'>South Carolina</option>
                            <option value='SD'>South Dakota</option>
                            <option value='TN'>Tennessee</option>
                            <option value='TX'>Texas</option>
                            <option value='UT'>Utah</option>
                            <option value='VT'>Vermont</option>
                            <option value='VA'>Virginia</option>
                            <option value='WA'>Washington</option>
                            <option value='DC'>Washington D.C.</option>
                            <option value='WV'>West Virginia</option>
                            <option selected value='WI'>Wisconsin</option>
                            <option value='WY'>Wyoming</option>
                        </select>
        			</div>
            		<div style="display:none;">
            		</div>
        		</div>
    		</div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="partner2_zip">Partner #2 Zip <span>*</span></label>
            		<div>
            			<input aria-required="true"id="partner2_zip" type="text" name="partner2_zip"  required />
            		</div>
            		<div style="display:none;">
            		</div>
            	</div>
        	</div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="partner2_phone">Partner #2 Phone <span>*</span></label>
            		<div>
            			<input aria-required="true"id="partner2_phone" type="tel" name="partner2_phone" placeholder="(555) 555-1234" required />
            		</div>
            		<div style="display:none;">
        			</div>
        		</div>
    		</div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="partner2_email">Partner #2 Email </label>
            		<div>
            			<input aria-required="true"id="partner2_email" type="text" name="partner2_email" />
            		</div>
    				<div style="display:none;">
    				</div>
            	</div>
        	</div>
            
            <div>
            	<div style="height: 20px; overflow: hidden; width: 100%;"></div>
            	<hr class="styled-hr" style="width:100%;"></hr>
            	<div style="height: 20px; overflow: hidden; width: 100%;"></div>
            </div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="boat">Boat Manufactuer</label>
            		<div>
            			<input id="boat" type="text" name="boat" />
            		</div>
            		<div style="display:none;">
            		</div>
            	</div>
            </div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            	<label for="motor">Motor Manufacturer</label>
            		<div>
            		<input id="motor" type="text" name="motor" />
            		</div>
            		<div style="display:none;">
            		</div>
            	</div>
            </div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="trolling_motor">Trolling Motor</label>
            		<div>
            			<input id="trolling_motor" type="text" name="trolling_motor" />
            		</div>
            		<div style="display:none;">
        			</div>
        		</div>
    		</div>
            
            <div>
            	<div style="margin:5px 0px 5px 0px;">
            		<label for="electronics">Electronics</label>
            		<div>
            			<input id="electronics" type="text" name="electronics" />
            		</div>
            		<div style="display:none;">
            		</div>
            	</div>
        	</div>
        </div>
	<button type="submit">Submit</button>
	</div>

</form>
</body>

</html>