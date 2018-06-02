# 基础信息 
* 文件名: Fuse.php
* 类&nbsp;&nbsp;名: Fuse
* 作&nbsp;&nbsp;者: meijinfeng
* 功&nbsp;&nbsp;能: 检查指定Function的运行时长及消耗详情
* 目&nbsp;&nbsp;录: 605590351@qq.com

# 成员属性 
* print: int类型，默认为0，是否将运行过程打印在控制台。

# 类的方法 
* funcStartRecord($funcName): 记录Function运行开始运行时的基础数据
* funcEndRecord(): 记录Function运行结束时的基础数据
* checkParamType($param, $descType): 判断参数类型
* formatRam($ram): 格式化字节数据
* run($typeArr, $funcParam)
 > 方法功能：执行Function
 > 方法参数：
 > $typeArr['showTime'] int 0-1 default 0
 > $typeArr['showRam'] int 0-1 default 0
 > $typeArr['classObj'] object default '': 调用类的内部方法需要用到此参数
 > $funcParam['name'] string func名
 > $funcParam['args'] array  func参数

# 使用 
* 实例化Fuse，运行run方法
