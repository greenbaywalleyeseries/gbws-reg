drop table archive_unpaid_teams;

drop table archive_unpaid_members;

create table archive_unpaid_teams select * FROM gbws_reg.team_info where paid is null;

create table archive_unpaid_members select b.* FROM gbws_reg.team_info a join gbws_reg.member_info b on (a.partner1=b.mbr_id or a.partner2=b.mbr_id or a.sub1=b.mbr_id or a.sub2=b.mbr_id) where a.paid is null;

select * from archive_unpaid_teams;

set sql_safe_updates=0;

delete FROM gbws_reg.member_info where mbr_id in (select mbr_id from gbws_reg.archive_unpaid_members);

delete FROM gbws_reg.team_info where team_id in (select team_id from gbws_reg.archive_unpaid_teams);

#insert into gbws_reg.member_info (select * from gbws_reg.archive_unpaid_members);

#insert into gbws_reg.team_info (select * from gbws_reg.archive_unpaid_teams);

