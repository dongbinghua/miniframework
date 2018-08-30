<?php
// +---------------------------------------------------------------------------
// | Mini Framework
// +---------------------------------------------------------------------------
// | Copyright (c) 2015-2018 http://www.sunbloger.com
// +---------------------------------------------------------------------------
// | Licensed under the Apache License, Version 2.0 (the "License");
// | you may not use this file except in compliance with the License.
// | You may obtain a copy of the License at
// |
// | http://www.apache.org/licenses/LICENSE-2.0
// |
// | Unless required by applicable law or agreed to in writing, software
// | distributed under the License is distributed on an "AS IS" BASIS,
// | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// | See the License for the specific language governing permissions and
// | limitations under the License.
// +---------------------------------------------------------------------------
// | Source: https://github.com/jasonweicn/MiniFramework
// +---------------------------------------------------------------------------
// | Author: Jason Wei <jasonwei06@hotmail.com>
// +---------------------------------------------------------------------------
// | Website: http://www.sunbloger.com/miniframework
// +---------------------------------------------------------------------------
namespace Mini;

class Debug
{

    /**
     * 计时器
     * 
     * @var array
     */
    public static $timer;
    
    /**
     * 计时开始
     */
    public static function timerStart()
    {
        self::$timer = array();
        self::$timer['start'] = microtime(true);
    }
    
    /**
     * 计时点
     */
    public static function timerPoint()
    {
        self::$timer['point'][] = microtime(true);
    }
    
    /**
     * 计时结束
     */
    public static function timerEnd()
    {
        self::$timer['end'] = microtime(true);
    }
    
    /**
     * 获取计时信息
     * 
     * @param boolean $dump
     * @return array
     */
    public static function getTimerRecords($dump = true)
    {
        if (! isset(self::$timer['start']) || ! isset(self::$timer['end'])) {
            return false;
        }
        
        $records['time'] = number_format((self::$timer['end'] - self::$timer['start']) * 1000, 4) . 'ms';
        if (isset(self::$timer['point'])) {
            foreach (self::$timer['point'] as $pt) {
                $records['point'][] = number_format(($pt - self::$timer['start']) * 1000, 4) . 'ms';
            }
        }
        
        if ($dump === true) {
            dump($records);
        }
        
        return $records;
    }
}
