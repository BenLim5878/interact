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
            },
            showInLegend: false
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
function createPostPerDayChart() {
    Highcharts.chart('postPerDayStats', {
      chart:{
          type:'area'
      },
      title:{
          text: 'Trends of posts and replies'
      },
      credits:{
          enabled: false
      },
      yAxis:{
          title:{
              text: 'Number of post and reply'
          }
      },
      colors: ['#008F7A','#FFC75F'],
      xAxis: {
        title: {
        text: 'Date'        
        },
        categories: datePosted.reverse(),
        labels:{
            step: 3,
            rotation: -60
        }
      },
      tooltip:{
        animation:false,
        backgroundColor: '#333333',
        style:{
            color:'#fff',
        }
    },
      series:[{
          name: 'Posts',
          data: numberPostDay.reverse()
      },{
          name: 'Replies',
          data: numberReplyDay.reverse()
      }]
    })
  }

  function createCategoryTrends() {
    Highcharts.chart('categoryTrendStats', {
      chart:{
          type:'column'
      },
      title:{
          text: 'Total number of post by category'
      },
      credits:{
          enabled: false
      },
      yAxis:{
          title:{
              text: 'Number of post'
          }
      },
      colors: ['#00BEFF'],
      xAxis: {
        categories: listCategory.reverse()
      },
      tooltip:{
        animation:false,
        backgroundColor: '#333333',
        style:{
            color:'#fff',
        }
    },
      series:[{
          name: 'Category',
          showInLegend: false,
          data: totalPostInCategory.reverse()
      }]
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
  function createViewPerCategory() {
    Highcharts.chart('categoryViewStats', {
      chart:{
          type:'line'
      },
      title:{
          text: 'Total views by post category'
      },
      credits:{
          enabled: false
      },
      yAxis:{
          title:{
              text: 'Number of view'
          }
      },
      colors: ['#3C8D8A'],
      xAxis: {
        categories: listCategory.reverse()
      },
      tooltip:{
        animation:false,
        backgroundColor: '#333333',
        style:{
            color:'#fff',
        },
    },
      series:[{
          name: 'Views',
          data: totalViewInCategory
      }]
    })
  }
