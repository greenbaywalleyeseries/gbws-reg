CREATE PROCEDURE `get_team_id`(OUT ID_num varchar(8))
begin

DECLARE ID VARCHAR(8) DEFAULT "";

set @curr_year=(select (year(curdate())));
-- set @curr_year=(select concat(@curr_year, '%'));
-- set @curr_year=(select quote(@curr_year));

set @curr_num=(select CONVERT(SUBSTRING_INDEX(team_id,'-',-1),UNSIGNED INTEGER) from teaminfo order by CONVERT(SUBSTRING_INDEX(team_id,'-',-1),UNSIGNED INTEGER) desc limit 1);
if (@curr_num IS NULL) then set @curr_num=0;
END IF;
set @new_num=@curr_num+1;

set ID=concat(@curr_year, '-', @new_num);

select ID into ID_num;

end