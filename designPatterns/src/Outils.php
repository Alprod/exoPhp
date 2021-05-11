<?php

namespace App;


class Outils
{
    public static $run_in_eclipse = true;
    public static $eclipse_charset = 'UTF-8';

    private static $out_charset;
    private static $out_handle;

    /**
     * @return bool
     */
    public static function str_start_with($haystack, $needle)
    {
        return ($needle === '') || (strpos($haystack, $needle) === 0);
    }

    /**
     * @param string $str
     * @return void
     */
    public static function println($str = '')
    {
        self::prt($str . "\n");
    }

    /**
     * @param string $str
     * @return void
     */
    public static function prt($str = '')
    {
        if ($str != '') {
            self::detectCharset();
            $str = str_replace(array("\r", "\n"), array('', PHP_EOL), $str);

            if (self::$out_charset != 'UTF-8') {
                $str = iconv('UTF-8', self::$out_charset, $str);
            }

            if (!isset(self::$out_handle)) {
                self::$out_handle = fopen("php://stdout", 'w');
            }
            fprintf(self::$out_handle, $str);
            fflush(self::$out_handle);
        }
    }

    /**
     * @return void
     */
    private static function detectCharset()
    {
        if (!isset(self::$out_charset)) {
            if (self::$run_in_eclipse) {
                self::$out_charset = self::$eclipse_charset;
            } else {
                if (PHP_OS === 'WINNT') {
                    self::$out_charset = 'CP850';
                    exec('chcp', $output);
                    $pos = strpos($output[0], ':');
                    $cp = trim(substr($output[0], $pos + 1));
                    if ($cp < 2000) {
                        self::$out_charset = 'CP' . $cp;
                    }
                } else {
                    $local = setlocale(LC_CTYPE, 0);
                    self::$out_charset = substr($local, 6);
                    if (empty(self::$out_charset)) {
                        self::$out_charset = 'ISO-8859-1';
                    } else {
                        $i = self::$out_charset;
                        if ($i === 'euro') {
                            self::$out_charset =
                                'ISO-8859-15';
                        }
                    }
                }
                self::$out_charset .= '\\TRANSLIT';
            }
        }
    }

    /**
     * @param string $prompt
     * @return false|string
     */
    public static function readln($prompt = '')
    {
        if (PHP_OS == 'WINNT') {
            self::prt($prompt);
            $handle = fopen("php://stdin", 'r');
            $line = stream_get_line($handle, 1024, PHP_EOL);
            self::detectCharset();
            if (self::$out_charset != 'UTF-8') {
                $line = iconv(self::$out_charset, 'UTF-8', $line);
            }
            fclose($handle);
        } else {
            $line = readline($prompt);
        }
        return $line;
    }
}