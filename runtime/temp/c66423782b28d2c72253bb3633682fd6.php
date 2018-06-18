<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\wamp64\www\jd\public/../application/admin\view\cate\catelist.html";i:1529289875;s:58:"D:\wamp64\www\jd\application\admin\view\public\navbar.html";i:1527774212;s:60:"D:\wamp64\www\jd\application\admin\view\public\slidebar.html";i:1528945715;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>京东商城后台</title>
	<meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
	<meta name="description" content="JS代码网提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link href="/jd/public/static/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/jd/public/static/admin/assets/css/font-awesome.min.css" />

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />


	<link rel="stylesheet" href="/jd/public/static/admin/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/jd/public/static/admin/assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="/jd/public/static/admin/assets/css/ace-skins.min.css" />
	<script src="/jd/public/static/admin/assets/js/ace-extra.min.js"></script>
</head>

<body>
	<!--navbar-->
	<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    Ace Admin
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="grey">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge badge-grey">4</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-ok"></i>
                            4 Tasks to complete
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Software Update</span>
                                    <span class="pull-right">65%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:65%" class="progress-bar "></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Hardware Upgrade</span>
                                    <span class="pull-right">35%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Unit Testing</span>
                                    <span class="pull-right">15%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Bug Fixes</span>
                                    <span class="pull-right">90%</span>
                                </div>

                                <div class="progress progress-mini progress-striped active">
                                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                See tasks with details
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-warning-sign"></i>
                            8 Notifications
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
                                    <span class="pull-right badge badge-info">+12</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="btn btn-xs btn-primary icon-user"></i>
                                Bob just signed up as an editor ...
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
                                    <span class="pull-right badge badge-success">+8</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												Followers
											</span>
                                    <span class="pull-right badge badge-info">+11</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                See all notifications
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-envelope-alt"></i>
                            5 Messages
                        </li>

                        <li>
                            <a href="#">
                                <img src="/jd/public/static/admin/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                <span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="/jd/public/static/admin/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                <span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="/jd/public/static/admin/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                <span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
                            </a>
                        </li>

                        <li>
                            <a href="inbox.html">
                                See all messages
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/jd/public/static/admin/assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="icon-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="icon-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <i class="icon-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>
	<!--navbar-->


	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>

		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
				<div class="sidebar" id="sidebar">
		<script type="text/javascript">
			try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
		</script>

		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				<button class="btn btn-success">
					<i class="icon-signal"></i>
				</button>

				<button class="btn btn-info">
					<i class="icon-pencil"></i>
				</button>

				<button class="btn btn-warning">
					<i class="icon-group"></i>
				</button>

				<button class="btn btn-danger">
					<i class="icon-cogs"></i>
				</button>
			</div>

			<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
				<span class="btn btn-success"></span>

				<span class="btn btn-info"></span>

				<span class="btn btn-warning"></span>

				<span class="btn btn-danger"></span>
			</div>
		</div>
		<ul class="nav nav-list">
			<li class="active">
				<a href="index.html">
					<i class="icon-dashboard"></i>
					<span class="menu-text"> 控制台 </span>
				</a>
			</li>

			<li>
				<a href="typography.html">
					<i class="icon-text-width"></i>
					<span class="menu-text"> 文字排版 </span>
				</a>
			</li>

			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-user"></i>
					<span class="menu-text">用户管理</span>

					<b class="arrow icon-angle-down"></b>
				</a>

				<ul class="submenu">
					<li>
						<a href="elements.html">
							<i class="icon-double-angle-right"></i>
							用户列表
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#" class="dropdown-toggle">
					<i class="icon-gift"></i>
					<span class="menu-text">商品管理</span>

					<b class="arrow icon-angle-down"></b>
				</a>

				<ul class="submenu">
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-double-angle-right"></i>
							分类管理
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="<?php echo url('cate/catelist'); ?>">
									<i class="icon-double-angle-right"></i>
									分类列表
								</a>
							</li>

							<li>
								<a href="<?php echo url('cate/add'); ?>">
									<i class="icon-double-angle-right"></i>
									添加分类
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-double-angle-right"></i>
							商品管理
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="<?php echo url('goods/goodslist'); ?>">
									<i class="icon-double-angle-right"></i>
									商品列表
								</a>
							</li>

							<li>
								<a href="<?php echo url('goods/add'); ?>">
									<i class="icon-double-angle-right"></i>
									添加商品
								</a>
							</li>
						</ul>
					</li>  
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-double-angle-right"></i>
							关键字管理
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="<?php echo url('Keywords/keywordslist'); ?>">
									<i class="icon-double-angle-right"></i>
									关键字列表
								</a>
							</li>

							<li>
								<a href="<?php echo url('Keywords/add'); ?>">
									<i class="icon-double-angle-right"></i>
									添加关键字
								</a>
							</li>
						</ul>
					</li>  
				</ul>
			</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-double-angle-right"></i>

							三级菜单
							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="#">
									<i class="icon-leaf"></i>
									第一级
								</a>
							</li>

							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-pencil"></i>

									第四级
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="#">
											<i class="icon-plus"></i>
											添加产品
										</a>
									</li>

									<li>
										<a href="#">
											<i class="icon-eye-open"></i>
											查看商品
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>					
		<div class="sidebar-collapse" id="sidebar-collapse">
			<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
		</div>

			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
			</script>
		</div>

		<div class="main-content">

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="page-content">
							<div class="page-header">
								<h1>
									分类管理
									<small>
										<i class="icon-double-angle-right"></i>
										分类列表
									</small>
								</h1>
							</div><!-- /.page-header -->
							<form action="<?php echo url('cate/sort'); ?>" method="post">
								<div class="row">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-xs-12">
												<div class="table-responsive">
													<table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
														<thead>
															<tr role="row"><th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="
																" style="width: 91px;">
																<label>
																	<input type="checkbox" class="ace">
																	<span class="lbl"></span>
																</label>
															</th>
															<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 245px;">ID</th>
															<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 186px;">分类名称</th>
															<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 186px;">排序</th>
															<th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending" style="width: 201px;">操作</th>
														</tr>
													</thead>

													<?php if(is_array($cate_list) || $cate_list instanceof \think\Collection || $cate_list instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
													<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
														<td class="center  sorting_1">
															<label>
																<input type="checkbox" class="ace">
																<span class="lbl"></span>
															</label>
														</td>

														<td class=" ">
															<a href="#"><?php echo $vo['cate_id']; ?></a>
														</td>
														<td class=""><?php echo $vo['str']; ?><?php echo $vo['cate_name']; ?></td>
														<td class=""><input type="text" name="<?php echo $vo['cate_id']; ?>" value="<?php echo $vo['cate_sort']; ?>"></td>
														<td class="">
															<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																<a class="green" href="<?php echo url('cate/upd',array('cate_id'=>$vo['cate_id'])); ?>">
																	<i class="icon-pencil bigger-130"></i>
																</a>

																<a class="red" href="javascript:if(confirm('确定删除吗?')) location='<?php echo url('cate/del_cate',array('cate_id'=>$vo['cate_id'])); ?>'">
																	<i class="icon-trash bigger-130"></i>
																</a>
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>				
														<?php endforeach; endif; else: echo "" ;endif; ?>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div id="modal-table" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header no-padding">

										</div>

										<div class="modal-body no-padding">
											<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
												<thead>
													<tr>
														<th>分类管理</th>
														<th>Price</th>
														<th>Clicks</th>

														<th>
															<i class="icon-time bigger-110"></i>
															Update
														</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>
															<a href="#">ace.com</a>
														</td>
														<td>$45</td>
														<td>3,330</td>
														<td>Feb 12</td>
													</tr>

													<tr>
														<td>
															<a href="#">base.com</a>
														</td>
														<td>$35</td>
														<td>2,595</td>
														<td>Feb 18</td>
													</tr>

													<tr>
														<td>
															<a href="#">max.com</a>
														</td>
														<td>$60</td>
														<td>4,400</td>
														<td>Mar 11</td>
													</tr>

													<tr>
														<td>
															<a href="#">best.com</a>
														</td>
														<td>$75</td>
														<td>6,500</td>
														<td>Apr 03</td>
													</tr>

													<tr>
														<td>
															<a href="#">pro.com</a>
														</td>
														<td>$55</td>
														<td>4,250</td>
														<td>Jan 21</td>
													</tr>
												</tbody>
											</table>
										</div>

										<div class="modal-footer no-margin-top">
											<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
												<i class="icon-remove"></i>
												Close
											</button>

											<ul class="pagination pull-right no-margin">
												<li class="prev disabled">
													<a href="#">
														<i class="icon-double-angle-left"></i>
													</a>
												</li>

												<li class="active">
													<a href="#">1</a>
												</li>

												<li>
													<a href="#">2</a>
												</li>

												<li>
													<a href="#">3</a>
												</li>

												<li class="next">
													<a href="#">
														<i class="icon-double-angle-right"></i>
													</a>
												</li>
											</ul>
										</div>

									</div>
								</div>
							</div>
							<?php echo $show; ?>	
							<!-- <div class="col-md-offset-3 col-md-9">
								<input type="submit" name="" value="添加分类" class="btn btn-info">
							</div> -->
						</form>			
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>

<div class="ace-settings-container" id="ace-settings-container">
	<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
		<i class="icon-cog bigger-150"></i>
	</div>

	<div class="ace-settings-box" id="ace-settings-box">
		<div>
			<div class="pull-left">
				<select id="skin-colorpicker" class="hide">
					<option data-skin="default" value="#438EB9">#438EB9</option>
					<option data-skin="skin-1" value="#222A2D">#222A2D</option>
					<option data-skin="skin-2" value="#C6487E">#C6487E</option>
					<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
				</select>
			</div>
			<span>&nbsp; Choose Skin</span>
		</div>

		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
			<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
		</div>

		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
			<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
		</div>

		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
			<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
		</div>

		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
			<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
		</div>

		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
			<label class="lbl" for="ace-settings-add-container">
				Inside
				<b>.container</b>
			</label>
		</div>
	</div>
</div><!-- /#ace-settings-container -->
</div><!-- /.main-container-inner -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->



<script type="text/javascript">
	window.jQuery || document.write("<script src='/jd/public/static/admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>


<script type="text/javascript">
	if("ontouchend" in document) document.write("<script src='/jd/public/static/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="/jd/public/static/admin/assets/js/bootstrap.min.js"></script>
<script src="/jd/public/static/admin/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->

<script src="/jd/public/static/admin/assets/js/ace-elements.min.js"></script>
<script src="/jd/public/static/admin/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
</body>
</html>
