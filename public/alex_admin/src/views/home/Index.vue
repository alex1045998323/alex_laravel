<!--
 * @Author: your name
 * @Date: 2020-08-05 14:29:11
 * @LastEditTime: 2020-08-12 17:10:42
 * @LastEditors: 1045998323@qq.com
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin/src/views/About.vue
-->
<template>
  <div>
    <el-row>
      <el-col :span="12">
        <v-chart theme="macarons" :options="polar" />
      </el-col>
      <el-col :span="12">
        <v-chart theme="macarons" :options="option2" />
      </el-col>
    </el-row>
  </div>
</template>

<script>
import ECharts from 'vue-echarts'
import 'echarts/lib/component/legend'
import 'echarts/lib/chart/pie'
import 'echarts/lib/chart/bar'
import 'echarts/theme/macarons.js'

export default {
  name: 'HomeIndex',
  components: {
    'v-chart': ECharts
  },
  data() {
    var data = []

    for (let i = 0; i <= 360; i++) {
      var t = i / 180 * Math.PI
      var r = Math.sin(2 * t) * Math.cos(2 * t)
      data.push([r, i])
    }
    return {
      polar: {
        title: {
          text: '会员数据统计',
          subtext: '动态数据',
          x: 'center'
        },
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
          show: true,
          orient: 'vertical',
          left: 'left',
          data: ['微信访问', '公众号访问', '扫码进入', '分享进入', '搜索访问']
        },
        series: [
          {
            name: '访问来源',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data: [
              { value: 335, name: '微信访问' },
              { value: 310, name: '公众号访问' },
              { value: 234, name: '扫码进入' },
              { value: 135, name: '分享进入' },
              { value: 1548, name: '搜索访问' }
            ],
            itemStyle: {
              emphasis: {
                shadowBlur: 10,
                shadowOffsetX: 0,
                shadowColor: 'rgba(0, 0, 0, 0.5)'
              }
            }
          }
        ]
      },
      option2: {
        legend: {},
        tooltip: {},
        dataset: {
          source: [
            ['product', '2012', '2013', '2014', '2015'],
            ['Matcha Latte', 41.1, 30.4, 65.1, 53.3],
            ['Milk Tea', 86.5, 92.1, 85.7, 83.1],
            ['Cheese Cocoa', 24.1, 67.2, 79.5, 86.4]
          ]
        },
        xAxis: [
          { type: 'category', gridIndex: 0 },
          { type: 'category', gridIndex: 1 }
        ],
        yAxis: [
          { gridIndex: 0 },
          { gridIndex: 1 }
        ],
        grid: [
          { bottom: '55%' },
          { top: '55%' }
        ],
        series: [
          // These series are in the first grid.
          { type: 'bar', seriesLayoutBy: 'row' },
          { type: 'bar', seriesLayoutBy: 'row' },
          { type: 'bar', seriesLayoutBy: 'row' },
          // These series are in the second grid.
          { type: 'bar', xAxisIndex: 1, yAxisIndex: 1 },
          { type: 'bar', xAxisIndex: 1, yAxisIndex: 1 },
          { type: 'bar', xAxisIndex: 1, yAxisIndex: 1 },
          { type: 'bar', xAxisIndex: 1, yAxisIndex: 1 }
        ]
      }
    }
  }
}

</script>
