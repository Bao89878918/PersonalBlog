<template>
    <div class="continar clearfix">
        <div class="header-btn">
            <el-button type="danger"><i class="el-icon-delete"></i> 批量删除</el-button>
            <el-button type="primary"><i class="el-icon-edit"></i> 增加</el-button>
        </div>
        <el-table :data="tableData3" tooltip-effect="dark" border class="article-table" @selection-change="handleSelectionChange">
            <el-table-column align="center" type="selection" width="55">
            </el-table-column>
            <el-table-column prop="title" label="标题" align="center" show-overflow-tooltip>
                
            </el-table-column>
            <el-table-column prop="author" label="作者" align="center" width="100">
            </el-table-column>
            <el-table-column prop="address" label="阅读量" align="center">
            </el-table-column>
            <el-table-column prop="address" label="点赞数" align="center">
            </el-table-column>
            <el-table-column prop="address" label="评论数" align="center">
            </el-table-column>
            <el-table-column label="日期" align="center">
                <template slot-scope="scope">{{ scope.row.date }}</template>
            </el-table-column>
            <el-table-column label="操作" width="180">
                <el-button type="danger"><i class="el-icon-delete"></i> 删除</el-button>
                <el-button type="primary"><i class="el-icon-edit"></i> 修改</el-button>
            </el-table-column>
        </el-table>
        <div class="page">
            <el-pagination background @current-change="handleCurrentChange" layout="prev, pager, next" :total=total_nums>
            </el-pagination>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
        return {
            cur_page:1,
            total_nums:100,
            tableData3: [
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                },
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                },
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                },
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, 
                {
                    title:'文章标题',
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }
            ],
            multipleSelection: []
        }
    },

    methods: {
        toggleSelection(rows) {
            if (rows) {
                rows.forEach(row => {
                    this.$refs.multipleTable.toggleRowSelection(row);
                });
            } else {
                this.$refs.multipleTable.clearSelection();
            }
        },
        handleCurrentChange(val) {
            this.cur_page = val;
        },
        handleSelectionChange(val) {
            this.multipleSelection = val;
        }
    }
  }
</script>
<style>
    .header-btn{
        padding:10px;
        margin-bottom:5px;
    }
    .article-table{
        margin:0 auto;
        width: 95%;
    }
    .page{
        float:right;
        margin-top:20px;
    }
</style>