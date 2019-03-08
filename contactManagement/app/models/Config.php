<?php
/**
 * Abstract class model for the configuration checkers.
 *
 * @author lokesh
 *         @SuppressWarnings docBlocks
 */
class Config {
        public function pages($size) {
                $opt1  = intdiv($size, 3) + 1;
                $opt2  = $size / 3;
                $pages = (is_float($opt2)) ? $opt1 : $opt2;
                return $contacts;
        }
        public function refill($paginate, $contacts) {
                $index = (($paginate) + ($paginate - 3));
                $array = $contacts;
                $contacts[0] = $array[$index + $paginate];
                if (isset($array[$index + $paginate + 1])) {
                        $contacts[1] = $array[$index + $paginate + 1];
                }
                if (isset($array[$index + $paginate + 2])) {
                        $contacts[2] = $array[$index + $paginate + 2];
                }
                return $contacts;
        }
}