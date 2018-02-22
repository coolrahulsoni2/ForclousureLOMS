<?php include 'header.php'; ?>

	<!-- BEGIN RIGHTSIDE -->
	<div class="rightside bg-grey-50">
		<!-- BEGIN PAGE HEADING -->
		 <div id="divDailyNotification" style="display:none;" class="alert alert-warning">
    <span>Please Add Daily Star Sign forecast for Tomorrow <a href="starsignforecast">Click Here</a></span>
</div>
<div id="divMonthlyNotification" style="display:none;" class="alert alert-warning">
    <span>Please Add Monthly Star Sign forecast for Tomorrow <a href="starsignforecast">Click Here</a></span>
</div>

		<div class="page-head">
			<h1 class="page-title">Forclosure Files</h1>
		</div>
		<!-- END PAGE HEADING -->
		<div class="container-fluid manage-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">					
						<div class="panel-body no-padding-top bg-white">
							<h3 class="color-grey-700">Forclosure Files</h3>								
															<ol class="breadcrumb">
									<li><a href="">Home</a></li>
									<li><a href="">Finance Manager</a></li>
									<li><a href="javascript:void(0);">Forclosure File</a></li>
								</ol>
															
							<h4>Forclosure Files</h4>
							<!-- END PAGE HEADER-->		
                    		<!--Start Body-->
							<div class="portlet-body panel-body">
								<div class="table-responsive">
								<table id="table"
									
									       	   data-show-export="true"
									              
									               data-click-to-select="true"
									       data-show-refresh="true"
											   data-striped="true"
									           data-search="true"
									           data-show-refresh="true"
									           data-show-toggle="false"
									           data-show-columns="true"
									           data-show-export="true"
									           data-detail-view="false"
									           data-detail-formatter="detailFormatter"
									           data-minimum-count-columns="2"
									           data-show-pagination-switch="false"
									           data-pagination="true"
									           data-id-field="id"
									           
									           data-page-list="[10, 25, 50, 100, ALL]"
									           data-show-footer="false"
									           data-height="500"


								>
									    <thead>
									    <tr>
									        <th data-field="serialNumber" data-sortable="true" data-width="50px">No.</th>
									        <th data-field="custId" data-sortable="true"  data-width="50px">Cp</th>
									        <th data-field="loanId" data-sortable="true"  data-width="50px">LP</th>
									        <th data-field="name" data-sortable="true"   data-width="350px">Name</th>
									        <th data-field="firstEmi" data-sortable="true"  data-width="120px">Start</th>
									        <th data-field="lastEmi" data-sortable="true"  data-width="120px">End</th>
									        <th data-formatter="AddRupeeRMFormatter" data-sorter="AddRupeeSorter"  data-sortable="true"  data-width="120px">Rem. Principle</th>

									        <th data-formatter="AddRupeeIPFormatter" data-sorter="AddRupeeSorter"  data-sortable="true"  data-width="120px">Interest Pend</th>

									        <th data-formatter="AddRupeeEBFormatter" data-sorter="AddRupeeSorter"  data-sortable="true"  data-width="120px">EMI Bounce</th>

									        <th data-formatter="AddRupeeFCCFormatter" data-sorter="AddRupeeSorter"  data-sortable="true"  data-width="120px">FC Charge</th>

									        <th data-formatter="AddRupeeTotAmountFormatter" data-sorter="AddRupeeSorter"  data-sortable="true"  data-width="120px">Net Amount</th>

									        <th data-formatter="operateFormatter" data-events="operateEvents" data-sortable="false"  data-width="150px">Setting</th>
									    </tr>
									    </thead>
								</table>
							</div>
							</div>
							<!--End Body -->
							<!--Start Pagination-->
							<div class="text-center">
								<ul class="pagination">
								  									</ul>
							</div>
							<!--End Pagination-->													
						</div>						
					</div>
				</div>				
			</div>
		</div>
<?php include 'footer.php'; ?>