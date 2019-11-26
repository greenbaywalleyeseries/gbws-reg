delimiter $

CREATE PROCEDURE `setBoatNum`(IN tourney int)
BEGIN
set @x=0;
UPDATE tourney_reg SET boat_num = (@x:=@x+1) where tourney_id=tourney ORDER BY reg_date;

END
