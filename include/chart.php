<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<div id="proportionUserStats"></div>
<div id="categoryPostStats"></div>
<script src="/include/chart.js"></script>
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
                countPostCategory = response.countPostCategory;
                for (let index = 0; index < countPostCategory.length; index++) {
                    var integer = parseInt(countPostCategory[index], 10)
                    countPostCategory[index] = integer

                }
                createUserProportionChart(proportionUserStats, 'Proportion of user by role', '#E05168', '#42537B', 'Member', proportionMember, 'Moderator', proportionModerator);
                createCategoryPerPost();
            }
        });
    }
</script>