<?php
/**
 * @desc ���Function����ʱ����������
 * @name Fuse.php
 * @date 2018-05-08
 * @author 605590351@qq.com
 */
class Fuse {

    public $print = 0;

    public function funcStartRecord($funcName) {
        $ram = memory_get_usage();
        list($usec, $sec) = explode(" ",microtime());
        $time = date('Y-m=d H:i:s');

        if ($this->print == 1) {
            printf("------------Function:[%s]------------\n", $funcName);
            printf("[%s]��ʼ����\n", $time);
        }

        $timeuse = (float)$usec - (float)$sec;
        return $timeuse.",".$ram;
    }

    public function funcEndRecord() {
        $ram = memory_get_usage();
        list($usec, $sec) = explode(" ", microtime());
        $time = date("Y-m-d H:i:s");

        if ($this->print == 1) {
            printf("[%s]���н���\n", $time);
        }

        $timeuse = (float)$usec - (float)$sec;
        return $timeuse.",".$ram;
    }

    /**
     * @desc ����Function
     * @name run
     * @param array   $typeArr
     * @param int     $typeArr['showTime'] 0-1 default 0
     * @param int     $typeArr['showRam']  0-1 default 0
     * @param object  $typeArr['classobj']     default ''
     * @param array   $funcParam
     * @param string  $funcParam['name'] func����
     * @param array   $funcParam['args'] func����,û�оͲ���
     * @return array
     */
    public function run($typeArr, $funcParam) {
        if (!$this->checkParamType($typeArr, 'array') ||
            !$this->checkParamType($funcParam, 'array')) {
            return "Param type illegal";
        }
        $typeArr['showTime'] = !isset($typeArr['showTime']) ? 0 : $typeArr['showTime'];
        $typeArr['showRam'] = !isset($typeArr['showRam']) ? 0 : $typeArr['showRam'];

        list($timeS, $ramS) = explode(",", $this->funcStartRecord($funcParam['name']));

        if (!isset($funcParam['args'])) {
            empty($typeArr['classObj']) ?
                call_user_func($funcParam['name']) :
                call_user_func([$typeArr['classObj'], $funcParam['name']]);
        } else {
            empty($typeArr['classObj']) ?
                call_user_func_array($funcParam['name'], $funcParam['args']) :
                call_user_func_array([$typeArr['classObj'], $funcParam['name']], $funcParam['args']);
        }

        list($timeE, $ramE) = explode(",", $this->funcEndRecord());

        $retArr = [];

        if ($typeArr['showTime'] == 1) {
            $timeDiff = $timeE - $timeS;
            $retArr['useTime'] = round($timeDiff, 6);
            if ($this->print == 1) printf("���к�ʱ:[%.03f]��\n", $timeDiff);
        }

        if ($typeArr['showRam'] == 1) {
            $ramDiff = $ramE - $ramS;
            $ramDiff = $this->formatRam($ramDiff);
            $retArr['useRam'] = $ramDiff;
            if ($this->print == 1) printf("�����ڴ�:%s\n", $ramDiff);
        }

        return $retArr;
    }

    public function checkParamType($param, $descType) {
        $func = 'is_'.$descType;
        return $func($param);
    }

    public function formatRam($ram) {
        if ($ram >= 1024) {
            $ram = round($ram / 1024, 2);
            if ($ram >= 1024) {
                $ram = round($ram / 1024, 2);
                return "[{$ram}]Mb";
            }
            return "[{$ram}]Kb";
        } else {
            return "[{$ram}]byte";
        }
    }
}