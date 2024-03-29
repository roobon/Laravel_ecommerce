@extends('admin.layouts.default')
@section('admincontent')
<div class="row-fluid sortable ui-sortable">
				<div class="box blue span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacturer</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{action('ManufacturerController@store')}}" method="post">
							{{csrf_field()}}
							<fieldset>
							  <div class="control-group ">
								<label style="color:black" class="control-label" for="prependedInput">manufacturer name</label>
								<div class="controls">
								  <input name="manufacturer_name" type="text" id="inputSuccess">
								  <!-- <span class="help-inline">Woohoo!</span> -->
								</div>
							  </div>
                              <div class="control-group ">
								<label style="color: black" class="control-label" for="input">Description</label>
								<div class="controls">
                                
                              
                                    <div class="col-sm-10">
                                        <textarea name="description" id="textarea" class="form-control" rows="3" required="required"></textarea>
                                    </div>
                                
                                
								  
								  <!-- <span class="help-inline">Woohoo!</span> -->
								</div>
							  </div>
                      
							  <div class="control-group ">
								<label style="color: black" class="control-label" for="selectError3">Status</label>
								<div class="controls">
								  <select id="selectError3" name="status" >
									<option value="" selected hidden>select one</option>
									<option value="1">published</option>
									<option value="0">draft</option>
									
								  </select>
								</div>
							  </div>

							  <div class="control-group ">
								<label style="color:black" class="control-label" for="prependedInput">created at</label>
								<div class="controls">
								  <input name="created_at" type="date" id="inputSuccess">
								  <!-- <span class="help-inline">Woohoo!</span> -->
								</div>
							  </div>

							  <div class="control-group ">
								<label style="color:black" class="control-label" for="prependedInput">updated at</label>
								<div class="controls">
								  <input name="updated_at" type="date" id="inputSuccess">
								  <!-- <span class="help-inline">Woohoo!</span> -->
								</div>
							  </div>

							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div>
@stop

