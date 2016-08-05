<script src="{!! asset('/js/angular.min.js') !!}"></script>
        <script src="{!! asset('/js/ui-bootstrap-tpls.min.js') !!}"></script>
        <script src="{!! asset('/js/angular-file-upload.js') !!}"></script>
        <script src="{!! asset('/js/angular-sanitize.min.js') !!}"></script>
        <script src="{!! asset('/js/ckeditor/ckeditor.js') !!}"></script>
        
        
        <!-- include our JavaScript -->
        <script src="{!! asset('/js/app.js') !!}"></script>
        <script src="{!! asset('/js/role.js') !!}"></script>
        <script src="{!! asset('/js/employee.js') !!}"></script>
        <script src="{!! asset('/js/company_custom.js') !!}"></script>

        
        <style>
            .error-message {
                color: #ff0f14;
                font-size: 14px;
                margin-top: -13px;
                position: absolute;
                top: 50px;
            }
            .error_border{
                border: 1px solid red !important;
            }
            input.ng-invalid-pattern{
                border: 1px solid red !important;
            }
            .portfolioloader {
                background: rgba(255, 255, 255, 0.5) none repeat scroll 0 0;
                border-radius: 50%;
                bottom: 48%;
                height: 94px;
                left: 0;
                margin: 0 auto;
                position: fixed;
                right: 0;
                top: 48%;
                width: 100px;
                z-index: 1000001;
            }

        </style>
        <div class="portfolioloader" style="display: none;"><img src="{!! asset('/img/loaderimage.gif') !!}"></div>
        
 <input id="logoutSetting" type="hidden" value="<?php echo @$settingsAre['SuperadminSetting']['logout_time']; ?>"  not_auto_logout_users="<?php echo @$settingsAre['SuperadminSetting']['not_auto_logout_users'] ?>"/>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

    </body>
</html>