
delimiter $
DROP PROCEDURE IF EXISTS test_make_date$
create procedure test_make_date()
Begin

set @x=10;
while @x <=43 do

set @make_date=concat('2018-01-01 00:00:0',@x);
update tourney_reg set reg_date=@make_date where boat_num=@x and tourney_id=2;
-- UPDATE tourney_reg SET boat_num = (@x:=@x+1) where tourney_id=tourney ORDER BY reg_date;
-- set @make_date=concat('2018-01-01 00:00:',boat_num);

-- select @make_date;
set @x=@x+1;
end while;


end 


-- UPDATE `gbws_reg`.`tourney_reg` SET `reg_date`='2018-01-01 00:00:01' WHERE `reg_id`='1';


