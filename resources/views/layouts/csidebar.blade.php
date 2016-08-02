 <section class="left_sidebar ">
    <div class="icons_dv">
        <ul >
            <li id='expandNav' class="closeNav"><a href="javascript:"><span class="angle_icon nav_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="icon_right hide"><i class="fa fa-angle-left" aria-hidden="true"></i></span></a>
            </li>
            
              <li class="dropdown active admin_drpdown" >
          <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon_spc left_imgs flt_lft"><img alt="" src="../images/admin_ico.png"/></span><span class="menu_name "> Admin</span><!--<span  id="admin_menu_icn"><img alt="" src="../images/trans_icons.png" class="dropdwn-icon"/></span>--></a>
       <!--   <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
        
         
          </ul>-->
        </li>
   
   
            <li ng-class="{active:isActiveClass('software_licensing')}" ng-click="page.addTab('Software Licenses', '/company/software_licensing/json', 'software_licensing'); activeStateCheck('software_licensing')"><a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/software.png"/></span><span class="menu_name hide"> Software Licenses</span></a></li>
            
            <li ng-class="{active:isActiveClass('User_management_user')}" ng-click="page.addTab('Employee Management', '/company/employee/index', 'User_management_user'); activeStateCheck('User_management_user')"><a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/user_management.png"/></span><span class="menu_name hide">Employee Management</span></a></li>
            
<!--            <li><a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/sourcedata.png"/></span><span class="menu_name hide"> Source Data</span></a></li>-->
            <li ng-class="{active:isActiveClass('manage_roles')}" ng-click="page.addTab('Manage Roles', '/company/role/index', 'manage_roles'); activeStateCheck('manage_roles')"><a href="javascript:"><span class="icon_spc left_imgs">
                        <img alt="" src="../images/share.png"/></span><span class="menu_name hide"> Manage Roles</span></a>
            </li>
            <li ng-class="{active:isActiveClass('manage_profiles')}" ng-click="page.addTab('Manage Profile', '/company/profiles', 'manage_profiles'); activeStateCheck('manage_profiles')">
                <a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/manage_profiles.png"/></span><span class="menu_name hide">Manage Profiles</span></a>
            </li>  
            <li ng-class="{active:isActiveClass('state_licensing')}" ng-click="page.addTab('State Licenses', '/company/software_licensing/state_licensing', 'state_licensing'); activeStateCheck('state_licensing')">
                <a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/state_licencing.png"/></span><span class="menu_name hide">State Licensing</span></a>
            </li>  
            <li ng-class="{active:isActiveClass('manage_lenders')}" ng-click="page.addTab('Manage Lenders', '/company/lenders', 'manage_lenders'); activeStateCheck('manage_lenders')">
                <a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/manage_lenders.png"/></span><span class="menu_name hide">Manage Lenders</span></a>
            </li>  
            <li ng-class="{active:isActiveClass('loan_programs')}" ng-click="page.addTab('Programs & Pricing', '/company/loans', 'loan_programs'); activeStateCheck('loan_programs')">
                <a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/loan_programs.png"/></span><span class="menu_name hide">Loan Programs</span></a>
            </li>  
            <li ng-class="{active:isActiveClass('loan_fees')}" ng-click="page.addTab('Loan Fees', '/company/loanfees', 'loan_fees'); activeStateCheck('loan_fees')">
                <a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/loan_fees.png"/></span><span class="menu_name hide">Loan Fees</span></a>
            </li>  
            <li ng-class="{active:isActiveClass('settings')}" ng-click="page.addTab('Settings', '/company/employee/setting', 'settings'); activeStateCheck('settings')">
                <a href="javascript:"><span class="icon_spc left_imgs"><img alt="" src="../images/settings.png"/></span><span class="menu_name hide">Settings</span></a>
            </li>  
 <!-- <li id="snd_msg_li"><a href="javascript:"><span class="icon_spc send_icon_hyt"><img alt="" src="../../images/send_icon.png"></span><span class="menu_name hide">Send Message</span></a></li> -->
        </ul>
        <!--<div class="col-md-11  clearfix send_msg_icon show" id="send_msg_icn"><p><a class="snd_msg" data-target="#myModal4" data-toggle="modal" href="javascript:"><span><img alt="" src="../../images/send_icon.png"></span>Send Message</a></p></div>-->

    </div>
    <div class="col-md-12 copyryt show clearfix "><p>@ Copyright Reverse Advisor <span>
