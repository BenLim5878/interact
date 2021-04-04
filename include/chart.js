function createUserProportionChart(container,title,color1,color2,name1,proportionMember,name2,proportionModerator) {
  Highcharts.chart(container, {
    chart:{
        type:'pie'
    },
    title:{
        text: title
    },
    credits:{
        enabled: false
    },
    plotOptions:{
        pie:{
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels:{
                enabled: true
            }
        }
    },
    colors: [color1,color2],
    tooltip:{
        animation:false,
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
        backgroundColor: '#333333',
        style:{
            color:'#fff'
        }
    },
    series: [
        {
            name: 'percentage',
            colorByPoint: true,
            data:[{
                name: name1,
                y: proportionMember
            },
            {
                name: name2,
                y: proportionModerator
            }]
        }
    ]
  })
}
function createCategoryPerPost() {
    Highcharts.chart('categoryPostStats', {
      chart:{
          type:'column'
      },
      title:{
          text: 'Total post by number of category'
      },
      credits:{
          enabled: false
      },
      yAxis:{
          title:{
              text: 'Number of post'
          }
      },
      colors: ['#738AE6'],
      xAxis: {
        categories: [1,2,3]
      },
      tooltip:{
        animation:false,
        backgroundColor: '#333333',
        style:{
            color:'#fff',
        }
    },
      series:[{
          name: 'Total category',
          showInLegend: false,
          data: countPostCategory
      }]
    })
  }