<section class="hdr">
    <div class="container_fluid">
        <div class="">
            <div class="col-md-12 ">
                <div class="col-md-4 col-sm-4 logo_dv  spc">
                    <a href="#"><img src="images/logo.png" alt="" class="img-responsive"/></a>
                </div>
                <div class="col-md-6 col-sm-6 ryt_dv spc">
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="images/msg_icon.png" alt=""/><span class="notify">4</span> <span class="caret"></span></a>
                            <ul class="dropdown-menu msg_drpdwn">
                                <li>
                                    <a href="#">
                                        <span>

                                            <img src="images/profile_img.png" alt=""/>
                                        </span>
                                        <span class="online"></span><p><span>Andy Sent you Message</span></p>
                                        <span class="time_fnt">15 Minutes Ago</span>

                                    </a></li>
                                <li><a href="#"><span><img src="images/profile_img.png" alt=""/></span>
                                        <span class="offline"></span><p><span>Andy Sent you Message</span></p>
                                        <span class="time_fnt">15 Minutes Ago</span>

                                    </a></li>
                                <li><a href="#"><span> <?php
                                            if (!empty($findLoginEmployee['EmployeeDetail']['emp_image'])) {
                                                ?>
                                                <img src="upload/Employee/<?php echo $findLoginEmployee['EmployeeDetail']['emp_image']; ?>" alt=""/>
                                            <?php } else {
                                                ?>
                                                <img src="images/default-avatar.png" alt=""/>

                                            <?php } ?>


                                        </span>
                                        <span class="online"></span><p><span>Andy Sent you Message</span></p>
                                        <span class="time_fnt">15 Minutes Ago</span>

                                    </a></li>
                                <li><a href="#"><span><img src="images/profile_img.png" alt=""/></span>
                                        <span class="offline"></span><p><span>Andy Sent you Message</span></p>
                                        <span class="time_fnt">15 Minutes Ago</span>

                                    </a></li>
                                <li><a href="#"><span><img src="images/profile_img.png" alt=""/></span>
                                        <span class="online"></span><p><span>Andy Sent you Message</span></p>
                                        <span class="time_fnt">15 Minutes Ago</span>

                                    </a></li>
                                <li><a href="#"><span><img src="images/profile_img.png" alt=""/></span>
                                        <span class="offline"></span><p><span>Andy Sent you Message</span></p>
                                        <span class="time_fnt">15 Minutes Ago</span>

                                    </a></li>
                                <li>  <p class="see_more"><a href="#">See more</a></p></li>
                            </ul>

                        </li>
                        <li class="dropdown act_cls">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (!empty($findLoginEmployee['EmployeeDetail']['emp_image'])) { ?> <img src="<?php echo $this->webroot; ?>upload/Employee/<?php echo $findLoginEmployee['EmployeeDetail']['emp_image']; ?>" class="pro_img" alt=""/>
                                <?php }else{
                                    ?>
                                    <img src="images/default-avatar.png" class="pro_img" alt=""/> <?php } ?>      


                                <?php //echo $_SESSION['Auth']['User']['username']; ?> 
                                    <span class="caret"><i class="fa fa-angle-down"></i></span></a>
                            <ul class="dropdown-menu act_sbmenu">
                                <!--<li><a data-attr="company/users/setting" data-id="settings" data-name="Settings" href="javascript:void(0);">
                                        Settings <i class="fa fa-gear"></i></a></li>-->

                                <li>
                                    <a href="<?php echo 'login/logout'; ?>">Logout<i class="fa fa-power-off"></i> </a>
                                </li>



                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <span class="res_toggle">
        <i class="fa fa-navicon" aria-hidden="true"></i>
    </span>
</section>