<!--                <a data-target="#myModal" data-toggle="modal" href="javascript:"> Terms &amp; Privacy</a>-->
                
                <a ng-click="openPopUp('get', '/developer/superadmin/superadmin/termsAndPrivacy', 'trms_services')"  href="#"> Terms &amp; Privacy</a>
            
            
            </span></p></div>

</section>


<!--<section class="left_sidebar ">

<!--<nav class="navbar navbar-default compny_admin_leftbar  ">

<!-- Brand and toggle get grouped for better mobile display -->
<!--<div class="navbar-header ">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="javascript:"><img src="/images/logo.png" class="img-responsive" alt="" /></a>
</div>-->

<!-- Collect the nav links, forms, and other content for toggling -->
<!--<div class="collapse navbar-collapse spc " id="bs-example-navbar-collapse-1">

    <ul class="nav navbar-nav sidebarMenus">

        <li ng-class="{active:isActiveClass('software_licensing')}" ng-click="page.addTab('Software Licenses', '/company/software_licensing/json', 'software_licensing'); activeStateCheck('software_licensing')">
            <a href="javascript:void(0);"><img src="/images/software.png" alt="" />Software Licenses</a>
        </li>

        <li ng-class="{active:isActiveClass('User_management_user')}" ng-click="page.addTab('Employee Management', '/company/employee/index', 'User_management_user'); activeStateCheck('User_management_user')"><a href="javascript:void(0);"><img src="/images/user_management.png" alt="" />Employee Management</a>
        </li>

        <li ng-class="{active:isActiveClass('manage_roles')}" ng-click="page.addTab('Manage Roles', '/company/role/index', 'manage_roles'); activeStateCheck('manage_roles')">
            <a href="javascript:void(0);"><img alt="" src="/images/share.png">Manage Roles</a>
        </li>

        <li ng-class="{active:isActiveClass('manage_profiles')}" ng-click="page.addTab('Manage Profile', '/company/profiles', 'manage_profiles'); activeStateCheck('manage_profiles')">
            <a href="javascript:void(0);"><img alt="" src="/images/manage_profiles.png">Manage Profiles</a>
        </li>

        <li ng-class="{active:isActiveClass('state_licensing')}" ng-click="page.addTab('State Licenses', '/company/software_licensing/state_licensing', 'state_licensing'); activeStateCheck('state_licensing')">
            <a href="javascript:void(0);"><img src="/images/state_licencing.png" alt=""/>State Licensing</a>
        </li>

        <li ng-class="{active:isActiveClass('manage_lenders')}" ng-click="page.addTab('Manage Lenders', '/company/lenders', 'manage_lenders'); activeStateCheck('manage_lenders')">
            <a href="javascript:void(0);"><img alt="Manage Lenders" src="/images/manage_lenders.png">Manage Lenders</a>
        </li>
        
        <li ng-class="{active:isActiveClass('loan_programs')}" ng-click="page.addTab('Programs & Pricing', '/company/loans', 'loan_programs'); activeStateCheck('loan_programs')">
            <a href="javascript:void(0);"><img alt="" src="/images/loan_programs.png">Loan Programs</a>
        </li>
        
        <li ng-class="{active:isActiveClass('loan_fees')}" ng-click="page.addTab('Loan Fees', '/company/loanfees', 'loan_fees'); activeStateCheck('loan_fees')">
            <a href="javascript:void(0);"><img alt="" src="/images/loan_fees.png">Loan Fees</a>
        </li>
        <li ng-class="{active:isActiveClass('settings')}" ng-click="page.addTab('Settings', '/company/employee/setting', 'settings'); activeStateCheck('settings')">
       <a href="javascript:void(0);"><img alt="" src="/images/settings.png">Settings</a>
        </li>


    </ul>

    <div class="clearfix"></div>


    <div class="col-md-12 copyryt clearfix"><p>@ Copyright Reverse Advisor <span><a href="javascript:" data-toggle="modal" data-target="#myModal"> Terms & Privacy</a></span></p></div>
</div>--><!-- /.navbar-collapse -->

</nav>

</section>