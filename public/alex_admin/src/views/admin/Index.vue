<!--
 * @Author: your name
 * @Date: 2020-08-05 14:29:11
 * @LastEditTime: 2020-08-13 19:10:57
 * @LastEditors: 1045998323@qq.com
 * @Description: In User Settings Edit
 * @FilePath: /alex_admin/src/views/About.vue
-->
<template>
  <div class="app-container">
    <div class="filter-container">
      <el-input v-model="listQuery.user_name" placeholder="User Name" style="width: 200px;" class="filter-item" @keyup.enter.native="handleFilter" />
      <el-select v-model="listQuery.status" placeholder="Status" clearable class="filter-item" style="width: 130px">
        <el-option v-for="item in StatusOptions" :key="item.key" :label="item.label" :value="item.key" />
      </el-select>
      <el-button class="filter-item" type="primary" icon="el-icon-search" @click="handleFilter">
        Search
      </el-button>
      <el-button class="filter-item" style="margin-left: 10px;" type="primary" icon="el-icon-edit" @click="handleCreate">
        Add
      </el-button>
      <el-button :loading="downloadLoading" class="filter-item" type="primary" icon="el-icon-download" @click="handleDownload">
        Export
      </el-button>
      <el-checkbox v-model="showReviewer" class="filter-item" style="margin-left:15px;" @change="tableKey=tableKey+1">
        reviewer
      </el-checkbox>
    </div>
    <el-table
      v-loading="listLoading"
      :data="list"
      element-loading-text="Loading"
      border
      fit
      highlight-current-row
    >
      <el-table-column align="center" label="ID" width="95">
        <template slot-scope="scope">
          {{ scope.row.id }}
        </template>
      </el-table-column>

      <el-table-column label="User Name">
        <template slot-scope="scope">
          {{ scope.row.user_name }}
        </template>
      </el-table-column>

      <el-table-column class-name="status-col" label="Status" width="110" align="center">
        <template slot-scope="scope">
          <el-tag :type="scope.row.status | statusFilter">{{ scope.row.status | statusView }}</el-tag>
        </template>
      </el-table-column>
      <el-table-column align="center" prop="created_at" label="Display_time" width="200">
        <template slot-scope="scope">
          <i class="el-icon-time" />
          <span>{{ scope.row.created }}</span>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
import AdminApi from '@/api/admin'
import Cookie from '@/plugins/cookie'
export default {
  name: 'AdminIndex',
  filters: {
    statusFilter(status) {
      const statusMap = {
        '1': 'success',
        '0': 'gray',
        deleted: 'danger'
      }
      return statusMap[status]
    },
    statusView(status) {
      var text = '未知'
      switch (status) {
        case '0':
          text = '无效'
          break
        case '1':
          text = '有效'
          break
        default:
          break
      }
      return text
    }
  },
  data() {
    return {
      list: null,
      listLoading: true,
      listQuery: {
        page: 1,
        limit: 20,
        importance: undefined,
        user_name: undefined,
        type: undefined,
        status: undefined
      },
      StatusOptions: [{ label: '有效', key: '1' }, { label: '无效', key: '0' }],
      downloadLoading: false,
      showReviewer: false
    }
  },
  created() {
    this.getList()
  },
  methods: {
    getList() {
      this.listLoading = true
      var searchParams = {
        search: '',
        searchJoin: 'and'
      }
      if (this.listQuery.user_name) searchParams.search += ('user_name:' + this.listQuery.user_name)
      if (this.listQuery.status) {
        if (searchParams.search) searchParams.search += ';'
        searchParams.search += ('status:' + this.listQuery.status)
      }
      AdminApi.getList(searchParams).then(response => {
        this.list = response.data.data
        this.listLoading = false
      })
    },
    handleFilter() {
      this.listQuery.page = 1
      this.getList()
    },
    handleCreate() {
      this.resetTemp()
      this.dialogStatus = 'create'
      this.dialogFormVisible = true
      this.$nextTick(() => {
        this.$refs['dataForm'].clearValidate()
      })
    },
    handleDownload() {
      // this.downloadLoading = true
      var searchParams = {
        search: '',
        searchJoin: 'and'
      }
      if (this.listQuery.user_name) searchParams.search += ('user_name:' + this.listQuery.user_name)
      if (this.listQuery.status) {
        if (searchParams.search) searchParams.search += ';'
        searchParams.search += ('status:' + this.listQuery.status)
      }

      window.location.href = '/api/admin/export?token=' + Cookie.getToken() + '&searchJoin=' + searchParams.searchJoin + '&search=' + searchParams.search
      // AdminApi.exportExcel(searchParams).then(response => {
      //   this.list = response.data.data
      //   this.listLoading = false
      // })
    }
  }
}

</script>
