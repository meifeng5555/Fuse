# ������Ϣ 
* �ļ���: Fuse.php
* ��&nbsp;&nbsp;��: Fuse
* ��&nbsp;&nbsp;��: meijinfeng
* ��&nbsp;&nbsp;��: ���ָ��Function������ʱ������������
* Ŀ&nbsp;&nbsp;¼: 605590351@qq.com

# ��Ա���� 
* print: int���ͣ�Ĭ��Ϊ0���Ƿ����й��̴�ӡ�ڿ���̨��

# ��ķ��� 
* funcStartRecord($funcName): ��¼Function���п�ʼ����ʱ�Ļ�������
* funcEndRecord(): ��¼Function���н���ʱ�Ļ�������
* checkParamType($param, $descType): �жϲ�������
* formatRam($ram): ��ʽ���ֽ�����
* run($typeArr, $funcParam)
 > �������ܣ�ִ��Function
 > ����������
 > $typeArr['showTime'] int 0-1 default 0
 > $typeArr['showRam'] int 0-1 default 0
 > $typeArr['classObj'] object default '': ��������ڲ�������Ҫ�õ��˲���
 > $funcParam['name'] string func��
 > $funcParam['args'] array  func����

# ʹ�� 
* ʵ����Fuse������run����