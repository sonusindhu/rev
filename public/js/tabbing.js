
$(document).ready(function () {
    //on  key up remove the validation
    $("body ").on('keyup', 'input', function () {
        $this = $(this);
        var len = $(this).val().length;
        if (len > 0)
        {
            $this.next('.error-message').addClass('hide');
        }
        else
        {
            $this.next('.error-message').removeClass('hide');
        }
    });
    //function to create the tab view and calling the corresponding view
    function addTab(link, tabName, tabNameIs) {

        // add new tab and related content
        if (tabName == "Dashboard")
        {
            $("#myTabs li").removeClass("hide");
            $("#myTabs li").removeClass("active");
            $(".permanent").addClass("active");
            $("#myTabContent div #home").removeClass('hide');
            $("#myTabContent div #home").addClass('active');
            $("#myTabContent div #forDashboardOnly").removeClass('hide');
            $("#myTabContent div #forDashboardOnly").addClass('active');


        }
        else
        {
            $("#myTabs li").removeClass("hide");
            $("#myTabs li").removeClass("active");
            $("#myTabs").append('<li class="active" role="presentation"><a aria-expanded="false" href="#' + tabNameIs + '" role="tab" id="profile-tab" data-toggle="tab" aria-controls="' + tabNameIs + '">' + tabName + '<span class="close_tab"><i class="fa fa-close active-i"></i></span></a></li>');

        }
        $.ajax({
            dataType: 'html',
            type: 'Post',
            data: {tabName: tabName},
            url: link,
            success: function (data) {
                if (data)
                {

                    $("#myTabContent div").children().removeClass('active');
                    $("#myTabContent div").children().removeClass('in');
                    $("#myTabContent div").children().next().removeClass('active');
                    $("#myTabContent div").children().next().removeClass('in');
                    $("#myTabContent").children().addClass('hide');
                    $("#myTabContent").append(data);
                }

            }

        });

    }
    //on click of anchor create the tab,call the function
    $('body').on('click', '#myTabs a, .left_sidebar li a,#forDashboardOnly #createComapny, #COMPANYLICENSE a', function () {
          var link = $(this).attr('link');
        var tabName = $(this).text();
        //   console.log(tabName);
//                 if (tabName != "Dashboard")   
//                 {
        var tabNameIs = tabName.replace(/ +/g, "");
        if ((tabName == "Dashboard") || (tabName == "COMPANY LICENSE"))
        {
            tabName = "COMPANY LICENSE";
            tabNameIs = "COMPANYLICENSE"
        }
        else
        {
            tabName = tabName;
            tabNameIs = tabNameIs;
        }
var totalTabs=$('#myTabs li').length +1;


        if ($('#myTabs li:contains(' + tabName + ')').length) {
            //exists then only active that already created
            $("#myTabs li").removeClass("active");
            $('#myTabs li:contains(' + tabName + ')').addClass('active');
        }
        else {
          //  if(totalTabs<=3)
            //{
            // $('.more').addClass('hide');
            //if not exist then create the tab
            addTab(link, tabName, tabNameIs);
            //}
          /*  else
            {
               
                
             if ($("body #myTabs li").hasClass('more')) {
                 alert("Already There"); 
              }  
              else
              {
              $("#myTabs").append('<li role="presentation" class="dropdown active more  open"><a aria-expanded="true" href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">More <span class="caret"></span></a> <ul class="dropdown-menu forMoreTabs" aria-labelledby="myTabDrop1" id="myTabDrop1-contents"></ul></li>');
          }
                
                

            }*/
        }
      



    });
    //caling the page on tab click based on page id
    $('body').on('click', '#myTabs li a', function () {
        var pageId = $(this).attr('aria-controls');
        $(".left_sidebar ul li").removeClass('active');
        $(".navbar-nav  li a[href='" + "#" + pageId + "']").parent('li').addClass('active');
        CallingPageOnTabAndSidebar(pageId)

    });
    //caling the page on link click  from side bar
    $('body').on('click', '.left_sidebar li a', function () {
        var pageLink = $(this).attr('href');
        var pageId = pageLink.replace("#", "");
        $(".left_sidebar ul li").removeClass('active');
        $(this).parent().addClass('active');
        CallingPageOnTabAndSidebar(pageId)

    })
    //function for tabbing and page content call from sidebar and tabs
    function CallingPageOnTabAndSidebar(pageId)
    {
        $("#myTabContent ").each(function () {
            jQuery(this).children().addClass('hide');
        });
        if (pageId == "home")
        {
            $("#forDashboardOnly").removeClass('hide');
            $("#forDashboardOnly").addClass('active');
            $("#home").removeClass('hide');
            $("#home").addClass('active');
        }

        $("#myTabContent").children("#" + pageId).removeClass('hide');
        $("#myTabContent").children("#" + pageId).addClass('in');
        $("#myTabContent").children("#" + pageId).addClass('active');
    }
    //removing the tabs and html by clicking on close
    $(document).on("click", ".fa-close", function () {
        var getHtmlIdInfo = $(this).parent().parent().attr("href");
        var getHtmlId = getHtmlIdInfo.replace(/#/g, "");
        var totalTabs = $('#myTabs li').length;
        var newLen = totalTabs - 1;
        var indexVal = $(this).parent().parent().parent().index();
        $("#myTabs li").removeClass('active');

        if (indexVal == 0)
        {

            // add the active to next of current closing tab

            $(this).parent().parent().parent().next().addClass('active');
            // removing the hide from the content of next of current closing tab related data
            var theHtmlIdIs = $(this).parent().parent().parent().next().children().attr("aria-controls");

        }
        else if (newLen > 0)
        {

            // add the active to next of current closing tab

            $(this).parent().parent().parent().prev().addClass('active');
            // removing the hide from the content of next of current closing tab related data
            var theHtmlIdIs = $(this).parent().parent().parent().prev().children().attr("aria-controls");
        }

        if (newLen == 0)
        {
            var theHtmlIdIs = "home";
            $("#myTabContent").children().addClass('hide');
            $("#forDashboardOnly").removeClass('hide');
            $("#forDashboardOnly").addClass('active');
            $("#home").removeClass('hide');
            $("#home").addClass('active');
        }
        else
        {
            $("#myTabContent").children().addClass('hide');
            $("#myTabContent #" + theHtmlIdIs).removeClass('hide');
            // adding the active/in to the content data of related open tab
            $("#myTabContent #" + theHtmlIdIs).addClass('in');
            $("#myTabContent #" + theHtmlIdIs).addClass('active');
        }
        //remove the current tab
        $(this).parent().parent().parent().remove();
        //removing the related html from page resp of tab
        $("#myTabContent #" + getHtmlId).remove();
        // $("#myTabContent #" + getHtmlId).addClass('hide');
    });
    //on click of stats from dashboard 
    $('body').on('click', '.grph_dv a,#mngLicenses a', function () {
        var link = $(this).attr('link');
        var tabName = $(this).attr('tabname');
        var tabNameIs = tabName.replace(/ +/g, "");
         if ($('#myTabs li:contains(' + tabName + ')').length) {
            //exists then only active that already created
            $("#myTabs li").removeClass("active");
            $('#myTabs li:contains(' + tabName + ')').addClass('active');
        }
        else {
            //if not exist then create the tab
            addTab(link, tabName, tabNameIs);
        }
        
    });
});

$(document).ready(function () {
    $('#myTabs').tabCollapse();
});
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-orange',
    radioClass: 'iradio_square-orange',
    increaseArea: '20%' // optional
  });
    });
    
   



