<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic DataGrid - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="../jquery-easyui-1.4.4/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../jquery-easyui-1.4.4/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.4.4/demo.css">
    <script type="text/javascript" src="../jquery-easyui-1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="../jquery-easyui-1.4.4/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../jquery-easyui-1.4.4/datagrid-filter.js"></script>
</head>
<body>


    <h2>Basic DataGrid</h2>
	<style>
		.icon-filter{
			background:url('filter.png') no-repeat center center;
		}
	</style>

<script>



$(function(){
			var dg = $('#dg').datagrid({
				filterBtnIconCls:'icon-filter'
			});
			dg.datagrid('enableFilter', [{
				field:'CompanyName',
				type:'numberbox',
				options:{precision:1},
				op:['equal','notequal','less','greater']
			},{
				field:'ContactName',
				type:'numberbox',
				options:{precision:1},
				op:['equal','notequal','less','greater']
			},{
				field:'ContactTitle',
				type:'text',
				options:{
					panelHeight:'auto',
					onChange:function(value){
						if (value == ''){
							dg.datagrid('removeFilterRule', 'status');
						} else {
							dg.datagrid('addFilterRule', {
								field: 'status',
								op: 'equal',
								value: value
							});
						}
						dg.datagrid('doFilter');
					}
				}
			}]);
		});
	</script>

</script>


    <p>The DataGrid is created from markup, no JavaScript code needed.</p>
    <div style="margin:20px 0;"></div>
    
    <table id="dg" class="easyui-datagrid" title="Basic DataGrid" style="width:700px;height:250px"
            data-options="singleSelect:true,collapsible:true,url:'data.php?CompanyName=Target',method:'get'">
        <thead>
            <tr>
                <th data-options="field:'CompanyName',width:80">Company Name</th>
                <th data-options="field:'ContactName',width:100">Contact Name</th>
                <th data-options="field:'ContactTitle',width:80,align:'right'">Contact Title</th>
                <th data-options="field:'unitcost',width:80,align:'right'">Address</th>
                <th data-options="field:'attr1',width:250">Attribute</th>
                <th data-options="field:'status',width:60,align:'center'">Status</th>
            </tr>
        </thead>
    </table>
 
</body>
</html>

	
	
 
</body>
</html>