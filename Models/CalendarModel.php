<?php 
    class CalendarModel extends BaseModel {
        const TABLE = ' dondat
                        INNER JOIN khachhang ON dondat.MaKH = khachhang.MaKH
                        INNER JOIN tour ON dondat.MaTour = tour.MaTour
                        INNER JOIN huongdanvien ON dondat.MaHDV = huongdanvien.MaHDV';

        const GETTABLE = 'dondat';
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }
        public function getCalendarById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function getCalendar($columns = ['*'], $id, $value) {
            return $this->getOption(self::GETTABLE, $columns, $id, $value);
        }

        public function createCalendar($keys, $values) {
            return $this->insert(self::GETTABLE, $keys, $values);
        }
        public function cancelCalendar($columns, $value, $id, $option) {
            return $this->update(self::GETTABLE, $columns, $value, $id, $option);
        }
    }