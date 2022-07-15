<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<div id="proportionUserStats"></div>
<div id="postPerDayStats"></div>
<div id="categoryTrendStats"></div>
<div id="categoryPostStats"></div>
<div id="categoryViewStats"></div>
<script src="/include/insights-chart.js"></script>
<script>
    var proportionMember = '';
    var proportionModerator = '';
    var proportionPost = '';
    var proportionReply = '';
    $(document).ready(function() {
        retrieveData();
    });

    function retrieveData() {
        $.ajax({
            type: "GET",
            url: "/include/retrieveChartData.php",
            dataType: "json",
            success: function(response) {
                proportionMember = response.proportionMember;
                proportionModerator = response.proportionModerator;
                numberPostDay = response.numberPostDay;
                datePosted = response.datePosted;
                numberReplyDay = response.numberReplyDay;
                listCategory = response.listCategory;
                totalPostInCategory = response.totalPostInCategory;
                countPostCategory = response.countPostCategory;
                totalViewInCategory = response.totalViewInCategory;
                for (let index = 0; index < numberPostDay.length; index++) {
                    var integer = parseInt(numberPostDay[index], 10)
                    numberPostDay[index] = integer;
                    var integer2 = parseInt(numberReplyDay[index], 10)
                    numberReplyDay[index] = integer2;
                }
                for (let index = 0; index < totalPostInCategory.length; index++) {
                    var integer = parseInt(totalPostInCategory[index], 10)
                    totalPostInCategory[index] = integer
                    var integer2 = parseInt(totalViewInCategory[index], 10)
                    totalViewInCategory[index] = integer2
                }
                for (let index = 0; index < countPostCategory.length; index++) {
                    var integer = parseInt(countPostCategory[index], 10)
                    countPostCategory[index] = integer

                }
                createUserProportionChart(proportionUserStats, 'Proportion of user by role', '#E05168', '#42537B', 'Member', proportionMember, 'Moderator', proportionModerator);
                createPostPerDayChart();
                createCategoryTrends();
                createCategoryPerPost();
                createViewPerCategory();
            }
        });
    }
</script>